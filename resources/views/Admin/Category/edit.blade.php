@extends('layouts.master')
@section('title','Category/edit')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Edit Category:{{$category->name}}
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
              <div class="row">
                  <div class="col-md-8 mx-auto">
                    <form action="{{route('categories.update',$category)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" value={{$category->name}} name="name" id="name"  placeholder="Category Name">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="5">
                                  {{$category->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                        </div>
                        <h6>SEO Tags</h6>
                        <hr>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" value={{$category->meta_title}} name="meta_title" id="meta_title" placeholder="Meta Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="3">
                                    {{$category->meta_description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="meta_keyword">Meta Keywords</label>
                                <textarea class="form-control" name="meta_keyword" id="meta_keyword" cols="30" rows="3">
                                    {{$category->meta_keyword}}
                                </textarea>
                            </div>
                        </div>
                        <h6>Status Mode</h6>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                              
                                    <div class="col-md-3 mb-3">
                                        <label for="navbar_status">Navbar Status</label>
                                      
                                        <input class="form-check-input" type="checkbox" {{$category->navbar_status=='1'?'checked':''}} name="navbar_status" id="navbar_status">
                                    </div>
                             
                              
                                    <div class="col-md-3 mb-3">
                                        <label for="status"> Status</label>
                                    
                                        <input class="form-check-input" type="checkbox" {{$category->status=='1'?'checked':''}} name="status">
                                    </div>
                                   
                                
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-success float-end">Update</button>
                        </div>
                    </form>
                  </div>
              </div>
          
        </div>
    </div>
</div>
@endsection