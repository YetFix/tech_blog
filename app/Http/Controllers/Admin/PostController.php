<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('Admin.Post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('status','0')->get();
        return view('Admin.Post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $post= new Post();
        $post->name= $data['name'];
        $post->category_id= $data['category_id'];
        $post->slug= Str::slug($data['name']);
        $post->description= $data['description'];
        $post->yt_iframe= $data['yt_iframe'];
        $post->meta_title= $data['meta_title'];
        $post->meta_description= $data['meta_description'];
        $post->meta_keyword= $data['meta_keyword'];
       
        $post->status= $request['status']==true? '1':'0';
        $post->created_by= Auth::user()->id;

        $post->save();

        return redirect()->route('posts.index')->with('message','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
        return view('Admin.Post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $data = $request->validated();

      
        $post->name= $data['name'];
        $post->slug= Str::slug($data['name']);
        $post->category_id=$data['category_id'];
        $post->description= $data['description'];
        $post->yt_iframe= $data['yt_iframe'];
        $post->meta_title= $data['meta_title'];
        $post->meta_description= $data['meta_description'];
        $post->meta_keyword= $data['meta_keyword'];
      
        $post->status= $request['status']==true? '1':'0';
        $post->created_by= Auth::user()->id;

        $post->update();

        return redirect()->route('posts.index')->with('message','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('message','post deleted successfully');
    }
}
