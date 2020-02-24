<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BlogAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blog $blog)
    {
        $blogs = Blog::all();
        $categories = Category::all();

        return view('blogajax.index',['blogs'=>$blogs,'categories'=>$categories]);
   
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    
        $categories = Category::all();

        return view('blogajax.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       
        Blog::create([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'content' => request('content'),
            'Category_id' => request('category_id')
        ]);
            
        return redirect()->route('blogajax.index')->with('info', 'Berhasil Upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();

        return view('blogajax.update', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Blog $blog)
    {
        $categories = Category::all();

        $blog->update([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'content' => request('content'),
            'category_id' => request('category_id')
        ]);

        return redirect()->route('blogajax.index')->with('success', 'Bloh berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if($blog->get('delete')){
            $data = Blog::find($blog->get('id'));
            $data->delete();
        }

    }

    public function url(Request $request){
        $hasil = new Blog;
        $hasil->title = $request->get('title');
        $hasil->category_id = $request->get('category_id');
        $hasil->slug = $request->get('title');
        $hasil->content = $request->get('content');
        $hasil->save();
        
        return $hasil;
    }
}
