@extends('layout.main')
@section('Title', 'Manajemen Transaksi Masuk')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <table class="table table-striped table-bordered table-hover" id="table-data">
                        <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama Pembeli</th>
                            <th>Waktu</th>
                            <th>Jenis Order</th>
                            <th>Total</th>
                            <th>Biaya Pengiriman</th>
                            <th>Jenis Pengiriman</th>
                            <th>Jenis Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $num => $item)
                            <tr>
                                <td>{{$num+1}}</td>
                                <td>{{$item->getUser->user_full_name}}</td>
                                <td>{{date("d-M-Y H:i:s", strtotime($item->order_created_at))}}</td>
                                <td>{{$item->getOrderKind->order_kind_name}}</td>
                                <td>Rp. {{number_format($item->order_total)}}</td>
                                <td>Rp. {{number_format($item->order_shipping_cost)}}</td>
                                <td width="10%">JNE - {{$item->service_code}}</td>
                                <td width="10%">{{$item->getPaymentType->payment_type_name}}</td>
                                <td width="10%" align="center">
                                    <a onclick="loadModal(this)" target="in/detail" data="id={{$item->id}}"
                                       class="btn btn-primary btn-xs glyphicon glyphicon-briefcase" title="Detail Data"></a>
                                    <a onclick="updateStatus({{$item->id}})" class="btn btn-success btn-xs glyphicon glyphicon-check"
                                       title="Hapus Data"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

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
        $("#table-data").dataTable();

        function updateStatus(id) {
            var data = new FormData();
            data.append('id', id);
            modalConfirm('Konfirmasi', 'Apakah anda yakin akan mengupdate status menjadi di proses?', function () {
                ajaxTransfer('in/update-to-process', data, '#modal-output');
            });
        }
    </script>
@endsection