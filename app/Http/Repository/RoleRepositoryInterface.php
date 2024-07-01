<?php

namespace App\Http\Repository;

interface RoleRepositoryInterface
{
    public function all();

    public function create($request);

    public function update($request, $id);

    public function delete($id);


}
