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
                        <a href="#" class="btn btn-dark btn-block mb-3" data-toggle="modal" data-target="#sendEmail">
                            <i class="fa fa-plus fa-1x">&nbsp;Compose</i>
                        </a>
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
                                                    <div class="iCheck-primary">
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
        <div class="modal fade" id="sendEmail">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Send Mail</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            X
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="{{url('/')}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="cc">CC</label>
                                    <div class="select2-success">
                                        <select class="select2" id="cc" name="cc" multiple="multiple" data-dropdown-css-class="select2-success" style="width: 100%">
                                            @if(isset($users))
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->email}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="subject">Subject</label>
                                    <input type="text" name="subject" class="form-control" id="subject">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="body">Body</label>
                                    <textarea class="form-control" rows="5" cols="3" id="body" name="body"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label" for="file">Attachment</label>
                                    <input type="file" class="form-control" name="file" id="file" multiple>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-info" data-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                    Close
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i>
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
