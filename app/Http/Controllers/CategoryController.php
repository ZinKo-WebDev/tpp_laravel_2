<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        return view('category.index', compact("categories"));
    }
    public function result()
    {
        return view('category.result');
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        Category::create([
            "name" => $request->name,
        ]);
        return redirect()->route('categoryIndex');
    }

    public function edit($id)
    {

        $data = Category::where('id', $id)->first();
        return view('category.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $data = Category::where('id', $id)->first();
        $data->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categoryIndex');
    }

    public function delete(Category $id)
    {

        $id->delete();
        return redirect()->route('categoryIndex');
    }
}
