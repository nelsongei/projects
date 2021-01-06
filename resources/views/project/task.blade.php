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
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div id="app">
{{--                        @foreach($project->card as $cards)--}}
{{--                            @foreach($cards->tasks as $task)--}}
{{--                                --}}
{{--                            @endforeach--}}
{{--                            {{$cards->id}}--}}
{{--                        @endforeach--}}
                            {{$card->id}}
                            <task-component :card="{{$card->id}}"></task-component>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
