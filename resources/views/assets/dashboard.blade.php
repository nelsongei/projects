@extends('layouts.main')
@section('title','Assets')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Asset Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/home')}}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('/categories')}}">
                                    Category
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Assets Dashboard
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
                            <span class="info-box-icon bg-info elevation-1" style="border-radius: 50%;">
                                <i class="fa fa-box"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Assets</span>
                                <span class="info-box-number float-right">
                                    <h4 id="infoNo"><strong>{{$assets}}</strong></h4>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-white shadow-sm">
                            <span class="info-box-icon bg-success elevation-1" style="border-radius: 50%;">
                                <i class="fas fa-money-check-alt"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Assets Total Value</span>
                                <span class="info-box-number">
                                    <h4 id="infoNo">
                                        <strong>{{$assetValue}}</strong>
                                    </h4>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-white shadow-sm">
                            <span class="info-box-icon bg-success elevation-1" style="border-radius: 50%;">
                                <i class="fas fa-wrench"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Assets Require Maintenance</span>
                                <span class="info-box-number float-right">
                                    <h4 id="infoNo"><strong>0</strong></h4>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-white shadow-sm">
                            <span class="info-box-icon bg-success elevation-1" style="border-radius: 50%;">
                                <i class="fas fa-people-carry"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Assets Moved</span>
                                <span class="info-box-number float-right">
                                    <h4 id="infoNo"><strong>1</strong></h4>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <section class="col-md-12 connectedSortable">
                        <div class="card card-white">
                            <div class="card-header">
                                <h3 class="card-title">Asset Value and Depreciation</h3>
                            </div>
                            <div class="card-body">
                                {!! $assetChart->container() !!}
                                {!! $assetChart->script() !!}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
