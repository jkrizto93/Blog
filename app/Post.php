<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $dates=['published_at'];
    protected $guarded=[];


    public function category()//$post->category->name
    {
    	return $this->belongsTo(Category::class);
    }

    public function tags()//$post->category->name
    {
    	return $this->belongsToMany(Tag::class);
    }
}
