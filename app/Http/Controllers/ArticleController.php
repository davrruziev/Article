<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Favourite;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function show($slug)
    {
        $article = Article::whereSlug($slug)->first();
        $article->increment('views');
        $article->save();
        return view('article.show',compact('article'));
    }

    public function articles()
    {
        $articles = Article::paginate(2);
        $tags = Tag::all();
        return view('article.index',compact('articles', 'tags'));
    }

    public function favourite($article_id)
    {
        if (Auth::user()){
            $favourite = new Favourite();
            $favourite->user_id = Auth::id();
            $favourite->article_id = $article_id;
            $favourite->save();
        }
        return redirect()->back();
    }
}
