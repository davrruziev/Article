<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait SlugTrait
{
    public static function boot(){
        parent::boot();
        static::saving(function($request){
            $request->slug=Str::slug($request->name);
        });
    }
}
