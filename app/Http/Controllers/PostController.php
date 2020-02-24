<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{

    public function index(){

        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create(){

        $categories = Category::all();

        return view('post.create', compact('categories'));
    }

    public function store(){
        
        Post::create([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'content' => request('content'),
            'category_id' => request('category_id'),
            'image' => request('image')->store('images')

            ]);
            

        return redirect()->route('post.index')->with('info', 'Post Telah Diupload');
    }

    public function edit(Post $post){

        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post){

        $categories = Category::all();

        if($post->image){
            \Storage::delete($post->image);
        }

        $post->update([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'content' => request('content'),
            'category_id' => request('category_id'),    
            'image' => request('image')->store('images')
        ]);

        return redirect()->route('post.index')->with('success', 'Pos Berhasil Diupdate');
    }

    public function destroy(Post $post){

        $post->delete();

        \Storage::delete($post->image);

        if($blog->delete()){
            echo 'sukses';
        }
    }

    public function detail(Post $post){
        
        return view('post.detail', compact('post'));
    }
}
