@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon">
                                <i class="fa fa-user-o"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Users</span>
                                <span class="info-box-number">{{$users}}</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description mt-2">
                                    <a href="{{url('/users')}}" class="small-box-footer text-white">
                                        More Info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-pink">
                            <span class="info-box-icon">
                                <i class="fa fa-telegram"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Flights</span>
                                <span class="info-box-number">{{$users}}</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description mt-2">
                                    <a href="{{url('/users')}}" class="small-box-footer text-white">
                                        More Info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon">
                                <i class="fa fa-hotel"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Hotels</span>
                                <span class="info-box-number">{{$users}}</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description mt-2">
                                    <a href="{{url('/users')}}" class="small-box-footer text-white">
                                        More Info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon">
                                <i class="fa fa-users"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Clients</span>
                                <span class="info-box-number">{{$users}}</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description mt-2">
                                    <a href="{{url('/users')}}" class="small-box-footer text-white">
                                        More Info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <section class="col-md-6 connectedSortable">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Booking</h3>
                            </div>
                            <div class="card-body"></div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Notifications</h3>
                            </div>
                            <div class="card-body"></div>
                        </div>
                    </section>
                    <section class="col-md-6 connectedSortable">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Activity</h3>
                            </div>
                            <div class="card-body"></div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Monetization</h3>
                            </div>
                            <div class="card-body"></div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
