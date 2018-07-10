@extends('layout.main')
@section('Title', 'Manajemen Link')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a onclick="loadModal(this)" target="link/add" title="Tambah Data" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Data
                    </a>

                    <table class="table table-striped table-bordered table-hover" id="table-data">
                        <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama</th>
                            <th>Url</th>
                            <th>Posisi</th>
                            <th>Jenis</th>
                            <th>Sublink</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($links as $num => $link)
                            <tr>
                                <td>{{$num+1}}</td>
                                <td>{{$link->link_name}}</td>
                                <td>{{$link->link_url}}</td>
                                <td>{{$link->link_position}}</td>
                                <td>{{$link->link_is_parent ? 'Parent Link' : 'Child Link'}}</td>
                                <td>{{$link->link_parent_id ? }}</td>
                                <td>
                                    <a onclick="loadModal(this)" target="periode/add" data="id={{$link->id}}"
                                       class="btn btn-primary btn-xs glyphicon glyphicon-pencil" title="Ubah Data"></a>
                                    <a onclick="deleteData({{$link->id}})" class="btn btn-danger btn-xs glyphicon glyphicon-trash"
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

        function deleteData(id) {
            var data = new FormData();
            data.append('id', id);
            modalConfirm('Konfirmasi', 'Apakah anda yakin akan menghapus data?', function () {
                ajaxTransfer('page/delete', data, '#modal-output');
            });
        }
    </script>
@endsection