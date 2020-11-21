<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Admin')</title>

    <link rel="shortcut icon" href="{{asset('resources/settings/fav-icon.PNG')}}" type="image/png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!--Tinymce library-->
    <script src="{{asset('resources/tinymce/tinymce.min.js')}}"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('resources/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('resources/dist/css/adminlte.min.css')}}">
    <!--Select2 CSS-->
    <link rel="stylesheet" href="{{asset('resources/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!--My Styles-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-navy elevation-5">
        <a href="{{url('/home')}}" class="brand-link">
            <img src="{{asset('resources/settings/logo.png')}}" alt="logo" class="brand-image img-circle elevation-5" style="opacity: .8"/>
            <span class="brand-text font-weight-bold">{{config('app.name','Laravel')}}</span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('resources/settings/admin.png')}}" alt="img" class="user-image img-circle elevation-2"/>
                </div>
                <div class="info">
                    <a href="{{url('/profile')}}" class="d-block">
                        {{\Illuminate\Support\Facades\Auth::user()->name.' '.\Illuminate\Support\Facades\Auth::user()->lastName}}
                    </a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item {{\Illuminate\Support\Facades\Request::path() === '/home' ? 'current_page_item': ''}}">
                        <a href="{{url('/home')}}" class="nav-link">
                            <i class="nav-icon fa fa-tachometer"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-telegram fa-fw"></i>
                            <p>
                                Bookings
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/#search')}}" class="nav-link">
                                    <p class="ml-3">
                                        <i class="nav-icon fa fa-thermometer-1"></i>
                                        Flights
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('#')}}" class="nav-link">
                                    <p class="ml-3">
                                        <i class="nav-icon fa fa-pencil"></i>
                                        Hotels
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-telegram fa-fw"></i>
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
                </ul>
            </nav>
        </div>
    </aside>
    @yield('content')
    <footer class="main-footer">
        <strong>Copyright &copy;
            <script type="text/javascript">
                document.write(new Date().getFullYear());
            </script>
            <a href="#">Travel</a> All Right Reserved
        </strong>
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<!-- jQuery -->
<script src="{{asset('resources/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('resources/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('resources/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('resources/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('resources/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('resources/dist/js/demo.js')}}"></script>
<script src="{{asset('resources/select2/js/select2.full.js')}}"></script>
<script type="text/javascript">
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
</body>
</html>
