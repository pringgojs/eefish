@extends('layout.main')
@section('Title', 'Manajemen Kurir')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a onclick="loadModal(this)" target="kurir/add" title="Tambah Data" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Data
                    </a>

                    <table class="table table-striped table-bordered table-hover" id="table-data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kurir</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $num => $item)
                                <tr>
                                    <td align="center">{{$num+1}}</td>
                                    <td>{{$item->courier_name}}</td>
                                    <td>{{$item->courier_phone_number}}</td>
                                    <td>{{$item->courier_address}}</td>
                                    <td align="center">
                                        <a onclick="loadModal(this)" target="kurir/add" data="id={{$item->id}}"
                                           class="btn btn-primary btn-xs glyphicon glyphicon-pencil" title="Ubah Data"></a>
                                        <a onclick="deleteData({{$item->id}})" class="btn btn-danger btn-xs glyphicon glyphicon-trash"
                                           title="Hapus Data"></a>
                                        <a href="{{url('master/kurir/'.$item->id.'/detail')}}" class="btn btn-info btn-xs glyphicon glyphicon-briefcase"
                                           title="Detail Data"></a>
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

        function deleteData(id) {
            var data = new FormData();
            data.append('id', id);
            modalConfirm('Konfirmasi', 'Apakah anda yakin akan menghapus data?', function () {
                ajaxTransfer('kurir/delete', data, '#modal-output');
            });
        }
    </script>
@endsection