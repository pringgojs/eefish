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
                <a onclick="loadModal(this)" target="record/detail" data="id={{$item->id}}"
                   class="btn btn-primary btn-xs glyphicon glyphicon-briefcase" title="Detail Data"></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>