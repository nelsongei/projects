@extends('layouts.main')
@section('title',$project->project)
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{$project->project}}</h1>
                    </div>
                    @if(Gate::check('isSuper'))
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/home')}}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('/projects')}}">
                                    Projects
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Project Info
                            </li>
                        </ol>
                    </div>
                    @else
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/home')}}">
                                        Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{url('/management')}}">
                                        My Projects
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Project Info
                                </li>
                            </ol>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($project->card as $cards)
                            @foreach($cards->tasks as $task)
                                @foreach($task->checklists as $checklist)
                                @endforeach
                                @foreach($task->feedback as $feedback)
                                    @endforeach
                            @endforeach
                        @endforeach
                        <div id="app">
                            <lists-component :project="{{$project}}"></lists-component>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
    </script>
    @endsection
