@extends('layouts.master')
@section('title','Category')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All Categories
            <a href="{{route('categories.create')}}" class="btn btn-primary  float-end">Add Category</a>
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
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                   @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <img style="width: 50px" src="{{asset('uploads/category/'.$category->image)}}" alt="">
                        </td>
                        <td>{{$category->status=='1'?'Hidden':'Shown'}}</td>
                        <td>
                            <a href="{{route('categories.edit',$category)}}" class="btn btn-warning btn-sm">Edit</a>
                           
                            <form action="{{route('categories.destroy',$category)}}" method="POST" style="display:inline-block">
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