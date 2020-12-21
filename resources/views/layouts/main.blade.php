<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app_name','Project Management Tool')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/toastr/toastr.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/dist/css/zalegohrstyles.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/daterangepicker/daterangepicker.css')}}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/summernote/summernote-bs4.css')}}">
    <!--Select2 CSS-->
    <link rel="stylesheet" href="{{asset('resources/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">



    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>



    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/w3v3.css')}}">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <script src="https://js.cx/libs/animate.js"></script>
    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    <style type="text/css">
        @font-face {
            font-family: Poppins-Regular;
        }

        @font-face {
            font-family: Poppins-Medium;
        }

        @font-face {
            font-family: Poppins-Bold;
        }

        @font-face {
            font-family: Poppins-SemiBold;
        }

        html,body{
            color: rgb(35, 45, 100);
            font-size: 12px;
            overflow-x: hidden !important;
            font-family: tahoma, serif !important;
        }
        .imgWrapper{
            background-color:rgba(255, 155, 68, 0.2);;
            width: 39px;
            height: 39px;
            padding: 7px;
            margin-bottom: -20px;
            margin-top: -20px;
            border-radius: 50%;
        }

        .bs-tooltip-top{
            padding: -10rem 0;
        }



        .dropdown-menu{
            border-color: transparent;
        }

        .dropdown-item{
            font-size: 14px;
        }


        .breadcrumb{
            font-size: 13px;
        }

        .nav-item{
            font-weight: 429;
            line-height: 25px;
        }


        .nav-link{

            color:  #fff !important;
            font-size: 13px;

        }
        .nav-link2:hover{
            background:rgb(64, 60, 93);
            color: #8e98d7 !important;
            font-size: 13px;
        }


        .logoText{
            font-size: 24px !important;
            margin-top:-9px !important;
            color:  rgb(35, 45, 100) !important;
        }

        .main-sidebar{
            -webkit-box-shadow: 0 1rem 1rem rgba(46, 68, 105, 0.175) !important;
            box-shadow: 0 1rem 1rem rgba(46, 68, 105, 0.175) !important;
        }

        .content-wrapper{
            background-color:#f5f7f8 !important;
        }

        .os-theme-light>.os-scrollbar>.os-scrollbar-track>.os-scrollbar-handle {
            background: #dfe3e8  !important;
        }

        #infoNo{
            font-size:33px;
            color: #647489;
        }

        .bg-warning{
            background-color: #F96F34 !important;
        }
        .bg-info{
            background-color: #668cff !important;
        }

        .info-box-content{
            position:absolute; right: 0 !important;
        }

        .info-box-text{
            font-weight: bold;
        }

        .info-box .info-box-icon {
            border-radius: 0.25rem;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            font-size: 1.875rem;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            width: 65px;
            margin-left:10px;
        }

        .breadcrumb{
            font-size: 12px;
        }

        .dropdown-item{
            font-size: 12px;
        }

        tr th, tr td, label{
            color: #6c757d !important;
        }

        .pillLink {

            color: #333 !important;
        }



        .nav-pills .nav-item.show .nav-link, .nav-pills .nav-link.active {
            background-color: #f96f34;
            border-color: #f96f34;
            color: #fff !important;
            -webkit-box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
        }

        .btn-default:focus{
            background-color: #f96f34;
            border-color: #f96f34;
            color: #fff !important;
            -webkit-box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
        }

        .btn-default:hover{
            background-color: #f96f34;
            border-color: #f96f34;
            color: #fff !important;
            -webkit-box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
        }




        .files input {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            padding: 120px 0px 85px 35%;
            text-align: center !important;
            margin: 0;
            width: 100% !important;
        }
        .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
        }
        .files{ position:relative}
        .files:after {  pointer-events: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 50px;
            right: 0;
            height: 56px;
            content: "";
            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .color input{ background-color:#f1f1f1;}
        .files:before {
            position: absolute;
            bottom: 10px;
            padding-top:30px !important;
            left: 0;  pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: "Drag and drop a file here/ Click to select. ";
            display: block;
            margin: 0 auto;
            color: #2ea591;
            font-weight: 600;
            text-transform: capitalize;
            text-align: center;
        }




        .bg-primary, .btn-primary{
            background-color: #668cff;
            border-color: #668cff;
        }

        .bg-success,  .alert-success
        {
            background-color: #00cc44;
            border-color: #00cc44;
        }

        .btn-warning,.bg-warning,  .alert-warning
        {
            background-color: #F96F34;
            border-color: #F96F34;
            color: #fff;
        }
        .btn-submit{
            transition: 0.4s;
        }

        .alert-danger{
            background-color: rgb(220, 53, 69);
            color: #fff;
            font-size: 10px;
        }

        .btn-warning1:hover{
            background-color: #f75008;
            border-color: #f75008;
            color: #fff;
        }

        .btn-primary1.active{
            background-color: #f75008;
            border-color: #f75008;
            color: #fff;
        }

        .btn-submit:hover, .btn-warning:hover,.btn-primary:hover,.btn-danger:hover,.btn-success:hover{
            -webkit-box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
        }

        .btn-submit:focus, .btn-warning:focus,.btn-primary:focus,.btn-danger:focus,.btn-success:focus{
            -webkit-box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
        }

        .btn-primary1{
            background-color: transparent;
            border-color: #0033cc;
            color: #0033cc;
        }

        .btn-success1{
            background-color: transparent;
            border-color: #00cc44;
            color:#00cc44;
        }

        .btn-secondary1{

            background-color: transparent;
            border-color: #993399;
            color: #993399;
        }

        .btn-secondary1:focus{

            background-color: #993399;
            border-color: #993399;
            color: #fff;
        }

        .btn-warning1{

            background-color: transparent;
            border-color: #F96F34;
            color: #F96F34;
        }

        .btn-primary1:focus{
            background-color: #0063cc;
            border-color: #0063cc;
            color: #fff;
        }

        .btn-warning1:focus{
            background-color: #f75008;
            border-color: #f75008;
            color: #fff;
        }

        .btn-success1:focus{
            background-color:  #00cc44;
            border-color:  #00cc44;
            color: #fff;

        }


        .modal-content {

            -webkit-box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;

            background-color: #fff;
            border-color: transparent;

        }

        .modal-dialog {
            margin-top: 40px !important;
        }

        .profileHolder{
            border:5px solid #f9f8f8;
        }

        .modalCardBody{
            background:#eef2f4;
            border-radius:2px;
            margin-top:-3px !important;
            margin:30px 20px;
        }

        .modal-body {

            padding: 2rem;
            background-color: #fff;
        }

        .modal-backdrop {
            background-color: #000;
            transition:1.0s linear;
        }

        .modal-backdrop.fade {
            opacity: 0;
        }

        .modal-backdrop.show {
            opacity: 0.03;
        }



        .btn-error{
            position: fixed;
            z-index: 999;
            display: none;
            right:0;
            margin-right: 5px;
        }

        .errorSheet{
            display: none;
            right: 0;
            z-index: 999;
            position: fixed;
            margin-right: 5px;
            top:200px;
            min-width: 300px;
        }

        #nameError,#passwordError,#contactError,#cPasswordError,#emailError{
            display: none;
        }

        .imageHolder{
            width: 97px;
            height: 97px;
            border: 3px solid #d1d3e2 !important;
            border-radius: 4px;
            margin-bottom: 7px;
            position: absolute;
            z-index: 999;
            right: 0;
            margin-right: 30px;
            margin-top: 40px;
        }


        /**.sidebar, .brand-link{
           background: #2e4469; /* For browsers that do not support gradients
          background: -webkit-linear-gradient(left,#2e4469,#273959);
          background: -o-linear-gradient(right,#2e4469,#273959);
          background: -moz-linear-gradient(right,#2e4469,#273959);
          background: linear-gradient(to right, #2e4469,#273959);
        }
        */

        .border-bottom{
            border-bottom: 1px solid #2f456a !important;
        }

        #progress {
            border-bottom: 5px solid #fff;
            width: 0;
            position: relative;
            margin-top: 0px;
            left: 0;
            border-radius: 3px 3px 0px 0px;
            transition: .7s linear;
        }


        hr{
            height: 1px;
            background-color: #d4d7de;
            border: none;
        }

        .infoText{
            font-size: 14px;
        }

        .btn-header{
            background: #F96F34;
            border-color: #F96F34;
            font-size: 17px !important;
            font-family: calibri;
            border-radius: 40px;
            -webkit-box-shadow: 0 1rem 3rem rgba(250, 132, 82, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(250, 132, 82, 0.175) !important;
        }

        .btn-header:hover{
            background: #F96F34;
            border-color: #F96F34;
        }

        .btn-header a:hover{
            color: #fff !important;

        }

        .btn-toggle{
            background: #F96F34;
            border-color: #F96F34;
            -webkit-box-shadow: 0 1rem 3rem rgba(251, 167, 131, 0.475) !important;
            box-shadow: 0 1rem 3rem rgba(251, 167, 131, 0.475) !important;
            position: relative;
            margin-left:-34px;
            z-index:9999 !important;
            border-radius: 30%;
        }

        .btn-toggle:hover{
            background: #F96F34;
            border-color: #F96F34;
        }

        .btn-toggle a:hover{
            color: #fff;
            background: #F96F34;
            border-color: #F96F34;
        }

        .btn-primary{
            background-color: #f96f34;
            border-color: #f96f34;
            color: #fff !important;
            -webkit-box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
        }

        .btn-primary:active{
            background-color: #f96f34;
            border-color: #f96f34;
            color: #fff !important;
            -webkit-box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
        }



        .btn-primary:focus{
            background-color: #f96f34;
            border-color: #f96f34;
            color: #fff !important;
            -webkit-box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(172, 56, 6, 0.175) !important;
        }

        .loader1 {
            border: 16px solid #f97339;
            border-radius: 50%;
            border-top: 16px solid #f96f34;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .text-warning{
            color: #F96F34 !important;
        }

        #brick {
            width: 40px;
            height: 20px;
            background: #EE6B47;
            position: relative;
            cursor: pointer;
            display: none;
        }

        .theme-purple{
            background: linear-gradient(-135deg,#899FD4 0%,#A389D4 100%);
        }
        .theme-green{
            background: linear-gradient(-135deg,#1de9b6 0%,#1dc4e9 100%);
        }

        .theme-green-text{
            color: #1dc4e9;
        }
    </style>


    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript">


        $(document).ready(function() {
            $('#example').DataTable();
        });
        // Javascript to enable link to tab
        setTimeout(tab,1);
        function tab(){
            $(document).ready(function() {
                if (location.hash) {
                    $("a[href='" + location.hash + "']").tab("show");
                }
                $(document.body).on("click", "a[data-toggle='tab']", function(event) {
                    location.hash = this.getAttribute("href");
                });
            });
            $(window).on("popstate", function() {
                var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
                $("a[href='" + anchor + "']").tab("show");
            });

            $('#mydate').datepicker({
                container: ".bdc"
            });
        };


        // setInterval(notifications,1000);

        function notifications(){
            //get notifications
            $.ajax({
                url:"http://localhost/hr/public/getNotifications",
                type:'GET',
                data:'_token=<?php echo csrf_token() ;?>',
                success:function(data){
                    if(data.success=='1'){
                        var output='';
                        var count=0;
                        for(var x=0;x<data.notifications.length;x++){
                            count+=data.notifications[x]['total'];
                            output+='<div class="dropdown-divider"></div><a href="http://localhost/hr/public'+data.notifications[x]['linkurl']+data.notifications[x]['linkindex']+'" class="dropdown-item"><span class="mr-2">'+data.notifications[x]['linkicon']+'</span>'+data.notifications[x]['total']+' '+data.notifications[x]['notification']+'<span class="float-right text-muted text-sm">Not read</span> </a>';
                        }
                        document.getElementById('nHolder').innerHTML=output;
                        document.getElementById('countNot').innerHTML=count;
                        document.getElementById('countNot1').innerHTML=count;
                    } else{

                    }
                }
            });
        }

        // setInterval(notifications,1000);

        function notifications(){
            //get notifications
            $.ajax({
                url:"http://localhost/hr/public/getNotifications",
                type:'GET',
                data:'_token=<?php echo csrf_token() ;?>',
                success:function(data){
                    if(data.success=='1'){
                        if(data.notifications.length>0){
                            var output=' <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">';
                            var count=0;
                            for(var x=0;x<data.notifications.length;x++){
                                count++;
                                output+='<a href="#" class="dropdown-item"><!-- Message Start --><div class="media"><div  style="background: #ddd; border:1px solid #ddd; width:50px; height: 50px; border-radius:  50%;" title="From '+data.notifications[x]['byy']+'"><h3 style="margin-top: 7px;">'+data.notifications[x]['byy'].substring(0,3)+'</h3></div><divclass="media-body"><h3 class="dropdown-item-title">'+data.notifications[x]['byy']+'<span class="float-right text-sm text-danger"><i class="fas fa-user"></i> Admin</span></h3><p class="text-sm">'+data.notifications[x]['action']+'</p><p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> '+data.notifications[x]['created_at']+'</p></div></div> <!-- Message End --></a><div class="dropdown-divider"></div>';
                            }
                            output+='</div>'
                            document.getElementById('nHolder2').innerHTML=output;
                            document.getElementById('countNot2').innerHTML=count;
                        }else{

                            output='<div class="py-3"><center style="color:  #b3cccc !important;"><i class="fas fa-file fa-5x"></i><i class="fas fa-times fa-2x" style="z-index: 9999; color: #fff; margin-left: -25px;"></i><br><h6>No notifications available</h6></center></div>';
                            document.getElementById('nHolder2').innerHTML=output;
                            document.getElementById('countNot2').innerHTML=0;
                        }



                    } else{

                    }
                }
            });
        }

    </script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar fixed-topnav navbar-expand navbar-white navbar-light py-3">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <button class="btn btn-default btn-toggle">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="ml-3 fas fa-bars" style="margin-top:-6px !important;"></i></a>
            </button>
            <li class="nav-item d-none d-sm-inline-block" id="companyName" style="padding-top: 5px;"><a class="nav-link logoText pt-3"  href="{{url('/home')}}">Project Management Tool </a></li>

        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto" >
            <span class="ml-5 bg-white px-3 shadow-sm" style="margin-top: -6px;">
                <h4 id="clockdisplayDesktop" class="text-muted">00:00:00 AM</h4>
            </span>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-bell text-muted"></i>
                    <span class="badge badge-success navbar-badge">
                        {{auth()->user()->unreadNotifications->count()}}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header text-dark">
                        <span class="badge bg-success badge-pill">{{auth()->user()->unreadNotifications->count()}}</span> New Notification
                    </span>
                    <div class="dropdown-divider"></div>
                    @if((auth()->user()->unreadNotifications->count())>0)
                        <a href="{{url('userRead')}}" class="text-center">Mark all as Read</a>
                    @endif
                    @foreach (auth()->user()->unreadNotifications as $notification)
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-bell mr-0"></i>
                            {{$notification->data['data']}}
                            <span class="float-left text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                        </a>
                    @endforeach
                    <span class="dropdown-item dropdown-footer">
                        See All Notifications
                    </span>
                </div>
            </li>
            <!-- User Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    @if(Auth::user()->image=="")
                        <span class="img-circle elevation-1 bg-warning text-white px-3 py-3">
                       <strong style="color: #fff !important;">
                         <?php
                           $str=Auth::user()->name;
                           echo strtoupper($str[0]);
                           ?>
                       </strong>
                     </span>
                    @else
                        <img src="{{Auth::user()->image}}" width="30px" height="30px" class="img-circle elevation-1" alt="User Image" style="margin-top:-4px; ">
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">  {{Auth::user()->name.' '.auth::user()->lastName}}</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog mr-2"></i> Settings
                    </a>
                    <a class="dropdown-item" href="#"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off mr-2"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar" style="background-image:url('https://127.0.0.1/MyProject/public/assets/images/shots/10.jpg'); background-repeat: repeat-y;">
        <!-- Brand Logo -->
        <a href="{{url('/home')}}" class="brand-link" style=" padding-top: 1.4rem !important; padding-bottom: 1.25rem !important; background-color:rgb(75, 71, 109) !important;">

      <center><img src="{{asset('resources/settings/logo.png')}}" width="33px" height="33px" alt="Zalego Smart Hr Logo"
                                             class="imgWrapper"></center>
        </a>
        <!-- Sidebar -->
        <div class="sidebar" style=" background-color:rgb(75, 71, 109) !important; ">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header btn btn-primary btn-header">
                        <a href="{{url('/home')}}">Dashboard</a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-project-diagram fa-fw"></i>
                            <p>
                                Project Management
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/projects')}}" class="nav-link">
                                    <p class="ml-3">
                                        <i class="nav-icon fa fa-tag"></i>
                                        Projects
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p class="ml-3">
                                        <i class="nav-icon fa fa-pen"></i>
                                        Management
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-phone fa-fw"></i>
                            <p>
                                Communication
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/mails')}}" class="nav-link">
                                    <p class="ml-3">
                                        <i class="nav-icon fa fa-envelope-open"></i>
                                        Multiple Emails
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/whatsapp')}}" class="nav-link">
                                    <p class="ml-3">
                                        <i class="nav-icon fa fa-comment"></i>
                                        WhatsApp
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-plug fa-fw"></i>
                            <p>
                                Administration
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/users')}}" class="nav-link">
                                    <p class="ml-3">
                                        <i class="nav-icon fa fa-users"></i>
                                        Users
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('#')}}" class="nav-link">
                                    <p class="ml-3">
                                        <i class="nav-icon fa fa-cogs"></i>
                                        Profile
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/logout')}}" class="nav-link">
                            <i class="nav-icon fa fa-power-off"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->

    </aside>

