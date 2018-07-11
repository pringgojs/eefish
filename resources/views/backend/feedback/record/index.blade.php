@extends('layout.main')
@section('Title', 'Rekap Feedback')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="col-md-12 col-sm-12 col-xs-12">

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
                        @foreach($data as $num => $item)
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
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-script')
    <script>
        $("#table-data").dataTable();
    </script>
@endsection