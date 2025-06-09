<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function index()
    {
        // Logic to retrieve and display users
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'given_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
    
        $user->update([
            'given_name' => $request->given_name,
            'surname' => $request->surname,
            'position' => $request->position,
            'email' => $request->email,
            'password' => ($request->password != $user->password) ? ($request->password) : $user->password,
            'role' => $request->role,
        ]);
    
        return redirect()->back()->with('success', 'User updated successfully.');
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
            User::create([
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