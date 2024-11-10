<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all(); 
        return view('userRole.index', ['users' => $users, 'roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->roles()->sync($request->roles);

        return redirect()->route('userRole.index')->with('success', 'User roles updated successfully.');
    }

    public function update(Request $request, $userId)
    {
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = User::findOrFail($userId);
        $user->roles()->sync($request->roles);

        return redirect()->route('userRole.index')->with('success', 'User roles updated successfully.');
    }

    public function destroy($userId, $roleId)
    {
        $user = User::findOrFail($userId);
        $user->roles()->detach($roleId);

        return redirect()->route('userRole.index')->with('success', 'User role removed successfully.');
    }
}
