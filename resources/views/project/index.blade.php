@extends('layouts.admin')
@section('title','Projects')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-indigo"><i class="fa fa-tags"></i>Projects</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/home')}}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Projects
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12 text-left mb-3">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addProject">
                                        <i class="fa fa-plus"></i>Add Project
                                    </button>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project Name</th>
                                            <th>Users</th>
                                            <th>Project Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php $count = 1;?>
                                    <tbody>
                                        @foreach($projects as $project)
                                            <tr>
                                                <td>{{$count++}}</td>
                                                <td><a href='{{url("project/$project->id")}}'>{{$project->project}}</a></td>
                                                <td>
                                                    {{$project->user->name.' '.$project->user->lastName}}
                                                </td>
                                                <td>{{$project->description}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fa fa-cogs"></i>Action
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li class="dropdown-item text-info">
                                                            <a href="{{url("project/$project->id")}}">
                                                                <i class="fa fa-eye"></i>
                                                                View Project
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-item text-success" data-toggle="modal" data-target="#editProject{{$project->id}}">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </li>
                                                        <a class="dropdown-item text-danger" href='{{url("/project/delete/$project->id")}}' onclick="return confirm('Are you sure you want to click')">
                                                            <i class="fa fa-trash"></i>
                                                            Delete
                                                        </a>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="editProject{{$project->id}}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Edit {{$project->project}}</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                X
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" class="form-horizontal" action="{{url('/project/update')}}">
                                                                @csrf
                                                                <div class="row">
                                                                    <input type="hidden" name="id" value="{{$project->id}}">
                                                                    <div class="form-group col-md-6">
                                                                        <label class="col-form-label" for="user_id">Assign To</label>
                                                                        <select class="form-control" id="user_id" name="user_id">
                                                                            @if(!is_array($users) || !is_object($users))
                                                                                @foreach($users  as $user)
                                                                                    <option value="{{$user->id}}">{{$user->name.' '.$user->lastName}}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="col-form-label" for="project">Project Name</label>
                                                                        <input type="text" class="form-control" name="project" id="project" value="{{$project->project}}">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label class="col-form-label" for="description">Description</label>
                                                                        <textarea class="form-control" id="description" name="description" rows="2" cols="1"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">
                                                                        <i class="fa fa-times"></i>
                                                                        Close
                                                                    </button>
                                                                    <button type="submit" class="btn btn-success btn-sm">
                                                                        Update
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
        <div class="modal fade" id="addProject">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add Project</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            x
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal" action="{{url('/project/add')}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="user_id">Assign To</label>
                                    <select class="form-control" id="user_id" name="user_id">
                                        @if(!is_array($users) || !is_object($users))
                                            @foreach($users  as $user)
                                                <option value="{{$user->id}}">{{$user->name.' '.$user->lastName}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="project">Project Name</label>
                                    <input type="text" class="form-control" name="project" id="project">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="2" cols="1"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                    Close
                                </button>
                                <button type="submit" class="btn btn-success btn-sm">
                                    Add Project
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
