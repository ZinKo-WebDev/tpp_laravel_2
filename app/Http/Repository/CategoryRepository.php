<?php

namespace App\Http\Repository;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        $data = Category::all();
        return $data;

    }

    public function create($request)
    {
        Category::create([
            'name' => $request->name,
        ]);
    }
    public function edit($id)
    {

    }
    public function update($request,$data)
    {
        $data->update([
            'name' => $request->name,
        ]);
    }

    public function delete($data)
    {
        $data->delete();
    }

    public function find($id)
    {
        $data = Category::where('id', $id)->first();
        return $data;
    }
}
