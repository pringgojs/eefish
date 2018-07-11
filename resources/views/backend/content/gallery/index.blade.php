@extends('layout.main')
@section('Title', 'Manajemen Galeri')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a onclick="loadModal(this)" target="gallery/add" title="Tambah Data" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Data
                    </a>

                    <table class="table table-striped table-bordered table-hover" id="table-data">
                        <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama</th>
                            <th>Photo</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($galleries as $num => $gallery)
                            <tr>
                                <td>{{$num+1}}</td>
                                <td>{{$gallery->gallery_name}}</td>
                                <td>{!! $gallery->gallery_photo ? '<img src="'.asset('public/uploads/gallery/'.$gallery->gallery_photo).'" style="height: 50px; width: auto">' : '-'!!}</td>
                                <td>
                                    <a onclick="loadModal(this)" target="gallery/add" data="id={{$gallery->id}}"
                                       class="btn btn-primary btn-xs glyphicon glyphicon-pencil" title="Ubah Data"></a>
                                    <a onclick="deleteData({{$gallery->id}})" class="btn btn-danger btn-xs glyphicon glyphicon-trash"
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
                ajaxTransfer('gallery/delete', data, '#modal-output');
            });
        }
    </script>
@endsection