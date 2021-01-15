@extends('layouts.main')
@section('title','Assets')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add Asset</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/home')}}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('/create_assets')}}">
                                    Assets
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Add Asset
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
                        <div class="barcode">
                            <p class="name">{{$asset->asset_name}}</p>
                            <p class="price">Price: {{$asset->asset_seial_no}}</p>
                            {!! DNS1D::getBarcodeHTML($product->pid, "C128",1.4,22) !!}
                            <p class="pid">{{$product->pid}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
