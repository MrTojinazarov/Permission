<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        $models = Role::all();
        return view('role.index', ['models'=> $models,'permissions' => $permissions]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'permissions' => 'required|array',
        ]);

        $ids = $data['permissions'];
        unset($data['permissions']);

        $role = Role::create($data);
        $role->permissions()->attach($ids);

        return redirect()->route('role.index');
    }

    public function update(Request $request , Role $role)
    {
        $data = $request->validate([
            'name' => 'required',
            'permissions' => 'required|array',
        ]);
        $ids = $data['permissions'];
        unset($data['permissions']);

        $role->update($data);
        $role->permissions()->sync($ids);
        return redirect()->route('role.index');

    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index');
    }
    
}