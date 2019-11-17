<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(5);
        //dd($blogs);
        // dalam folder index.blade.php    
        return view('blogs.index')->with(compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //Method 1
        // $blog =  new Blog();
        // $blog->title = $request->get('title');
        // $blog->body = $request->get('body');
        // $blog->save();

        //Method 2 - Mass assignable
       //$blog = Blog::create($request->only('title', 'body'));

        //Method 1
        // $user = auth()->user();
        // $blog->user()->associate($user);
        // $article->save();
        //Method 2
        $user = auth()->user();
        $user->blogs()->create($request->only('title','body'));

        //return view('blogs.index')
        return redirect()->route('blog:index')->with(['alert-type' => 'alert-success','alert'=> 'Your blog saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blogs.show')->with(compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit')->with(compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog = $blog->update($request->only('title', 'body'));

        return redirect()->route('blog:index')->with(['alert-type' => 'alert-success', 'alert' => "Your blog updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function delete(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog:index')->with(['alert-type' => 'alert-danger', 'alert' => "Your blog deleted"]);

    }
}
