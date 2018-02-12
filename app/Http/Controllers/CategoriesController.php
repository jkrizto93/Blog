<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    //
    public function show(Category $category){

    	return view('welcome',[
    		'title' =>"Publicaciones de la categoria: {$category->name}",
    		'posts' => $category->posts()->paginate()
    	]);
    }
}
