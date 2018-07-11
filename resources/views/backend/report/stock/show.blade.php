<table class="table table-striped table-bordered table-hover" id="table-data">
    <thead>
    <tr>
        <th width="3%">No</th>
        <th>Nama Ikan</th>
        <th>Berat</th>
        <th>Harga Satuan</th>
        <th>Harga Kiloan</th>
        <th>Stok</th>
        <th>Foto</th>
    </tr>
    </thead>
    <tbody>
        @foreach($data as $num => $item)
            <tr>
                <td>{{$num+1}}</td>
                <td>{{$item->getFish->fish_name}}</td>
                <td>{{$item->fish_item_weight}} kg</td>
                <td>Rp. {{number_format($item->fish_item_specific_price)}} per 100gr</td>
                <td>Rp. {{number_format($item->fish_item_normal_price)}} per 1kg</td>
                <td>{{number_format($item->fish_item_quantity)}} ekor</td>
                <td align="center">
                    @if(file_exists('public/uploads/ikan/'.$item->fish_item_picture) && !is_null($item->fish_item_picture) && $item->fish_item_picture != "")
                        <img src="{{asset('public/uploads/ikan/'.$item->fish_item_picture)}}" width="100" height="100" class="img img-rounded">
                    @else
                        <img src="{{asset('public/img/nemo.jpeg')}}" width="100" height="100" class="img img-rounded">
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>