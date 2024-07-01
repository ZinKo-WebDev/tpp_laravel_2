<?php

namespace App\Http\Repository;

interface PermissionRepositoryInterface
{
    public function all();

    public function create($request);

    public function edit($id);
    public function update($request, $data);

    public function delete($data);

    public function find($id);
}
