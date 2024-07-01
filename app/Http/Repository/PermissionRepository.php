<?php

namespace App\Http\Repository;

use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{

    public function all()
    {
        $permissions = Permission::get();
        return $permissions;
    }

    public function create($request)
    {

    }
    public function edit($id)
    {

    }
    public function update($request,$data)
    {

    }

    public function delete($data)
    {

    }

    public function find($id)
    {

    }
}
