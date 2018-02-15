<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;

use App\Post;
use App\Category;
use App\Tag;


class PostsController extends Controller
{
    //
    public function index(){
    	$posts=Post::all();
    	return view('admin.posts.index',compact('posts'));
    }
    /*
    public function create(){
    	$categories= Category::all();
    	$tags= Tag::all();
    	return view('admin.posts.create',compact('categories','tags'));
    }*/

    public function store(Request $request){
        $this->validate($request,[
            'title' =>'required|min:3',

        ]);

        $post=Post::create($request->only('title'));


        return redirect()->route('admin.posts.edit',$post);

    }
    public function edit(Post $post){
        $categories= Category::all();
        $tags= Tag::all();
        return view('admin.posts.edit',compact('categories','tags','post'));

    }

    
    public function update(Post $post,StorePostRequest $request){
        
      

        $post->update($request->all());      
        //etiquetas ?? o:


        $post->syncTags($request->get('tags'));



        return redirect()->route('admin.posts.edit',$post)->with('flash','Tu publicacion se guardo satisfactoriamente');

    }
/*
    public function validatePost($request){
        return $this->validate($request,[
            'title'=> 'required',
            'body'=> 'required',
            'category'=> 'required',
            'excerpt'=> 'required',
            'tags'=> 'required',
        ]);
    }*/

    public function destroy(Post $post){
        $post->tags()->detach();
        $post->photos->each->delete();
        $post->delete();
        return redirect()
        ->route('admin.posts.index')
        ->with('flash','Tu publicacion se elimino satisfactoriamente');

    }
}
