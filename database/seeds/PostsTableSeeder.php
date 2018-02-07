<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;


use Carbon\Carbon;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::truncate();
        Category::truncate();
 		$category = new Category;
        $category->name = "Categoria 1";
        $category->save();

		$category = new Category;
        $category->name = "Categoria 2";
		$category->save();

        $post = new Post;
        $post->title = "Mi primer Post :v ";
        $post->excerpt = "Extracto primer Post :v";
        $post->body = "<p>Contenido de mi primer Post :v</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id=1;
        $post->save();


        $post = new Post;
        $post->title = "Mi 2do Post :v ";
        $post->excerpt = "Extracto 2do Post :v";
        $post->body = "<p>Contenido de mi 2do Post :v</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id=1;
        $post->save();


        $post = new Post;
        $post->title = "Mi 3ero Post :v ";
        $post->excerpt = "Extracto 3ero Post :v";
        $post->body = "<p>Contenido de mi 3ero Post :v</p>";
        $post->published_at = Carbon::now()->subDays(8);
        $post->category_id=2;
        $post->save();

        $post = new Post;
        $post->title = "Mi 4to Post :v ";
        $post->excerpt = "Extracto 4to Post :v";
        $post->body = "<p>Contenido de mi 4to Post :v</p>";
        $post->published_at = Carbon::now(1);
        $post->category_id=2;
        $post->save();
    }
}
