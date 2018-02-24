<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;

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
    	return view('pages.archive',[
            'authors' => User::latest()->take(4)->get(),
            'categories' => Category::take(7)->get(),
            'posts' => Post::latest()->take(5)->get()
        ]);
    }
    public function contact(){
    	return view('pages.contact');
    }


}
