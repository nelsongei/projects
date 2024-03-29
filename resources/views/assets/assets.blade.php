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
                                Create
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
                            <assets-component :categories="{{$categories}}" :suppliers="{{$suppliers}}"></assets-component>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
