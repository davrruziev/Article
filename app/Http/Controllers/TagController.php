<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index($slug)
    {

        $tag = Tag::whereSlug($slug)->first();
        $tags = Tag::all();
        $articles = $tag->articles()->paginate(2);
        return view('article.index', compact('articles', 'tags'));
    }
}
