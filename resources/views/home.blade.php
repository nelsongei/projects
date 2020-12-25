@extends('layouts.main')
@section('title','Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-muted ml-2 mt-4"><strong>Welcome,</strong>{{\Illuminate\Support\Facades\Auth::user()->name.' '.\Illuminate\Support\Facades\Auth::user()->lastName}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right ml-2">
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
                        <div class="info-box bg-white shadow-sm">
                            <span class="info-box-icon bg-success elevation-1" style="border-radius: 50%;">
                                <i class="fa fa-users"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Users</span>
                                <span class="info-box-number float-right">
                                    <h4 id="infoNo"><strong>{{$users}}</strong></h4>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-white shadow-sm">
                            <span class="info-box-icon bg-gradient-blue elevation-1" style="border-radius: 50%;">
                                <i class="fa fa-project-diagram"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Projects</span>
                                <span class="info-box-number float-right">
                                    <h4 id="infoNo"><strong>{{$projects}}</strong></h4>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-white shadow-sm">
                            <span class="info-box-icon bg-info elevation-1" style="border-radius: 50%;">
                                <i class="fa fa-check-double"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Tasks</span>
                                <span class="info-box-number float-right">
                                    <h4 id="infoNo"><strong>{{$tasks}}</strong></h4>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-white shadow-sm">
                            <span class="info-box-icon bg-danger elevation-1" style="border-radius: 50%;">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Emails</span>
                                <span class="info-box-number float-right">
                                    <h4 id="infoNo"><strong>{{$emails}}</strong></h4>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <section class="col-md-6 connectedSortable">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Communication</h3>
                            </div>
                            <div class="card-body">
                                {!! $emailCount->container() !!}
                                {!! $emailCount->script() !!}
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Projects</h3>
                            </div>
                            <div class="card-body">
                                {!! $project->container() !!}
                                {!! $project->script() !!}
                            </div>
                        </div>
                    </section>
                    <section class="col-md-6 connectedSortable">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Users</h3>
                            </div>
                            <div class="card-body">
                                {!! $usersCount->container() !!}
                                {!! $usersCount->script() !!}
                            </div>
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
