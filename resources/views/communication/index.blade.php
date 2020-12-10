@extends('layouts.admin')
@section('title','Email')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-pink"><i class="fa fa-google-plus-circle"></i>Emails and Attachments</h1>
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
                                            <span class="badge bg-success float-right">1</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-trash"></i>Trash
                                            <span class="badge bg-gradient-red float-right">2</span>
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
                                        <label>
                                            <input type="text" class="form-control" placeholder="Search Inbox">
                                        </label>
                                        <div class="input-group-append">
                                            <div class="btn btn-dark">
                                                <i class="fa fa-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{$error}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
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
                                        @foreach($emails as $email)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="iCheck-primary">
                                                            <input type="checkbox" id="check1">
                                                            <label for="check1"></label>
                                                        </div>
                                                    </td>
                                                    <td class="mailbox-name">
                                                        <a href="#">{{$email->email}}</a>
                                                    </td>
                                                    <td class="mailbox-name">
                                                        @foreach($email->cc as $cc)
                                                            <dd>{{$cc}}</dd>
                                                            @endforeach
                                                    </td>
                                                    <td class="mailbox-messages">
                                                        <b>{{$email->subject}}</b> {{$email->body}}
                                                    </td>
                                                    <td class="mailbox-attachment">
                                                        @if($email->img_file != Null)
                                                            <i class="fa fa-paperclip"></i>
                                                        @endif
                                                    </td>
                                                    <td class="mailbox-date">{{$email->created_at->diffForHumans()}}</td>
                                                </tr>
                                            </tbody>
                                            @endforeach
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
                        <form class="form-horizontal" action="{{url('/mail/send')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="email">Email</label>
                                    <select name="email" class="form-control" id="email">
                                        @if(isset($users))
                                            @foreach($users as $user)
                                                <option>{{$user->email}}</option>
                                            @endforeach
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="cc">CC</label>
                                    <div class="select2-success">
                                        <select class="select2" id="cc" name="cc[]" multiple="multiple" data-dropdown-css-class="select2-success" style="width: 100%">
                                            @if(isset($users))
                                                @foreach($users as $user)
                                                    <option>{{$user->email}}</option>
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
                                    <label class="col-form-label" for="img_file">Attachment(You are able to send > 1: Max Size:2048MB)</label>
                                    <input type="file" class="form-control" name="img_file[]" id="img_file" multiple>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                    Close
                                </button>
                                <button type="submit" class="btn btn-success btn-sm">
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
