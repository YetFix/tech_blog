@extends('layouts.master')
@section('title','users')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All Users
            <a href="{{route('users.create')}}" class="btn btn-primary  float-end">Add User</a>
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
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                   @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role_as=='1'?'Admin':'User'}}</td>
                        <td>
                            <a href="{{route('users.edit',$user)}}" class="btn btn-warning btn-sm">Edit</a>
                           
                            <form action="{{route('users.destroy',$user)}}" method="POST" style="display:inline-block">
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