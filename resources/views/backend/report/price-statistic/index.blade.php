@extends('layout.main')
@section('Title', 'Laporan Penjualan Per Periode')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="row">
                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" style="height: auto;"></canvas>
                        </div>
                    </div>

                </div>

                <br><br>
                <table class="table table-striped table-bordered table-hover" id="table-data">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ikan</th>
                        <th>Harga Per kilo</th>
                        <th>Harga Per ekor</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $num => $item)
                            <tr>
                                <td>{{$num+1}}</td>
                                <td>{{$item['fish_name']}}</td>
                                <td>Rp. {{number_format($item['normal_price'])}}</td>
                                <td>Rp. {{number_format($item['spesific_price'])}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <div class="clearfix"></div>
            </div>

        </div>

    </div>
    <br />

    <div class="row">
        &nbsp;
    </div>
@endsection


@section('custom-script')
<script src="{{asset('public/template/plugins/chartjs/Chart.min.js')}}"></script>
<script>
    $(function () {
        'use strict';

        var max = 0;
        var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
        var salesChart = new Chart(salesChartCanvas);
        var normalPriceArray = [];
        var spesificPriceArray = [];
        var labelArray = [];

        @foreach($data as $num => $item)
                var tmp = {{$item['normal_price']}};
                if(tmp > max )
                {
                    max = tmp;
                }

                var tmp = {{$item['spesific_price']}};
                if(tmp > max )
                {
                    max = tmp;
                }
                normalPriceArray.push({{$item['normal_price']}});
                spesificPriceArray.push({{$item['spesific_price']}});
                labelArray.push('{{$item['fish_name']}}');
        @endforeach

        var salesChartData = {
                    labels: labelArray,
                    datasets: [
                        {
                            label: "Harga ikan per kilogram",
                            fillColor: "rgba(60,141,188,0.9)",
                            strokeColor: "rgba(60,141,188,0.8)",
                            pointColor: "#3b8bba",
                            pointStrokeColor: "rgba(60,141,188,1)",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(60,141,188,1)",
                            data: normalPriceArray
                        },
                        {
                            label: "Harga ikan per ekor (100gram)",
                            fillColor: "rgb(210, 214, 222)",
                            strokeColor: "rgb(210, 214, 222)",
                            pointColor: "rgb(210, 214, 222)",
                            pointStrokeColor: "#c1c7d1",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgb(220,220,220)",
                            data: spesificPriceArray
                        }
                    ]
                };

        var salesChartOptions = {
            showScale: true,
            scaleOverride : true,
            scaleStepWidth : max/2,
            scaleSteps : 3,
            scaleShowGridLines: false,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve: true,
            bezierCurveTension: 0.3,
            pointDot: true,
            pointDotRadius: 5,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
        responsive: true
      };

      salesChart.Line(salesChartData, salesChartOptions);
     });


     $("#table-data").dataTable();
</script>

@endsection