<?php

namespace App\Http\Controllers;

use App\Http\Repository\RoleRepositoryInterface;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct(private RoleRepositoryInterface $roleRepository){

    }
    public function index(){
       return $this->roleRepository->all();
    }
    public function create(){
        return view('role-permission.role.create');
    }
    public function store(RoleRequest $request){
       $this->roleRepository->create($request);
        return redirect('roles')->with('success','Role created successfully');
    }
    public function edit(Role $role){
      return $this->roleRepository->edit($role);
    }
    public function update(Request $request,Role $role){
       $this->roleRepository->update($request,$role);
        return redirect('roles')->with('success','Role updated successfully');
    }
    public function destroy($roleId){
       $this->roleRepository->delete($roleId);
        return redirect('roles')->with('success','Role deleted successfully');
    }

    public function addPermissionToRole($roleId)
    {
       $returnData=$this->roleRepository->addPermissionToRole($roleId);

        return view('role-permission.role.add-permissions',$returnData);
    }
    public function givePermissionToRole(Request $request , $roleId)
    {
       $this->roleRepository->givePermissionToRole($request,$roleId);
        return redirect()->back()->with('success','Permission added to role successfully');
    }
}
