<!doctype html>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="">
<html class="no-js lt-ie9 lt-ie8" lang="">
<html class="no-js lt-ie9" lang="">
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>{{$page->title}} | EEFISH</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('public/frontend/eefish/favicon.ico')}}">

    <!--Google Font link-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('public/frontend/eefish/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/eefish/assets/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/eefish/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/eefish/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/eefish/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/eefish/assets/css/bootsnav.css')}}">


    <!--For Plugins external css-->
    <link rel="stylesheet" href="{{asset('public/frontend/eefish/assets/css/plugins.css')}}" />

    <!--Theme custom css -->
    <link rel="stylesheet" href="{{asset('public/frontend/eefish/assets/css/style.css')}}">
    <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="{{asset('public/frontend/eefish/assets/css/responsive.css')}}" />

    <script src="{{asset('public/frontend/eefish/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
    <style>
    .br-left {
        border-left: 1px solid #eee 
    }
    .list-ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    .list-li {
        padding: 0
    }
    .list-link {
        display: block;
        padding: 12px 18px;
        font-weight: 400;
        color: #333;
        cursor: pointer;
        position: relative;
    }
    .list-link-1 {
        display: block;
        padding: 6px 10px;
        font-weight: 400;
        color: #333;
        cursor: pointer;
        position: relative;
    }
    .list-li a:hover {
        background: #eee
    }
    .active {
        font-weight: 800
    }
    .list-link-pad-left--5 {
        padding-left: 30px !important;
    }
    .contain p {
        font-weight: 500;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        color: #000
    }
    .contain ul {
        color: #000;
        list-style-type: square;
        margin-left: 18px; 
    }
    .contain ul li {
        padding: 5px;
        position: relative;
        font-weight: 400
    }
    .contain h5 {
        font-weight: 600;
        margin-top: 30px
    }
    /* table */
    .contain table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
        min-height: .01%;
        overflow-x: auto;
        border: 1px solid #ddd;
    }
    .contain table td {
        padding: 10px
    }
    </style>
</head>

<body data-spy="scroll" data-target="#navbar-menu" data-offset="110">


<!-- Preloader -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
        </div>
    </div>
</div><!--End off Preloader -->


<div class="culmn">
    <!--Home page style-->


    @include('frontend.include.nav', ['class' => 'navbar navbar-default bootsnav navbar-fixed bg-grey'])

    <!--Content Section-->
    @yield('content')
    <!-- End off Content Section-->

    @include('frontend.include.footer')




</div>

<!-- JS includes -->

<script src="{{asset('public/frontend/eefish/assets/js/vendor/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('public/frontend/eefish/assets/js/vendor/bootstrap.min.js')}}"></script>

<script src="{{asset('public/frontend/eefish/assets/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('public/frontend/eefish/assets/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('public/frontend/eefish/assets/js/bootsnav.js')}}"></script>



<script src="{{asset('public/frontend/eefish/assets/js/plugins.js')}}"></script>
<script src="{{asset('public/frontend/eefish/assets/js/main.js')}}"></script>

</body>
</html>
