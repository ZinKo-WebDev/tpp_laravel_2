<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $article = Article::all();
        return view('articles.index', compact('article'));
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store(Request $request)
    {
        Article::create([
            'name' => $request->name,
            'age' => $request->age,
            'city' => $request->city,
        ]);
        return redirect()->route('articles.index');
    }

    public function edit($id){
        $data = Article::where('id', $id)->first();
        return view('articles.edit', compact('data'));
    }

    public function update(Request $request,$id){
        ## call null value
        ## $data = Article::where('id', $request->id)->first();
        /*
         *      Error handling
         */
        $data = Article::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'age' => $request->age,
            'city' => $request->city,
        ]);
        return redirect()->route('articles.index')->with('success', 'Post updated successfully.');
    }
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Post deleted successfully.');
    }
}
