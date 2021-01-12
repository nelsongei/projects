@extends('layouts.main')
@section('title','Assets')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Category Details</h1>
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
                                    Assets
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Category Details
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
                            <details-component :category="{{$category}}"></details-component>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
