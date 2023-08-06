<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    public static function boot(){
        parent::boot();
        static::saving(function($tag){
            $tag->slug=Str::slug($tag->name);
        });
    }
}
