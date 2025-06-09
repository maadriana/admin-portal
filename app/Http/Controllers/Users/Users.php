<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    public function index()
    {
        // Logic to retrieve and display users
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    public function update(Request $request)
    {
        $request->validate([
            'given_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ]);

        
        $data = $request->only(['given_name', 'surname', 'position', 'email']);

        if ($request->has('role')) {
            $data['role'] = $request->role;
        }
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        
        try {
            $user = User::findOrFail($request->id);
            if ($user->id == 1 && $data['role'] != 'Super Admin') {
                return redirect()->back()->with('error', 'Cannot change the role of the default user');
            }
            $user->update($data);

            return redirect()->back()->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'User not updated: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        // Logic to delete a specific user by ID
        if ($id == 1) {
            return redirect()->route('users.index')->with('error', 'Cannot delete the default user');
        }
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    public function create(Request $request)
    {
        
        $validated = $request->validate([
            'given_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:Admin,Super Admin',
        ]);

        try 
        {
            User::createOrFirst([
                'given_name' => $validated['given_name'],
                'surname' => $validated['surname'],
                'position' => $validated['position'],
                'role' => $validated['role'],
                'email' => $validated['email'],
                'password' => ($validated['password']),
            ]);
        }
        catch(\Exception $e) {
            return redirect()->back()->with('error', 'Error creating user: ' . $e->getMessage());
        }
    
        return redirect()->back()->with('success', 'User created successfully.');
    }
   

}