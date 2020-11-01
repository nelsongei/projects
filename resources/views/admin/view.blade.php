@extends('layouts.admin')
@section('title',$user->name.' '.$user->lastName)
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            {{$user->name.' '.$user->lastName}}
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/home')}}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('/users')}}">
                                    Users
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                User Info
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-outline card-white">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if(!empty($user['image']))
                                        <img src="{{asset('')}}storage/{{$user->image}}" class="img-rounded profile-user-img img-circle" alt="user">
                                    @else
                                        <img src="{{asset('resources/settings/admin.png')}}" class="img-circle profile-user-img" alt="user">
                                    @endif
                                    <h3 class="profile-username">{{$user->name.' '.$user->lastName}}</h3>
                                        <p class="text-blue">
                                            {{$user->role->role}}
                                        </p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-white">
                            <div class="card-header">
                                <h3 class="card-title">More About {{$user->name}}</h3>
                            </div>
                            <div class="card-body">
                                <strong>Name:</strong>
                                <p class="text-muted">
                                    <i class="fa fa-user text-pink"></i>
                                    {{$user->name.' '.$user->lastName}}
                                </p>
                                <strong>Email:</strong>
                                <p class="text-muted">
                                    <i class="fa fa-envelope-open text-purple"></i>
                                    {{$user->email}}
                                </p>
                                <strong>Phone:</strong>
                                <p class="text-muted">
                                    <i class="fa fa-phone text-success"></i>
                                    {{$user->phone}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="card card-white card-tabs">
                                <div class="card-header p-0 pt-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">
                                                Update
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#showActivity" class="nav-link" id="custom-activity-tab" data-toggle="pill" role="tab" aria-controls="custom-activity-tab" aria-selected="false">
                                                Activity
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home">
                                            <div class="card card-white">
                                                <div class="col-md-12">
                                                    <form method="post" class="form-horizontal">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$user->id}}">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="name">Name</label>
                                                            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="lastName">Last Name</label>
                                                            <input type="text" name="lastName" id="lastName" class="form-control" value="{{$user->lastName}}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="" for="email">Email</label>
                                                            <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="" for="phone">Phone</label>
                                                            <input type="text" name="phone" id="phone" class="form-control" value="{{$user->phone}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="" for="role">Role</label>
                                                            <input type="text" name="email" id="role" class="form-control" value="{{$user->role->role}}" readonly>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="showActivity" role="tabpanel" aria-labelledby="custom-activity-tab">
                                            <div class="card card-white">
                                                <div class="col-md-12">
                                                    <div class="tab-pane" id="timeline">yea</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
