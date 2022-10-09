<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
          $categories=Category::all();
          return view('Admin.Category.index',compact('categories'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        
        $data = $request->validated();

        $category= new Category();
        $category->name= $data['name'];
        $category->slug= Str::slug($data['name']);
        $category->description= $data['description'];
        if($request->hasFile('image')){
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category',$filename);
            $category->image=$filename;
        }
        $category->meta_title= $data['meta_title'];
        $category->meta_description= $data['meta_description'];
        $category->meta_keyword= $data['meta_keyword'];
        $category->navbar_status= $request['navbar_status']==true? '1':'0';
        $category->status= $request['status']==true? '1':'0';
        $category->created_by= Auth::user()->id;

        $category->save();

        return redirect()->route('categories.index')->with('message','Categories created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       return view('Admin.Category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        $data = $request->validated();

      
        $category->name= $data['name'];
        $category->slug= Str::slug($data['name']);
        $category->description= $data['description'];
        if($request->hasFile('image')){
            $des= 'uploads/category/'.$category->image;
            if(File::exists($des)){
                File::delete($des);
            }
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category',$filename);
            $category->image=$filename;
        }
        $category->meta_title= $data['meta_title'];
        $category->meta_description= $data['meta_description'];
        $category->meta_keyword= $data['meta_keyword'];
        $category->navbar_status= $request['navbar_status']==true? '1':'0';
        $category->status= $request['status']==true? '1':'0';
        $category->created_by= Auth::user()->id;

        $category->update();

        return redirect()->route('categories.index')->with('message','Categories updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       
        $des= 'uploads/category/'.$category->image;
        if(File::exists($des)){
            File::delete($des);
        }
        $category->delete();
        return redirect()->route('categories.index')->with('message','Categories deleted successfully');
    }
}
