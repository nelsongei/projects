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
                                    <i class="fa fa-envelope-open text-pink"></i>
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
                </div>
            </div>
        </section>
    </div>
@endsection
