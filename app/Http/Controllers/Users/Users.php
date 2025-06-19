<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ApprovalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();

        // Super Admin can see all users but with different permissions
        if ($currentUser->role === 'Super Admin') {
            // Show all users for viewing, but action buttons will be controlled in the view
            $users = User::all();
        } else {
            // Admin users should not have access to this page
            abort(403, 'Access denied.');
        }

        return view('users.index', compact('users'));
    }

    public function update(Request $request)
    {
        $currentUser = auth()->user();
        $targetUser = User::findOrFail($request->id);

        // Check permissions based on complex rules
        if (!$this->canManageUser($currentUser, $targetUser)) {
            return redirect()->back()->with('error', 'You do not have permission to update this user.');
        }

        $request->validate([
            'given_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ]);

        $data = $request->only(['given_name', 'surname', 'position', 'email']);

        // Role assignment logic
        if ($request->has('role')) {
            $newRole = $request->role;

            // Default user (ID 1) cannot change role
            if ($targetUser->id == 1 && $newRole != 'Super Admin') {
                return redirect()->back()->with('error', 'Cannot change the role of the default user.');
            }

            // Super Admin role assignment rules
            if ($currentUser->role === 'Super Admin') {
                // Super Admins can change roles for Admin users and their own role
                if ($targetUser->role === 'Admin' || $targetUser->id === $currentUser->id) {
                    $data['role'] = $newRole;
                }
                // Cannot change other Super Admin roles
                else if ($targetUser->role === 'Super Admin' && $targetUser->id !== $currentUser->id) {
                    return redirect()->back()->with('error', 'You cannot change other Super Admin roles.');
                }
            }
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        try {
            $targetUser->update($data);
            return redirect()->back()->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'User not updated: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $currentUser = auth()->user();
        $targetUser = User::findOrFail($id);

        // Default user (ID 1) cannot be deleted
        if ($id == 1) {
            return redirect()->route('users.index')->with('error', 'Cannot delete the default user');
        }

        // Check permissions
        if (!$this->canManageUser($currentUser, $targetUser)) {
            return redirect()->back()->with('error', 'You do not have permission to delete this user.');
        }

        // Super Admins (ID 2+) can delete their own account
        if ($currentUser->role === 'Super Admin' && $currentUser->id === $targetUser->id && $currentUser->id > 1) {
            try {
                $targetUser->delete();
                // After deleting own account, logout and redirect to login
                auth()->logout();
                return redirect()->route('login')->with('success', 'Your account has been deleted successfully.');
            } catch (\Exception $e) {
                return redirect()->route('users.index')->with('error', 'Error deleting account: ' . $e->getMessage());
            }
        }

        // Super Admins can delete Admin users but not other Super Admins
        if ($currentUser->role === 'Super Admin' && $targetUser->role === 'Admin') {
            try {
                $targetUser->delete();
                return redirect()->route('users.index')->with('success', 'User deleted successfully');
            } catch (\Exception $e) {
                return redirect()->route('users.index')->with('error', 'Error deleting user: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'You cannot delete other Super Admin users.');
    }

    public function create(Request $request)
    {
        $currentUser = auth()->user();

        // Only Super Admins can create users
        if ($currentUser->role !== 'Super Admin') {
            return redirect()->back()->with('error', 'You do not have permission to create users.');
        }

        // Determine allowed roles based on current user
        $allowedRoles = [];
        if ($currentUser->id === 1) {
            // Default user (ID 1) can create both Admin and Super Admin
            $allowedRoles = ['Admin', 'Super Admin'];
        } else {
            // Other Super Admins can only create Admin users
            $allowedRoles = ['Admin'];
        }

        $validated = $request->validate([
            'given_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:' . implode(',', $allowedRoles),
        ]);

        // Additional check: Only ID 1 can create Super Admin
        if ($validated['role'] === 'Super Admin' && $currentUser->id !== 1) {
            return redirect()->back()->with('error', 'Only the default Super Admin can create other Super Admin users.');
        }

        try {
            User::create([
                'given_name' => $validated['given_name'],
                'surname' => $validated['surname'],
                'position' => $validated['position'],
                'role' => $validated['role'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            return redirect()->back()->with('success', 'User created successfully.');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Error creating user: ' . $e->getMessage());
        }
    }

    /**
     * Profile update with approval system for Admins
     */
    public function updateProfile(Request $request)
    {
        $currentUser = auth()->user();
        $targetUserId = $request->route('id') ?? $currentUser->id;
        $targetUser = User::findOrFail($targetUserId);

        // Validate input
        $request->validate([
            'given_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ]);

        // If user is Admin and trying to update sensitive info, create approval request
        if ($currentUser->role === 'Admin' && $currentUser->id === $targetUser->id) {
            return $this->handleAdminProfileUpdate($request, $currentUser);
        }

        // For Super Admins updating their own profile or managing Admin users
        return $this->handleDirectProfileUpdate($request, $targetUser);
    }

    private function handleAdminProfileUpdate(Request $request, User $user)
    {
        $requestedChanges = [];
        $needsApproval = false;

        // Check what's being changed
        if ($request->given_name !== $user->given_name) {
            $requestedChanges['given_name'] = $request->given_name;
            $needsApproval = true;
        }
        if ($request->surname !== $user->surname) {
            $requestedChanges['surname'] = $request->surname;
            $needsApproval = true;
        }
        if ($request->position !== $user->position) {
            $requestedChanges['position'] = $request->position;
            $needsApproval = true;
        }
        if ($request->email !== $user->email) {
            $requestedChanges['email'] = $request->email;
            $needsApproval = true;
        }
        if ($request->filled('password')) {
            // Store the hashed password for approval
            $requestedChanges['password'] = 'Password change requested';
            $requestedChanges['new_password_hash'] = Hash::make($request->password);
            $needsApproval = true;
        }

        if ($needsApproval) {
            // Create approval request
            ApprovalRequest::create([
                'user_id' => $user->id,
                'requested_by' => $user->id,
                'request_type' => 'profile_update',
                'requested_changes' => $requestedChanges,
                'reason' => $request->reason ?? 'Profile update request',
                'status' => 'pending'
            ]);

            return redirect()->back()->with('info', 'Your profile update request has been submitted for approval.');
        }

        return redirect()->back()->with('info', 'No changes detected.');
    }

    private function handleDirectProfileUpdate(Request $request, User $targetUser)
    {
        $data = $request->only(['given_name', 'surname', 'position', 'email']);

        // Handle role changes for Super Admins
        if ($request->has('role') && auth()->user()->role === 'Super Admin') {
            $newRole = $request->role;

            // Default user (ID 1) cannot change role
            if ($targetUser->id == 1 && $newRole != 'Super Admin') {
                return redirect()->back()->with('error', 'Cannot change the role of the default user.');
            }

            $data['role'] = $newRole;
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        try {
            $targetUser->update($data);
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Profile not updated: ' . $e->getMessage());
        }
    }

    /**
     * FIXED: Check if current user can manage target user
     */
    private function canManageUser($currentUser, $targetUser)
    {
        // Super Admin rules
        if ($currentUser->role === 'Super Admin') {
            // Can manage Admin users
            if ($targetUser->role === 'Admin') {
                return true;
            }
            // Can manage own profile (including other Super Admins managing their own account)
            if ($targetUser->id === $currentUser->id) {
                return true;
            }
            // Cannot manage other Super Admin users
            return false;
        }

        // Admin users cannot manage anyone through user management
        return false;
    }
}
