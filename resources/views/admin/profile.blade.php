@extends('layouts.main')
@section('title','Profile')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/home')}}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Profile
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
                        <div class="card card-outline card-info">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if(empty($user['image']))
                                        <img src="{{asset('')}}storage/{{Auth::user()->image}}" class="img-rounded profile-user-img img-circle" alt="user">
                                    @else
                                        <img src="{{asset('resources/settings/admin.png')}}" class="img-circle profile-user-img" alt="user">
                                    @endif
                                    <h3 class="profile-username">{{Auth::user()->name.' '.Auth::user()->lastName}}</h3>
                                    <p class="text-warning">
                                        {{Auth::user()->role->role}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">More About {{Auth::user()->name}}</h3>
                            </div>
                            <div class="card-body">
                                <strong>Name:</strong>
                                <p class="text-muted">
                                    <i class="fa fa-user text-pink"></i>
                                    {{Auth::user()->name.' '.Auth::user()->lastName}}
                                </p>
                                <strong>Email:</strong>
                                <p class="text-muted">
                                    <i class="fa fa-envelope-open text-purple"></i>
                                    {{Auth::user()->email}}
                                </p>
                                <strong>Phone:</strong>
                                <p class="text-muted">
                                    <i class="fa fa-phone text-success"></i>
                                    {{Auth::user()->phone}}
                                </p>
                                <strong>Projects:</strong>
                                <p class="text-muted">
                                <i class="fa fa-project-diagram text-warning"></i>
                                    {{$projects}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="card card-tabs">
                                <div class="card-header p-0 pt-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a href="#updatePassword" class="nav-link text-warning" id="custom-password-tab" data-toggle="pill" role="tab" aria-controls="custom-activity-tab" aria-selected="true">
                                                Update Password
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#updateImage" class="nav-link text-warning" id="custom-image-tab" data-toggle="pill" role="tab" aria-controls="custom-activity-tab" aria-selected="false">
                                                Update Image
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="updatePassword" role="tabpanel" aria-labelledby="custom-password-tab">
                                            <div class="card card-white">
                                                @if(count($errors)>0)
                                                    @foreach($errors->all() as $error)
                                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            {{$error}}
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="col-md-12">
                                                    <form method="post" class="form-horizontal" action="{{url('/user/updatePassword')}}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="oldPass">Old Password</label>
                                                            <input type="password" name="oldPass" id="oldPass" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="password">New Password</label>
                                                            <input type="password" name="password" id="password" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="password_confirmation">Confirm Password</label>
                                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                Update Password
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="updateImage" role="tabpanel" aria-labelledby="custom-image-tab">
                                            <div class="card card-white">
                                                <div class="col-md-12">
                                                    <form method="post" class="form-horizontal" action="{{url('/user/updateProfile')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="image">Profile Picture</label>
                                                            <input type="file" name="image" id="image" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </form>
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
