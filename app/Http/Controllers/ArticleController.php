<?php

namespace App\Http\Controllers;

use App\Http\Repository\ArticleRepositoryInterface;
use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(private ArticleRepositoryInterface $articleRepository)
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $article = $this->articleRepository->all();
        return view('articles.index', compact('article'));
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store(Request $request)
    {
     $this->articleRepository->create($request);
        return redirect()->route('articles.index');
    }

    public function edit($id){
        $data = $this->articleRepository->find($id);
        return view('articles.edit', compact('data'));
    }

    public function update(Request $request,$id){

       $this->articleRepository->update($request, $id);
        return redirect()->route('articles.index')->with('success', 'Post updated successfully.');
    }
    public function destroy(Article $article)
    {
        $this->articleRepository->delete( $article);
        return redirect()->route('articles.index')->with('success', 'Post deleted successfully.');
    }
}
