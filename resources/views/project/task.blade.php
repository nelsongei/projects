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
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <a href='{{url("project/$project->id")}}'>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="list-group">
                                            <div class="list-group-item">
                                                <h6 class="text-bold">{{$project->project}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white text-center text-bold">
                                        <div class="progress">
                                            @if($complete >99)
                                            <div class="progress-bar bg-success" role="progressbar" style="width:{{number_format($complete)}}%" aria-valuenow="{{number_format($complete)}}" aria-valuemin="0" aria-valuemax="100">
                                                {{number_format($complete)}}
                                            </div>
                                                @elseif($complete<98 && $complete>49)
                                                <div class="progress-bar bg-warning" role="progressbar" style="width:{{number_format($complete)}}%" aria-valuenow="{{number_format($complete)}}" aria-valuemin="0" aria-valuemax="100">
                                                    {{number_format($complete)}}
                                                </div>
                                            @else
                                                <div class="progress-bar bg-danger" role="progressbar" style="width:{{number_format($complete)}}%" aria-valuenow="{{number_format($complete)}}" aria-valuemin="0" aria-valuemax="100">
                                                    {{number_format($complete)}}
                                                </div>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <h3 class="text-bold text-center">You Have No Projects</h3>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
{{--<div class="col-xs-12 col-sm-6 col-md-3">--}}
{{--    <div class="info-box">--}}
{{--                            <span class="info-box-icon bg-success">--}}
{{--                                <i class="fa fa-project-diagram"></i>--}}
{{--                            </span>--}}
{{--        <div class="info-box-content">--}}
{{--            <div class="info-box-text">--}}
{{--                {{$project->project}}--}}
{{--            </div>--}}
{{--            <span class="info-box-number">--}}
{{--                                    {{number_format($complete)}}--}}
{{--                                    <small>%</small>--}}
{{--                                </span>--}}
{{--            <div class="progress">--}}
{{--                <div class="progress-bar bg-warning" style="width: 100%"></div>--}}
{{--            </div>--}}
{{--            <span class="progress-description mt-2">--}}
{{--                                    <a class="small-box-footer text-dark" href='{{url("project/$project->id")}}'>--}}
{{--                                        More Info--}}
{{--                                    </a>--}}
{{--                                </span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
