<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('role-permission.role.index', compact('roles'));
    }
    public function create(){
        return view('role-permission.role.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);
        Role::create([
            'name' => $request->name
        ]);
        return redirect()->route('roles.index')->with('status', 'Role created successfully');
    }
    public function edit(Role $role){
        return view('role-permission.role.edit', compact('role'));
    }
    public function update(Request $request, Role $role){
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]
        ]);
        $role->update([
            'name' => $request->name
        ]);
        return redirect()->route('roles.index')->with('status', 'Role updated successfully');
    }
    public function destroy($roleId){
        $role = Role::find($roleId);
        $role->delete();
        return redirect()->route('roles.index')->with('status', 'Role deleted successfully');
    }

    //addPermissionToRole
    public function addPermissionToRole($roleID)
    {
        $permissions = Permission::all();
        $role = Role::findOrFail($roleID);
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('role-permission.role.add-permission',
            compact(['role', 'permissions', 'rolePermissions']));

    }
    public function givePermissionToRole(Request $request,$roleID)
    {
            $request->validate([
            'permission' => 'required'
        ]);
            $role = Role::findOrFail($roleID);
            $role->syncPermissions($request->permission);

            return redirect()->back()->with('status', 'Permission added to role successfully');
    }
}
