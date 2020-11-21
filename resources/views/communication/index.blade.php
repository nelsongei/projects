@extends('layouts.admin')
@section('title','Email')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Emails and Attachments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/home')}}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Emails and Attachment
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
                        <a href="#" class="btn btn-dark btn-block mb-3">Compose</a>
                        <div class="card card-white card-outline">
                            <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item active">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-inbox"></i>Inbox
                                            <span class="badge bg-primary float-right">12</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-envelope"></i>Sent
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header bg-white">
                                <h3 class="card-title">Inbox</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" placeholder="Search Inbox">
                                        <div class="input-group-append">
                                            <div class="btn btn-dark">
                                                <i class="fa fa-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="mailbox-controls">
{{--                                    Todo webhooks and send mails with attachments--}}
                                    <button type="button" class="btn btn-default btn-sm checkbox-inline">
                                        <i class="fa fa-square"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm">
                                            <i class="fa fa-check-circle"></i>
                                        </button>
                                        <button type="button" class="btn bg-white btn-sm">
                                            <i class="fa fa-reply-all"></i>
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fa fa-circle-o"></i>
                                    </button>
                                    <div class="float-right">
                                        1-50/200
                                        <div class="btn btn-group">
                                            <button type="button" class="btn btn-sm btn-default">
                                                <i class="fa fa-chevron-left"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-default">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" id="check1">
                                                        <label for="check1"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star">
                                                    <a href="#">
                                                        <i class="fa fa-star text-warning fa-lg"></i>
                                                    </a>
                                                </td>
                                                <td class="mailbox-name">
                                                    <a href="#">Nelson Sammy</a>
                                                </td>
                                                <td class="mailbox-messages">
                                                    <b>Subject</b> Trying to fetch data using webhooks
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">1 min ago</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection