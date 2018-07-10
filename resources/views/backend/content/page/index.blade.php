@extends('layout.main')
@section('Title', 'Manajemen Halaman')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a onclick="loadModal(this)" target="page/add" title="Tambah Data" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Data
                    </a>

                    <table class="table table-striped table-bordered table-hover" id="table-data">
                        <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Judul Halaman</th>
                            <th>Link</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $num => $page)
                            <tr>
                                <td>{{$num+1}}</td>
                                <td>{{$page->title}}</td>
                                <td>{{$page->link}}</td>
                                <td>
                                    <a onclick="loadModal(this)" target="page/add" data="id={{$page->id}}"
                                       class="btn btn-primary btn-xs glyphicon glyphicon-pencil" title="Ubah Data"></a>
                                    <a onclick="deleteData({{$page->id}})" class="btn btn-danger btn-xs glyphicon glyphicon-trash"
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