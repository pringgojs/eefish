<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('Title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('public/template/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/font-awesome-4.5.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/template/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/template/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/template/plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('public/template/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <link rel="stylesheet" href="{{asset('public/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugin/chosen/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugin/datetimepicker/jquery.datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <script src="{{asset('public/template/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('public/js/lib.js')}}"></script>
    <script src="{{asset('public/js/core.js')}}"></script>
    <script src="{{asset('public/js/spms.js')}}"></script>
    <script src="{{asset('public/template/dist/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('public/js/datatables.min.js')}}"></script>
    <script src="{{asset('public/js/moment.js')}}"></script>
    <script src="{{asset('public/plugin/chosen/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/template/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('public/template/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('public/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('public/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('public/template/plugins/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('public/template/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('public/template/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('public/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script src="{{asset('public/template/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('public/template/plugins/fastclick/fastclick.min.js')}}"></script>
    <script src="{{asset('public/template/dist/js/app.min.js')}}"></script>
    <script src="{{asset('public/plugin/datetimepicker/jquery.datetimepicker.full.js')}}"></script>
    <script src="{{asset('public/plugin/gauge/highcharts.js')}}"></script>
    <script src="{{asset('public/plugin/gauge/highcharts-more.js')}}"></script>
    <script src="{{asset('public/plugin/gauge/solid-gauge.js')}}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('public/template/dist/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('public/template/dist/js/respond.min.js')}}"></script>
    <![endif]-->

    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

</head>
<body class="skin-blue fixed sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="{{url('/')}}" class="logo">
            <span class="logo-mini"><b></b>EEFISH</span>
            <span class="logo-lg">EEFISH<b>MARKET</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/img/user.jpg')}}" class="user-image"
                            alt="User Image">
                            <span class="hidden-xs">{{session('activeUser')->user_full_name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="{{asset('public/img/user.jpg')}}" class="img-circle"
                                alt="User Image">
                                <p>
                                    {{session('activeUser')->user_full_name}}
                                    <small>Administrator</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('public/img/user.jpg')}}" class="img-circle"
                    alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{session('activeUser')->user_full_name}}</p>
                    <a href="#">Administrator</i>

                    </a>
                </div>
            </div>
            @include('layout.menu')
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class='col-md-12'>
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">
                                @yield('Title')
                            </h3>
                        </div>
                        <div id="main-content" class="box-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2017 <a href="{{url('/')}}">EEFISH Market</a>.</strong> All rights reserved.
    </footer>
</div>

{{ csrf_field() }}

@yield('custom-script')

</body>
</html>
