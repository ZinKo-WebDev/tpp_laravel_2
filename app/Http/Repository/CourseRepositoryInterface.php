<?php

namespace App\Http\Repository;

interface CourseRepositoryInterface

{
    public function all();

    public function create( $data);

    public function update( $data, $id);

    public function delete($id);

    public function find($id);
}

