<?php

namespace App\Models;

use App\Traits\SlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory, SlugTrait;


    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function findFavourite($article)
    {
        if (Auth::user()) {
            if (Favourite::where('article_id', $article->id)->where('user_id', Auth::id())->first()) {
                return true;
            }
            return false;
        }
        return false;
    }


}
