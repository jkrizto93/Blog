<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Post extends Model
{
    //
    protected $dates=['published_at'];
    protected $guarded=[];

    public function getRouteKeyName(){
        return 'url';
    }


    public function category()//$post->category->name
    {
    	return $this->belongsTo(Category::class);
    }

    public function tags()//$post->category->name
    {
    	return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)//$post->category->name
    {
        $query->whereNotNull('published_at')
        ->where('published_at','<=', Carbon::now())
        ->latest('published_at');
    }
}
