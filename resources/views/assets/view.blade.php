@extends('layouts.main')
@section('title','Assets')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Asset Details</h1>
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
                                {{$asset->asset_name}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-outline card-info">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <h1 style="font-size:72px">{{strtoupper($asset->categories->category[0])}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card card-outline card-success">
                            <div class="card-body">
                                <strong>Asset Name:</strong>
                                <p class="text-muted">
                                    {{$asset->asset_name}}
                                </p>
                                <strong>Asset Type:</strong>
                                <p class="text-muted">
                                    Fixed Asset
                                </p>
                                <strong>Asset Value:</strong>
                                <p class="text-muted">
                                    {{$asset->purchase->total_amount}}
                                </p>
                                <strong>Units Bought:</strong>
                                <p class="text-muted">
                                    {{$asset->purchase->quantity}}
                                </p>
                                <strong>Price Per Unit:</strong>
                                <p class="text-muted">
                                    {{$asset->purchase->amount}}
                                </p>
                                <strong>Receipt No:</strong>
                                <p class="text-muted">
                                    {{$asset->purchase->receipt_no}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="card card-tabs">
                                <div class="card-header p-0 pt-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link text-warning active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">
                                                Asset Depreciation Rate
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-warning">
                                                Update Asset Icon
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home">
                                            <div class="card card-white">
                                                <div class="card-body">
                                                    {!! $finalChart->container() !!}
                                                    {!! $finalChart->script() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
