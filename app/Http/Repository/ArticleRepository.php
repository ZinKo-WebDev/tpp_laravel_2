<?php

namespace App\Http\Repository;

use App\Models\Article;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function all()
    {
        $article = Article::all();
        return $article;
    }

    public function create( $request)
    {
        Article::create([
            'name' => $request->name,
            'age' => $request->age,
            'city' => $request->city,
        ]);
    }
public function edit ( $id){
    $data = Article::where('id', $id)->first();
    return $data;
}
    public function update( $request, $id)
    {
        $data = Article::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'age' => $request->age,
            'city' => $request->city,
        ]);
    }

    public function delete($article)
    {
        $article->delete();
    }

    public function find($id)
    {
        return Article::findOrFail($id);
    }
}
