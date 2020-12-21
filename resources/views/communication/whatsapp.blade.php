@extends('layouts.main')
@section('title','WhatsApp')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-success"><i class="fa fa-whatsapp"></i>WhatsApp</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/home')}}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                WhatsApp
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
                        <div class="card">
                            <div class="card-header bg-white">
                                <h3 class="card-title">Contacts</h3>
                            </div>
                            <div class="card-body">
                                <ul class="contacts-list">
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="{{asset('resources/settings/admin.png')}}" alt="src">
                                            <div class="contacts-list-info">
                                        <span class="contacts-list-name text-dark">
                                            Nelson Sammy
                                            <small class="contacts-list-date float-right">12/12/2020</small>
                                        </span>
                                                <span class="contacts-list-msg text-dark">
                                            How have you been? I was...
                                        </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="{{asset('resources/settings/admin.png')}}" alt="src">
                                            <div class="contacts-list-info">
                                        <span class="contacts-list-name text-dark">
                                            Nelson Sammy
                                            <small class="contacts-list-date float-right">12/12/2020</small>
                                        </span>
                                                <span class="contacts-list-msg text-dark">
                                            How have you been? I was...
                                        </span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card direct-chat direct-chat-primary direct-chat-contacts-open">
                            <div class="card-header ui-sortable-handle">
                                <h3 class="card-title">Send Direct WhatsApp Messages</h3>
                                <div class="card-tools">
                                    <span class="badge bg-green badge-pill" data-toggle="tooltip">3</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="direct-chat-messages">
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Nelson Sammy</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>
                                        <img src="{{asset('resources/settings/admin.png')}}" alt="stc" class="direct-chat-img">
                                        <div class="direct-chat-text">
                                            Is this template really for free? That's unbelievable!
                                        </div>
                                    </div>
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Laureen Nelson</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 2:00 pm</span>
                                        </div>
                                        <img src="{{asset('resources/settings/admin.png')}}" alt="stc" class="direct-chat-img">
                                        <div class="direct-chat-text">
                                            Is this template really for free? That's unbelievable!
                                        </div>
                                    </div>
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Nelson Sammy</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>
                                        <img src="{{asset('resources/settings/admin.png')}}" alt="stc" class="direct-chat-img">
                                        <div class="direct-chat-text bg-pink">
                                            Is this template really for free? That's unbelievable!
                                        </div>
                                    </div>
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Laureen Nelson</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 2:00 pm</span>
                                        </div>
                                        <img src="{{asset('resources/settings/admin.png')}}" alt="stc" class="direct-chat-img">
                                        <div class="direct-chat-text bg-warning">
                                            Is this template really for free? That's unbelievable!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary">Send</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
