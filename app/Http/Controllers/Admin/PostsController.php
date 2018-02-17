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
    //borra con y tiene seguridad de usuario 
    public function index(){
    	//$posts=Post::all();
        //$posts=auth()->user()->posts;
        //el que permite mostrar las publiccacionespor rol
        $posts= Post::allowed()->get();
    	return view('admin.posts.index',compact('posts'));
    }
    /*
    public function create(){
    	$categories= Category::all();
    	$tags= Tag::all();
    	return view('admin.posts.create',compact('categories','tags'));
    }*/

    public function store(Request $request){
        $this->authorize('create',new Post);
        $this->validate($request,[
            'title' =>'required|min:3',

        ]);

        //$post=Post::create($request->only('title'));
       /* $post=Post::create([
           'title' =>$request->get('title'),
           'user_id' => auth()->id()
        ]);*/
        $post=Post::create($request->all());
        


        return redirect()->route('admin.posts.edit',$post);

    }
    public function edit(Post $post){
        $this->authorize('update',$post);
        
        return view('admin.posts.edit',[
            'post'=>$post,
            'tags' => Tag::all(),
            'categories' => Category::all()
        ]);

    }

    
    public function update(Post $post,StorePostRequest $request){
        
       $this->authorize('update',$post);


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

        $this->authorize('delete',$post);

        $post->tags()->detach();
        $post->photos->each->delete();
        $post->delete();
        return redirect()
        ->route('admin.posts.index')
        ->with('flash','Tu publicacion se elimino satisfactoriamente');

    }
}
