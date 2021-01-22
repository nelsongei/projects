@if(Gate::check('isSuper'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app_name','Project Management Tool')}}</title>
    <link rel="shortcut icon" href="{{asset('public/resources/settings/fav-icon.PNG')}}" type="image/png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <!-- <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script> -->
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/toastr/toastr.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/dist/css/zalegohrstyles.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/daterangepicker/daterangepicker.css')}}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/summernote/summernote-bs4.css')}}">
    <!--Select2 CSS-->
    <link rel="stylesheet" href="{{asset('public/resources/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/resources/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/w3v3.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
{{--    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>--}}
    <link rel="stylesheet" href="{{asset('public/assets/css/app.css')}}">
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
                            <br/>
                            <span class="float-left text-muted text-bold text-sm">{{$notification->created_at->diffForHumans()}}</span>
                        </a>
                    @endforeach
                    <span class="dropdown-item dropdown-footer">
                        <a href="{{url('notifications')}}">See All Notifications</a>
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
                        <img src="{{asset('')}}storage/{{Auth::user()->image}}" width="30px" height="30px" class="img-circle elevation-1" alt="User Image" style="margin-top:-4px; ">
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">  {{Auth::user()->name.' '.auth::user()->lastName}}</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{url('/profile')}}" class="dropdown-item">
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
    <aside class="main-sidebar" >
        <!-- Brand Logo -->
        <a href="{{url('/home')}}" class="brand-link" style=" padding-top: 1.4rem !important; padding-bottom: 1.25rem !important; background-color:rgb(75, 71, 109) !important;">

      <center><img src="{{asset('public/resources/settings/logo.png')}}" width="33px" height="33px" alt="Zalego Smart Hr Logo" class="imgWrapper"></center>
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
                            <i class="nav-icon fa fa-barcode fa-fw"></i>
                            <p>
                                Assets Management
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/categories')}}" class="nav-link">
                                    <p class="ml-3">
                                        <i class="nav-icon fa fa-arrow-alt-circle-down"></i>
                                        Assets
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
                                <a href="{{url('/profile')}}" class="nav-link">
                                    <p class="ml-3">
                                        <i class="nav-icon fa fa-user-circle"></i>
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


{{--    <audio style="display: none;" id="notificationSound">--}}
{{--        <source src="{{asset('images/notification.mp3')}}" type="audio/mpeg">--}}
{{--    </audio>--}}
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

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{--<script>--}}
{{--    $(function () {--}}
{{--        $('[data-toggle="tooltip"]').tooltip()--}}
{{--    });--}}

