@extends('layout.main')
@section('Title', 'Dashboard')


@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah <br>Pengguna</span>
                    <span class="info-box-number">{{$jumlahPengguna}} <small>pengguna</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-user-secret"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah <br>Kurir</span>
                    <span class="info-box-number">{{$jumlahKurir}} <small>kurir</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-line-chart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah <br>Penjualan</span>
                    <span class="info-box-number">{{number_format($jumlahPenjualan)}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-balance-scale"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah <br>Pesanan Waiting</span>
                    <span class="info-box-number">{{number_format($jumlahTunggu)}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>





    <div class="col-lg-8 col-md-8 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ikan Terakhir Ditambahkan</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">

                    @if(count($ikanTerakhir) == 0)
                        <div class="alert alert-danger">Tidak ada ikan di tambahkan!</div>
                    @else
                        @foreach($ikanTerakhir as $num => $item)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{asset('public/uploads/ikan/'.$item->fish_item_picture)}}" alt="Tidak ada gambar">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">{{$item->fish_item_name}}
                                        <span class="label label-warning pull-right">Rp. {{number_format($item->fish_item_normal_price)}} (per kg)</span><br>
                                        <span class="label label-danger pull-right">Rp. {{number_format($item->fish_item_specific_price)}} (per ekor/100g)</span>
                                    </a>
                                    <span class="product-description">
                                      Nama ikan {{$item->fish_item_name}}<br>
                                        berat {{$item->fish_item_weight}} kg<br>
                                        stok tersisa {{$item->fish_item_quantity}}<br>
                                        harga membeli perkilo adalah Rp. {{number_format($item->fish_item_normal_price)}} <br>
                                        sementara harga beli per ekor (100gram) sebesar Rp. {{number_format($item->fish_item_specific_price)}}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    @endif

                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{url('master/ikan')}}" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>



    <div class="col-lg-4 col-md-4 col-xs-12">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Transaksi Gagal</span>
                <span class="info-box-number">{{number_format($jumlahOrderGagal)}}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
              <span class="progress-description">
                    Menampilkan transaksi gagal
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Ikan</span>
                <span class="info-box-number">{{number_format($jumlahIkan)}}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
              <span class="progress-description">
                    Menampilkan jumlah ikan
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Feedback</span>
                <span class="info-box-number">0</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
              <span class="progress-description">
                    Menampilkan jumlah feedback.
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Kategori Ikan</span>
                <span class="info-box-number">{{number_format($jumlahKategoriIkan)}}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
              <span class="progress-description">
                    Menampilkan jumlah kategori ikan.
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Penjualan Seminggu Terakhir</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="chart">
                        <!-- Sales Chart Canvas -->
                        <canvas id="salesChart" style="height: 180px;"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('public/template/plugins/chartjs/Chart.min.js')}}"></script>
    <script>
        $(function () {
            'use strict';
            var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
            var salesChart = new Chart(salesChartCanvas);
            var dataArray = [];
            var labelArray = [];

            @foreach($transaksiBulanan as $num => $item)
                    dataArray.push({{$item['value']}});
            labelArray.push('{{$item['month']}}');
                    @endforeach

            var salesChartData = {
                        labels: labelArray,
                        datasets: [
                            {
                                label: "Digital Goods",
                                fillColor: "rgba(60,141,188,0.9)",
                                strokeColor: "rgba(60,141,188,0.8)",
                                pointColor: "#3b8bba",
                                pointStrokeColor: "rgba(60,141,188,1)",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(60,141,188,1)",
                                data: dataArray
                            }
                        ]
                    };

            var salesChartOptions = {
                //Boolean - If we should show the scale at all
                showScale: true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines: false,
                //String - Colour of the grid lines
                scaleGridLineColor: "rgba(0,0,0,.05)",
                //Number - Width of the grid lines
                scaleGridLineWidth: 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines: true,
                //Boolean - Whether the line is curved between points
                bezierCurve: true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension: 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot: false,
                //Number - Radius of each point dot in pixels
                pointDotRadius: 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth: 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius: 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke: true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth: 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill: true,
                //String - A legend template
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true
      };

      //Create the line chart
      salesChart.Line(salesChartData, salesChartOptions);
     });


     $("#table-data").dataTable();
</script>

@endsection