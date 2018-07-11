@extends('layout.main')
@section('Title', 'Laporan Penjualan Per Periode')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <form method="POST" action="" onsubmit="return false" id="form-konten">

                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 col-xs-12 control-label">Periode</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select name="period_id" class="form-control">
                                        @foreach($periods as $num => $period)
                                            <option value="{{$period->id}}">{{$period->period_name}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <div class="col-sm-8 col-xs-12">
                                    <input type="submit" class="btn btn-primary" value="Tampilkan Data">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </form>

                    <br><br>
                    <div style="clear: both"></div>
                    <div id="results"></div>

                </div>


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
    <script>
        $("#form-konten").submit(function () {
            var data = getFormData("form-konten");
            ajaxTransfer("period-selling/show", data, function (result) {
                $("#results").html(result);
                $("#table-data").dataTable();
            });
        })
    </script>
@endsection