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
                                    @if (!$asset->image)
                                        <h1 style="font-size:72px">{{strtoupper($asset->categories->category[0])}}</h1>
                                    @else
                                        <img src="{{asset('')}}storage/{{$asset->image}}" class="img-rounded profile-user-img img-circle" alt="user">
                                    @endif
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
                                    {{$asset->categories->asset_type}}
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
                                <strong>Asset Serial No:</strong>
                                {!! DNS1D::getBarcodeHTML($asset->asset_serial_no, 'C39',2,33,'#f96f34') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="card card-tabs">
                                <div class="card-header p-0 pt-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link text-warning active" id="custom-tabs-one-home" data-toggle="pill" href="#ChartsTab" role="tab" aria-controls="custom-activity-tab" aria-selected="true">
                                                Asset Depreciation Rate
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#updateTab" class="nav-link text-warning" id="custom-update-tab" data-toggle="pill" role="tab" aria-controls="custom-activity-tab" aria-selected="false">
                                                Update Asset Icon
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#moveAsset" class="nav-link text-warning" id="custom-move-tab" data-toggle="pill" role="tab" aria-controls="custom-activity-tab" aria-selected="false">
                                                Move Asset
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="ChartsTab" role="tabpanel" aria-labelledby="custom-tabs-one-home">
                                            <div class="card card-white">
                                                <div class="card-body">
                                                    {!! $finalChart->container() !!}
                                                    {!! $finalChart->script() !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="updateTab" role="tabpanel" aria-labelledby="custom-update-tab">
                                            <div class="card card-white">
                                                <div class="card-body">
                                                    <form method="post" action="{{url('/asset/updateImage')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$asset->id}}">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="image">Asset Icon</label>
                                                            <input type="file" name="image" class="form-control" id="image">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="moveAsset" role="tabpanel" aria-labelledby="custom-move-tab">
                                            <div class="card card-white">
                                                <div class="card-header">
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalMove">
                                                        Move Assets
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Department</th>
                                                                <th>Custodian</th>
                                                                <th>Asset Moved</th>
                                                                <th>Remaining</th>
                                                                <th>Date Moved</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="modalMove">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{$asset->asset_name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <form method="post" action="{{url('api/move/store')}}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <input type="hidden" name="asset_id" value="{{$asset->id}}">
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                    <div class="form-group col-sm-6">
                                                                        <label class="col-form-label">Department</label>
                                                                        <select name="department_id" class="form-control">
                                                                            @foreach($departments as $department)
                                                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label class="col-form-label" for="quantity">Assets Available</label>
                                                                        <input type="text" value="{{$asset->inventory->quantity}}" name="quantity" id="quantity" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label class="col-form-label" for="moved">Assets Moved</label>
                                                                        <input type="text" class="form-control" value="{{$asset->inventory->moved}}" id="moved" name="moved" min="1">
                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label class="col-form-label" for="remaining">Assets remaining</label>
                                                                        <input type="number" class="form-control" id="remaining" value="{{$asset->inventory->remaining}}" name="remaining" min="1" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
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
            </div>
        </section>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //this calculates values automatically
            minus();
            $("#quantity, #moved").on("keydown keyup", function() {
                minus();
            });
        });

        function minus() {
            var num1 = document.getElementById('quantity').value;
            var num2 = document.getElementById('moved').value;
            var result1 = parseInt(num1) - parseInt(num2);
            if (!isNaN(result1)) {
                document.getElementById('remaining').value = result1;
            }
        }
    </script>
@endsection
