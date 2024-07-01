<?php

namespace App\Http\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleRepository implements RoleRepositoryInterface
{
    public function all()
    {
        $roles = Role::get();
        return view('role-permission.role.index',[ // compact data to index.blade
            'roles' => $roles
        ]);
    }

    public function create($request)
    {
       Role::create([
            'name' => $request->name,
        ]);
    }
    public function edit($role)
    {
        return view('role-permission.role.edit',[
            'role' => $role
        ]);
    }
    public function update($request,$role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id, // ignore
            ]
        ]);
        $role->update([
            'name' => $request->name,
        ]);
    }

    public function delete($roleId)
    {
        Role::find($roleId)->delete();
    }
    public function addPermissionToRole($roleId){
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        // checked db data for checkbox
        $rolePermissions = DB::table("role_has_permissions")
            ->where('role_has_permissions.role_id', $roleId)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return ['role'=>$role,'permissions'=>$permissions,'rolePermissions'=>$rolePermissions];
    }
    public function givePermissionToRole( $request , $roleId){
        $request->validate([
            'permission' => 'required'
        ]);
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
    }

}
