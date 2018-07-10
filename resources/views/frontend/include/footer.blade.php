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
                                @foreach($link_footer as $link)
                                <li><a href="{{$link->link_url}}">{{$link->link_name}}</a></li>
                                @endforeach
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