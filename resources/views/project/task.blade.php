@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">PMT</h1>
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
                    @forelse($projects as $project)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-primary elevation-1">
                                <i class="fa fa-project-diagram"></i>
                            </span>
                            <div class="info-box-content">
                                <div class="info-box-text">
                                    {{$project->project}}
                                </div>
                                <span class="info-box-number">
                                    {{number_format($complete)}}
                                    <small>%</small>
                                </span>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" style="width: 100%"></div>
                                </div>
                                <span class="progress-description mt-2">
                                    <a class="small-box-footer text-dark" href='{{url("project/$project->id")}}'>
                                        More Info
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h3 class="text-bold text-center">You Have No Projects</h3>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
