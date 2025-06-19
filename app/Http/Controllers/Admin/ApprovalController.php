<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApprovalRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    public function index()
    {
        // Only Super Admins can see approval requests
        if (auth()->user()->role !== 'Super Admin') {
            abort(403, 'Access denied.');
        }

        $requests = ApprovalRequest::with(['user', 'requestedBy', 'reviewedBy'])
                                  ->orderBy('created_at', 'desc')
                                  ->get();

        return view('admin.approvals.index', compact('requests'));
    }

    public function approve(Request $request, ApprovalRequest $approvalRequest)
    {
        if (auth()->user()->role !== 'Super Admin') {
            abort(403, 'Access denied.');
        }

        $request->validate([
            'review_notes' => 'nullable|string|max:500'
        ]);

        $passwordChanged = false;

        // Apply the requested changes
        if ($approvalRequest->request_type === 'profile_update') {
            $passwordChanged = $this->applyProfileChanges($approvalRequest);
        } elseif ($approvalRequest->request_type === 'account_deletion') {
            $this->deleteUserAccount($approvalRequest);
        }

        // Update approval request
        $approvalRequest->update([
            'status' => 'approved',
            'reviewed_by' => auth()->id(),
            'review_notes' => $request->review_notes,
            'reviewed_at' => now()
        ]);

        // If password was changed, log out the user whose password was changed
        if ($passwordChanged && $approvalRequest->user) {
            // Force logout the user whose password was changed
            $this->forceLogoutUser($approvalRequest->user->id);
        }

        return redirect()->back()->with('success', 'Request approved successfully.' .
            ($passwordChanged ? ' The user must log out and log in again to apply the new password.' : ''));
    }

    public function reject(Request $request, ApprovalRequest $approvalRequest)
    {
        if (auth()->user()->role !== 'Super Admin') {
            abort(403, 'Access denied.');
        }

        $request->validate([
            'review_notes' => 'required|string|max:500'
        ]);

        $approvalRequest->update([
            'status' => 'rejected',
            'reviewed_by' => auth()->id(),
            'review_notes' => $request->review_notes,
            'reviewed_at' => now()
        ]);

        return redirect()->back()->with('success', 'Request rejected.');
    }

    private function applyProfileChanges(ApprovalRequest $approvalRequest)
    {
        $user = $approvalRequest->user;
        $changes = $approvalRequest->requested_changes;
        $passwordChanged = false;

        $updateData = [];

        foreach ($changes as $field => $value) {
            if ($field === 'password') {
                // Handle password separately - we need to get the new password from request data
                // Since we stored the hashed password in the request data during submission
                if (isset($changes['new_password_hash'])) {
                    $updateData['password'] = $changes['new_password_hash'];
                    $passwordChanged = true;
                }
            } elseif ($field === 'new_password_hash') {
                // Skip this field as it's handled above
                continue;
            } else {
                $updateData[$field] = $value;
            }
        }

        if (!empty($updateData)) {
            $user->update($updateData);
        }

        return $passwordChanged;
    }

    private function deleteUserAccount(ApprovalRequest $approvalRequest)
    {
        $user = $approvalRequest->user;

        // Don't delete default user
        if ($user->id !== 1) {
            // Force logout before deletion
            $this->forceLogoutUser($user->id);
            $user->delete();
        }
    }

    private function forceLogoutUser($userId)
    {
        // This will invalidate all sessions for the specific user
        // In Laravel, we can't directly log out a specific user, but we can use session management

        // Get all sessions (this requires session database driver)
        // For now, we'll just set a flag that the frontend can check

        // Alternative approach: Set a timestamp when password was changed
        // and check it on each request in middleware
        $user = User::find($userId);
        if ($user) {
            $user->update(['password_changed_at' => now()]);
        }
    }

    public function requestAccountDeletion(Request $request)
    {
        $currentUser = auth()->user();

        // Only Admins can request account deletion
        if ($currentUser->role !== 'Admin') {
            return redirect()->back()->with('error', 'Only Admin users can request account deletion.');
        }

        $request->validate([
            'reason' => 'required|string|max:500'
        ]);

        // Check if there's already a pending request
        $existingRequest = ApprovalRequest::where('user_id', $currentUser->id)
                                         ->where('request_type', 'account_deletion')
                                         ->where('status', 'pending')
                                         ->first();

        if ($existingRequest) {
            return redirect()->back()->with('error', 'You already have a pending account deletion request.');
        }

        ApprovalRequest::create([
            'user_id' => $currentUser->id,
            'requested_by' => $currentUser->id,
            'request_type' => 'account_deletion',
            'reason' => $request->reason,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('info', 'Your account deletion request has been submitted for approval.');
    }
}