@yield('content')


    <audio style="display: none;" id="notificationSound">
        <source src="{{asset('images/notification.mp3')}}" type="audio/mpeg">
    </audio>
    <!--help modal-->
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy;
            <script type="text/javascript">
                document.write(new Date().getFullYear());
            </script>
            <a href="#"><strong class="text-warning">Project Management Tool</strong></a> All Right Reserved
        </strong>
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $.widget.bridge('uibutton', $.ui.button)
</script>

{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
<!-- Sparkline -->
<script src="{{asset('assets/dashboard/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('assets/dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/dashboard/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/dashboard/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

{{--<!-- AdminLTE App -->--}}
<script src="{{asset('assets/dashboard/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/dashboard/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dashboard/dist/js/demo.js')}}"></script>
<script src="{{asset('resources/select2/js/select2.full.js')}}"></script>
<script src="{{asset('resources/sweetalert2/sweetalert2.min.js')}}"></script>
@include('sweetalert::alert')
<script type="text/javascript">
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        closeOnSelect: false,
        allowClear: true
    })
</script>

<script>
    var editor_config = {
        path_absolute : "",
        selector: "textarea.my-editor",
        setup : function(ed){
            ed.on('init',function(){
                this.getDoc().body.style.fontFamily='Tw Cen MT';
                this.getDoc().body.style.fontSize='44';
            });
        },
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolot",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>



<!-- DataTables -->
<script src="{{asset('assets/dashboard/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>

    $(function () {
        $("#employees").DataTable();
        $("#departments").DataTable();
        $("#companies").DataTable();
        $("#designations").DataTable();
        $('#employeesalarys').DataTable();
        $('#loanedd').DataTable();
        $('#perfomanceTracker').DataTable();
        $('#advancePay').DataTable();
        $('#approvedExpense').DataTable();
        $('#pendingExpense').DataTable();
        $('#disExpense').DataTable();
        $('#contract').DataTable();
        $('#contracts').DataTable();
        $('#leaves').DataTable();
        $('#leaves2').DataTable();
        $('#confirmations').DataTable();
        $('#pyrolls').DataTable();
        $('#bftt').DataTable();
        $('.musters').DataTable();
        $('#pyreports').DataTable();
        $('#perfomancess').DataTable();
        $('#mail_body').DataTable();
        $('#customTemps').DataTable();
    });

    function pint(){
        document.getElementById('footer').style.display='none';
        document.getElementById('address').style.display='block';
        window.print();
    }


    function reloaderr(){
        var pathh=window.location.href;
        window.location.assign(pathh);
    }


    //time renderer
    function renderTimeDesktop() {

        var currentTime= new Date();
        var diem = "AM"
        var h = currentTime.getHours();
        var m = currentTime.getMinutes();
        var s = currentTime.getSeconds();


        if (h ==0){
            h = 12
        }   else if (h>12) {
            h = h - 12;
            diem = "PM";

        }

        if (h<10){
            h = "0" + h;

        }

        if (m<10){
            m = "0" + m;

        }

        if (s<10){
            s = "0" + s;

        }


        var myClock = document.getElementById('clockdisplayDesktop')
        //myClock.textContent = h + ":" + m + ":" + s + " " +diem;
        myClock.innerHTML = h + ":" + m + ":" + s + " " + "<sup style='font-size:12px;'>"+diem+"</sup>";
        setTimeout(renderTimeDesktop,1000);
    }


    renderTimeDesktop();


    function makeEaseOut(timing) {
        return function(timeFraction) {
            return 1 - timing(1 - timeFraction);
        }
    }

    function bounce(timeFraction) {
        for (let a = 0, b = 1, result; 1; a += b, b /= 2) {
            if (timeFraction >= (7 - 4 * a) / 11) {
                return -Math.pow((11 - 6 * a - 11 * timeFraction) / 4, 2) + Math.pow(b, 2)
            }
        }
    }

    let bounceEaseOut = makeEaseOut(bounce);

    window.onload = function() {
        $("#brick").fadeIn(3500);
        animate({
            duration: 3000,
            timing: bounceEaseOut,
            draw: function(progress) {
                brick.style.left = progress * 50 + '%';
            }
        });

        setInterval(Incrementerr,20);
        var x=0;
        function Incrementerr(){
            x=x+1;
            if(x<=document.getElementById('incrementHolder').value){
                document.getElementById('increment').innerHTML=x;
            }


        }
    };
</script>


</body>
</html>



