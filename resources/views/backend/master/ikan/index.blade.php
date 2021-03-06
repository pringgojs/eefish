@extends('layout.main')
@section('Title', 'Manajemen Ikan')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a onclick="loadModal(this)" target="ikan/add" title="Tambah Data" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Data
                    </a>

                    <table class="table table-striped table-bordered table-hover" id="table-data">
                        <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama Ikan</th>
                            <th>Kategori Ikan</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $num => $item)
                            <tr>
                                <td>{{$num+1}}</td>
                                <td>{{$item->fish_name}}</td>
                                <td>{{$item->getCategory->fish_category_name}}</td>
                                <td>{!! $item->photo ? '<img src="'.asset('public/uploads/ikan/'.$item->photo).'" style="height: 50px; width: auto">' : '-'!!}</td>
                                <td>
                                    <a onclick="loadModal(this)" target="ikan/add" data="id={{$item->id}}"
                                       class="btn btn-primary btn-xs glyphicon glyphicon-pencil" title="Ubah Data"></a>
                                    <a onclick="deleteData({{$item->id}})" class="btn btn-danger btn-xs glyphicon glyphicon-trash"
                                       title="Hapus Data"></a>
                                    <a href="{{url('master/ikan/'.$item->id.'/detail')}}" class="btn btn-info btn-xs glyphicon glyphicon-briefcase"
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
                ajaxTransfer('ikan/delete', data, '#modal-output');
            });
        }
    </script>
@endsection