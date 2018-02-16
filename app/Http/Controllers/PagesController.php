<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function home(){
    	/*$posts = Post::whereNotNull('published_at')
    	->where('published_at','<=', Carbon::now())
    	->latest('published_at')
    	->get();*/

    	$posts = Post::published()->paginate(4);

    	return view('pages.home',compact('posts'));
    }

    public function about(){
    	return view('pages.about');
    }
 
 	public function archive(){
    	return view('pages.archive');
    }
    public function contact(){
    	return view('pages.contact');
    }


}
