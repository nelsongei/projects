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
                                                    <li class="dropdown-item text-success" data-toggle="modal" data-target="#editUser{{$user->id}}">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </li>
                                                    <a class="dropdown-item text-danger" href='{{url("/user/delete/$user->id")}}' onclick="return confirm('Are you sure you want to click')">
                                                        <i class="fa fa-trash"></i>
                                                        Delete
                                                    </a>
                                                </ul>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editUser{{$user->id}}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update User<span class="badge badge-success badge-dark">{{$user->id}}</span></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            X
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" class="form-horizontal" action="{{url('/user/update')}}">
                                                            @csrf
                                                            <div class="row">
                                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                                <div class="form-group col-md-6">
                                                                    <label class="col-form-label" for="name">First Name</label>
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="col-form-label" for="lastName">Last Name</label>
                                                                    <input type="text" class="form-control" id="lastName" name="lastName" value="{{$user->lastName}}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="col-form-label" for="phone">Phone</label>
                                                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="col-form-label" for="email">Email</label>
                                                                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="col-form-label" for="role_id">Role</label>
                                                                    <select name="role_id" class="form-control" id="role_id">
                                                                        @if(isset($roles))
                                                                            @foreach($roles as $role)
                                                                                <option value="{{$role->id}}">{{$role->role}}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">
                                                                    <i class="fa fa-close"></i>Close
                                                                </button>
                                                                <button type="submit" class="btn btn-success btn-sm">
                                                                    <i class="fa fa-plus"></i>Update User
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="addNewUser">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add User</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            X
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="{{url('/user/add')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="name">First Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="role_id">Role</label>
                                    <select name="role_id" class="form-control" id="role_id">
                                        @if(isset($roles))
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->role}}</option>
                                            @endforeach
                                            @endif
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-info btn-sm" type="button" data-dismiss="modal">
                                    <i class="fa fa-close"></i>Close
                                </button>
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i>Add User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
