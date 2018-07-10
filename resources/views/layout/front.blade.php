<!doctype html>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="">
<html class="no-js lt-ie9 lt-ie8" lang="">
<html class="no-js lt-ie9" lang="">
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>EEFISH Market</title>
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


    <nav class="navbar navbar-default bootsnav navbar-fixed bg-grey">
        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->


        <div class="container">
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{url('/')}}" >
                    <img src="{{asset('public/frontend/eefish/assets/images/logo.png')}}" style="width: 100px; height:40px" class="logo" alt="">
                </a>

            </div>
            <!-- End Header Navigation -->

            <!-- navbar menu -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#features">Specialty</a></li>
                    <li><a href="#business">About</a></li>
                    <li><a href="#product">Gallery</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

    </nav>

    <!--Content Section-->
    <section id="features" class="features bg-white m-top-30">
        <div class="container">
            <div class="row">
                <div class="main_features fix roomy-70">

                    <div class="col-md-3">
                        <ul class="list-ul">
                            <li class="list-li"  style="border-bottom:1px solid #eee">
                                <a href="{{url('services')}}" class="list-link @if(Request::segment(1)=='services') active @endif">Tetang Eefish</a>
                                <ul class="list-ul">
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Pelayanan</a></li>
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Prinsip</a></li>
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Jenis Layanan</a></li>
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Jenis Benih Ikan</a></li>
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Laboratorium</a></li>
                                </ul>
                            </li>
                            <li class="list-li"  style="border-bottom:1px solid #eee">
                                <a href="{{url('prices')}}" class="list-link @if(Request::segment(1)=='prices') active @endif">Harga Sewa Layanan</a>
                                <ul class="list-ul">
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Harga Benih Ikan</a></li>
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Penyewaan Aula</a></li>
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Perpustakaan</a></li>
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Penyewaan Laboratorium</a></li>
                                </ul>
                            </li>
                            <li class="list-li">
                                <a href="" class="list-link">Pelatihan</a>
                                <ul class="list-ul">
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Tujuan</a></li>
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Sasaran</a></li>
                                    <li class="list-li"><a href="" class="list-link-1 list-link-pad-left--5">Substansi</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9 contain br-left">
                        @yield('content')
                    </div>

                </div>
            </div><!-- End off row -->
        </div><!-- End off container -->
    </section><!-- End off Content Section-->

    <footer id="contact" class="footer bg-black p-top-80">
        <!--<div class="action-lage"></div>-->
        <div class="container">
            <div class="row">
                <div class="widget_area">
                    <div class="col-md-4">
                        <div class="widget_item widget_about">
                            <h5 class="text-white">About Us</h5>
                            <p class="m-top-20">Menjual ikan yang tetap SEGAR hingga tangan konsumen.  </p>
                            <div class="widget_ab_item m-top-30">
                                <div class="item_icon"><i class="fa fa-location-arrow"></i></div>
                                <div class="widget_ab_item_text">
                                    <h6 class="text-white">Location</h6>
                                    <p>
                                        Lokasi JL. Raya Pasir Putih Tromol Pos I, Mlandingan Kec. Bungatan Kab.Situbondo 683523</p>
                                </div>
                            </div>
                            <div class="widget_ab_item m-top-30">
                                <div class="item_icon"><i class="fa fa-phone"></i></div>
                                <div class="widget_ab_item_text">
                                    <h6 class="text-white">Phone :</h6>
                                    <p> ( 0338) 390093</p>
                                </div>
                            </div>
                            <div class="widget_ab_item m-top-30">
                                <div class="item_icon"><i class="fa fa-fax"></i></div>
                                <div class="widget_ab_item_text">
                                    <h6 class="text-white">Fax :</h6>
                                    <p>  (0338) 390280</p>
                                </div>
                            </div>
                            <div class="widget_ab_item m-top-30">
                                <div class="item_icon"><i class="fa fa-envelope-o"></i></div>
                                <div class="widget_ab_item_text">
                                    <h6 class="text-white">Email Address :</h6>
                                    <p>upbl.situbondo@yahoo.co.id</p>
                                </div>
                            </div>
                        </div><!-- End off widget item -->
                    </div><!-- End off col-md-3 -->

                    <div class="col-md-4">
                        <div class="widget_item widget_service sm-m-top-50">
                            <h5 class="text-white">Eefish</h5>
                            <ul>
                                <li><a href="">Tentang EEFISH</a></li>
                                <li><a href="">Jenis Pelayanan</a></li>
                                <li><a href="">Harga Benih & Komoditi</a></li>
                                <li><a href="">Ruang Pertemuan</a></li>
                                <li><a href="">Pelatihan</a></li>
                            </ul>
                        </div>
                    </div><!-- End off col-md-3 -->

                    <div class="col-md-4">
                        <div class="widget_item widget_newsletter sm-m-top-50">
                            <h5 class="text-white">Newsletter</h5>
                            <form class="form-inline m-top-30">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter you Email">
                                    <button type="submit" class="btn text-center"><i class="fa fa-arrow-right"></i></button>
                                </div>

                            </form>
                            <div class="widget_brand m-top-40">
                                <a href="" class="text-uppercase">-<b>EEFISH</b>-</a>
                                <p>Khawatir kesegaran ikan <br>konsumsi anda ? <br>
                                    Order di <b>EEFISH</b> sekarang juga</p>
                            </div>
                            <ul class="list-inline m-top-30">
                                <li>-  <a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href=""><i class="fa fa-behance"></i></a></li>
                                <li><a href=""><i class="fa fa-dribbble"></i></a>  - </li>
                            </ul>

                        </div><!-- End off widget item -->
                    </div><!-- End off col-md-3 -->
                </div>
            </div>
        </div>
        <div class="main_footer fix bg-mega text-center p-top-40 p-bottom-30 m-top-80">
            <div class="col-md-12">
                <p class="wow fadeInRight" data-wow-duration="1s">
                    Made with Bootstrap 2017. All Rights Reserved
                </p>
            </div>
        </div>
    </footer>




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
