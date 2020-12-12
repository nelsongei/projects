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
                                        </tr>
                                    </thead>
                                    <?php $count = 1;?>
                                    <tbody>
                                        @foreach($projects as $project)
                                            <tr>
                                                <td>{{$count++}}</td>
                                                <td>{{$project->$project}}</td>
                                                <td>
                                                    @foreach($project->user as $users)
                                                        <dd>{{$users}}</dd>
                                                    @endforeach
                                                </td>
                                                <td>{{$project->description}}</td>
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
                        <form method="post" class="form-horizontal" action="{{url('/send')}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="user_id">Assign To</label>
                                    <select class="select2bs4" id="user_id" name="user_id[]" multiple="multiple" data-dropdown-css-class="select2-success">
                                        @if (isset($users))
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name.' '.$user->lastName}}</option>
                                                @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="project">Project Name</label>
                                    <input type="text" class="form-control" name="project">
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
                                    <i class="fa fa-plus"></i>
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
