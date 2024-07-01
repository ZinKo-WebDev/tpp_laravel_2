<?php

namespace App\Http\Repository;

interface ProductRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update($request, $id);

    public function delete( $request);
    public function store($request);
    public function edit($id);

    public function find($id);
}
