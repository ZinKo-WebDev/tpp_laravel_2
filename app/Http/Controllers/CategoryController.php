<?php

namespace App\Http\Controllers;

use App\Http\Repository\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $data = $this->categoryRepository->all();

        return view('categories.index', compact('data'));
    }
    public function result()
    {
        return view('categories.result');
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        //        $data = $request->all();
        //        dd($data);
        $this->categoryRepository->create($request);
        return redirect()->route('categoryIndex');
    }

    public function edit($id)
    {
        $data = $this->categoryRepository->find($id);
        return view('categories.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $data = $this->categoryRepository->find($request->id);
        $this->categoryRepository->update($request, $data);
        return redirect()->route('categoryIndex');
    }

    public function destroy(Category $deldata) {
        $this->categoryRepository->delete($deldata);
        return redirect()->route('categoryIndex');
    }
}
