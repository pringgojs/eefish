<div class="row">
    <div class="chart">
        <!-- Sales Chart Canvas -->
        <canvas id="salesChart" style="height: 180px; overflow-x: auto;"></canvas>
    </div>
</div>

<br><br>

<div class="row">
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <td width="25%">Pemasukan dari pembayaran</td>
            <td width="3%">:</td>
            <td>
                Rp. {{number_format($jumlahPemasukan)}}
            </td>
        </tr>

        <tr>
            <td>Pemasukan dari biaya kirim</td>
            <td>:</td>
            <td>
                Rp. {{number_format($jumlahBiayaPengiriman)}}
            </td>
        </tr>

        <tr>
            <td>Total transaksi</td>
            <td>:</td>
            <td>
                {{number_format(count($orders))}} transaksi
            </td>
        </tr>


    </table>
</div>



<br><br>
<h3>List transaksi</h3>
<table class="table table-striped table-bordered table-hover" id="table-data">
    <thead>
    <tr>
        <th>No</th>
        <th>Aktor</th>
        <th>Jenis Transaksi</th>
        <th>Tanggal Transaksi</th>
        <th>Total Pembayaran</th>
        <th>Feedback</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $num => $item)
        <tr>
            <td>{{$num+1}}</td>
            <td>{{$item->getUser->user_full_name}}</td>
            <td>{{$item->getOrderKind->order_kind_name}}</td>
            <td>{{date("d-M-Y H:i:s", strtotime($item->order_created_at))}}</td>
            <td>Rp. {{number_format($item->order_total + $item->order_shipping_cost)}}</td>
            <td>
                @if($item->order_user_feedback == 1)
                    <span class="form-control btn-success" align="center">
                                            Puas
                                        </span>
                @else
                    <span class="form-control btn-danger" align="center">
                                            Tidak puas
                                        </span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>











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