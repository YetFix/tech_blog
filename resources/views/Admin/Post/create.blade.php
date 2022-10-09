@extends('layouts.master')
@section('title','post/create')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Create a Post
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
                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="name">Post Name</label>
                                <input type="text" class="form-control" name="name" id="name"  placeholder="Post Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option selected>Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="yt_iframe">Youtube iframe Link </label>
                                <input type="text"  class="form-control" name="yt_iframe" id="yt_iframe"  
                                placeholder="youtube iframe link Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea id="summernote" class="form-control" name="description"  cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        
                        <h6>SEO Tags</h6>
                        <hr>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="meta_keyword">Meta Keywords</label>
                                <textarea class="form-control" name="meta_keyword" id="meta_keyword" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <h6>Status Mode</h6>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                              
                                  
                              
                                    <div class="col-md-3 mb-3">
                                        <label for="status"> Status</label>
                                    
                                        <input class="form-check-input" type="checkbox" name="status" id="status">
                                    </div>
                                   
                                
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary">Save Post</button>
                        </div>
                    </form>
                  </div>
              </div>
          
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({
                height: 250,  
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>
@endpush