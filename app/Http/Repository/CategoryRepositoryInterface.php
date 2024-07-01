<?php

namespace App\Http\Repository;

interface CategoryRepositoryInterface
{
    public function all();

    public function create($request);

    public function update($request, $id);

    public function delete($id);

    public function find($id);
}
