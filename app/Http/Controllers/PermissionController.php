<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::get();
        return view('role-permission.permission.index',[ // compact data to index.blade
            'permissions' => $permissions
        ]);
    }
    public function create(){
        return view('role-permission.permission.create');
    }
    public function store(PermissionRequest $request){
        Permission::create([
            'name' => $request->name,
        ]);
        return redirect('permissions')->with('success','Permission created successfully');
    }
    public function edit(Permission $permission){
//        return ($permission);
        return view('role-permission.permission.edit',[
            'permission' => $permission
        ]);
    }
    public function update(Request $request, Permission $permission){
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$permission->id, // ignore
            ]
        ]);
        $permission->update([
            'name' => $request->name,
        ]);
        return redirect('permissions')->with('success','Permission updated successfully');
    }
    public function destroy($permissionId){
        Permission::find($permissionId)->delete();
        return redirect('permissions')->with('success','Permission deleted successfully');
    }
}
