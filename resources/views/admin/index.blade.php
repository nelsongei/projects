@extends('layouts.admin')
@section('title','Users')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/home')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12 text-left mb-3">
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addNewUser">
                                        <i class="fa fa-plus"></i>Add User
                                    </button>
                                </div>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No.</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <?php $count =1;?>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>
                                                <a href="{{url("user/$user->id")}}">
                                                    {{$user->name.' '.$user->lastName}}
                                                </a>
                                            </td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->role->role}}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-cogs"></i>Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item text-info">
                                                        <a href="{{url("user/$user->id")}}">
                                                            <i class="fa fa-eye"></i>
                                                            View User
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item text-success">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </li>
                                                    <li class="dropdown-item text-danger">
                                                        <i class="fa fa-trash"></i>
                                                        Delete
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