{{--    $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}
<!-- jQuery UI 1.11.4 -->
{{--<script src="{{asset('assets/dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>--}}
<script src="{{ asset('public/js/app.js') }}" defer></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- DataTables -->
<script src="{{asset('public/assets/dashboard/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/assets/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/resources/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/assets/dashboard/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/assets/dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/assets/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/assets/dashboard/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/assets/dashboard/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/assets/dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/assets/dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
{{--<script src="https://js.cx/libs/animate.js"></script>--}}
{{--<!-- AdminLTE App -->--}}
{{--<script src="{{asset('assets/dashboard/dist/js/adminlte.js')}}"></script>--}}
{{--<script src="{{asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{asset('assets/dashboard/dist/js/pages/dashboard.js')}}"></script>--}}
<!-- AdminLTE for demo purposes -->
{{--<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>--}}
<script src="{{asset('public/assets/dashboard/dist/js/demo.js')}}"></script>
<script src="{{asset('public/resources/select2/js/select2.full.js')}}"></script>
<script src="{{asset('public/resources/sweetalert2/sweetalert2.min.js')}}"></script>
@include('sweetalert::alert')
<script type="text/javascript">
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        closeOnSelect: false,
        allowClear: true
    })
    // $(function () {
    //     $("#example1").DataTable();
    //     $('#example2').DataTable({
    //         "paging": true,
    //         "lengthChange": false,
    //         "searching": false,
    //         "ordering": true,
    //         "info": true,
    //         "autoWidth": false,
    //     });
    // });
</script>

<script>
    function renderTimeDesktop() {

        var currentTime= new Date();
        var diem = "AM"
        var h = currentTime.getHours();
        var m = currentTime.getMinutes();
        var s = currentTime.getSeconds();


        if (h ===0){
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
</script>
</body>
</html>
@else
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{config('app_name','Project Management Tool')}}</title>
        <link rel="shortcut icon" href="{{asset('public/resources/settings/fav-icon.PNG')}}" type="image/png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <!-- <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script> -->
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/jqvmap/jqvmap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/toastr/toastr.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/dist/css/zalegohrstyles.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/daterangepicker/daterangepicker.css')}}">

        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/summernote/summernote-bs4.css')}}">
        <!--Select2 CSS-->
        <link rel="stylesheet" href="{{asset('public/resources/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/resources/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/w3v3.css')}}">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="{{asset('public/assets/dashboard/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
        {{--    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>--}}
        <link rel="stylesheet" href="{{asset('public/assets/css/app.css')}}">
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
                                <br/>
                                <span class="float-left text-muted text-bold text-sm">{{$notification->created_at->diffForHumans()}}</span>
                            </a>
                        @endforeach
                        <span class="dropdown-item dropdown-footer">
                        <a href="{{url('notifications')}}">See All Notifications</a>
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
                            <img src="{{asset('')}}storage/{{Auth::user()->image}}" width="30px" height="30px" class="img-circle elevation-1" alt="User Image" style="margin-top:-4px; ">
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">  {{Auth::user()->name.' '.auth::user()->lastName}}</span>
                        <div class="dropdown-divider"></div>
                        <a href="{{url('/profile')}}" class="dropdown-item">
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
        <aside class="main-sidebar" >
            <!-- Brand Logo -->
            <a href="{{url('/home')}}" class="brand-link" style=" padding-top: 1.4rem !important; padding-bottom: 1.25rem !important; background-color:rgb(75, 71, 109) !important;">

                <center><img src="{{asset('public/resources/settings/logo.png')}}" width="33px" height="33px" alt="Zalego Smart Hr Logo" class="imgWrapper"></center>
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
                                    Projects
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{url('/projects')}}" class="nav-link">--}}
{{--                                        <p class="ml-3">--}}
{{--                                            <i class="nav-icon fa fa-tag"></i>--}}
{{--                                            Projects--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li class="nav-item">
                                    <a href="{{url('/management')}}" class="nav-link">
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
{{--                        <li class="nav-item has-treeview">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="nav-icon fa fa-plug fa-fw"></i>--}}
{{--                                <p>--}}
{{--                                    Administration--}}
{{--                                    <i class="right fa fa-angle-left"></i>--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                            <ul class="nav nav-treeview">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{url('/users')}}" class="nav-link">--}}
{{--                                        <p class="ml-3">--}}
{{--                                            <i class="nav-icon fa fa-users"></i>--}}
{{--                                            Users--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{url('/profile')}}" class="nav-link">--}}
{{--                                        <p class="ml-3">--}}
{{--                                            <i class="nav-icon fa fa-user-circle"></i>--}}
{{--                                            Profile--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
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


    {{--    <audio style="display: none;" id="notificationSound">--}}
    {{--        <source src="{{asset('images/notification.mp3')}}" type="audio/mpeg">--}}
    {{--    </audio>--}}
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

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    {{--<script>--}}
    {{--    $(function () {--}}
    {{--        $('[data-toggle="tooltip"]').tooltip()--}}
    {{--    });--}}

    {{--    $.widget.bridge('uibutton', $.ui.button)--}}
    {{--</script>--}}
    <!-- jQuery UI 1.11.4 -->
    {{--<script src="{{asset('assets/dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>--}}
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- DataTables -->
{{--    <script src="{{asset('assets/dashboard/plugins/datatables/jquery.dataTables.js')}}"></script>--}}
{{--    <script src="{{asset('assets/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>--}}
    <!-- AdminLTE App -->
    <script src="{{asset('public/resources/dist/js/adminlte.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('public/assets/dashboard/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('public/assets/dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('public/assets/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('public/assets/dashboard/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('public/assets/dashboard/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('public/assets/dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('public/assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('public/assets/dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('public/assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    {{--<script src="https://js.cx/libs/animate.js"></script>--}}
    {{--<!-- AdminLTE App -->--}}
    {{--<script src="{{asset('assets/dashboard/dist/js/adminlte.js')}}"></script>--}}
    {{--<script src="{{asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{--<script src="{{asset('assets/dashboard/dist/js/pages/dashboard.js')}}"></script>--}}
    <!-- AdminLTE for demo purposes -->
{{--    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>--}}
    <script src="{{asset('public/assets/dashboard/dist/js/demo.js')}}"></script>
    <script src="{{asset('public/resources/select2/js/select2.full.js')}}"></script>
    <script src="{{asset('public/resources/sweetalert2/sweetalert2.min.js')}}"></script>
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
        function renderTimeDesktop() {

            var currentTime= new Date();
            var diem = "AM"
            var h = currentTime.getHours();
            var m = currentTime.getMinutes();
            var s = currentTime.getSeconds();


            if (h ===0){
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
    </script>
    </body>
    </html>
@endif



