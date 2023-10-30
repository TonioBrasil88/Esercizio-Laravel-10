<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = auth()->user()->articles;
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = auth()->user()->articles()->create([  
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'img' => $request->hasFile('img') ? $request->file('img')->store('public/articles') : 'default.png',
            'category_id' => $request->input('category_id'),
            'body' => $request->input('body'),
        ]);

        $article->tags()->attach($request->input('tags'));

        return to_route('home')->with('message', 'Articolo creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArticleRequest $request, Article $article)
    {

        $imgArticle = $article->img;

        $article->update([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'img' => $request->hasFile('img') ? $request->file('img')->store('public/articles') : $article->img,
            'category_id' => $request->input('category_id'),
            'body' => $request->input('body'),
        ]);

        if($request->hasFile('img')) {
            Storage::delete($imgArticle);
        }

        $article->tags()->sync($request->input('tags')); 
        return to_route('home')->with('message', 'Articolo modificato con successo!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        Storage::delete($article->img);
        return to_route('home')->with('message', 'Articolo eliminato con successo!');
    }
}
