@extends('layouts.master')
@section('title','posts')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All Posts
            <a href="{{route('posts.create')}}" class="btn btn-primary  float-end">Add Post</a>
        </div>
       
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                   @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->status=='1'?'Hidden':'Visible'}}</td>
                        <td>
                            <a href="{{route('posts.edit',$post)}}" class="btn btn-warning btn-sm">Edit</a>
                           
                            <form action="{{route('posts.destroy',$post)}}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection