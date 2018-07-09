<table class="table table-striped table-bordered table-hover">
    <tr>
        <td width="25%">Nama</td>
        <td width="3%">:</td>
        <th>{{$order->getUser->user_full_name}}</th>
    </tr>

    <tr>
        <td>Jenis Order</td>
        <td>:</td>
        <th>{{$order->getOrderKind->order_kind_name}}</th>
    </tr>

    <tr>
        <td>Tanggal Order</td>
        <td>:</td>
        <th>{{date("d-M-Y H:i:s", strtotime($order->order_created_at))}}</th>
    </tr>

    <tr>
        <td>Total Belanja</td>
        <td>:</td>
        <th>Rp. {{number_format($order->order_total)}}</th>
    </tr>

    <tr>
        <td>Biaya Pengiriman</td>
        <td>:</td>
        <th>Rp. {{number_format($order->order_shipping_cost)}}</th>
    </tr>

    <tr>
        <td>Jenis Pembayaran</td>
        <td>:</td>
        <th>{{$order->getPaymentType->payment_type_name}}</th>
    </tr>
    <tr>
        <td>Bukti Transfer</td>
        <td>:</td>
        <td>
            @if(is_null($order->order_pay_receipt) || $order->order_is_pay == 0)
                <div class="alert alert-danger">Belum upload</div>
            @else
                <img src="{{asset('public/uploads/receipt')}}/{{$order->order_pay_receipt}}" width="100%">
            @endif
        </td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <th>
            {{$order->getOrderStatus->order_status_name}}
        </th>
    </tr>

</table>


<br>
<h3>Detail Belanja</h3>
<br>

<table class="table table-striped table-bordered table-hover" id="table-detail">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Ikan</th>
            <th>Bobot</th>
            <th>Harga Per ekor</th>
            <th>Harga Per kg</th>
            <th>Stok</th>
            <th>Kuantitas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orderItems as $num => $item)
            <tr>
                <td>{{$num+1}}</td>
                <td>{{$item->getFishItem->fish_item_name}}</td>
                <td>{{$item->getFishItem->fish_item_weight}}</td>
                <td>Rp. {{number_format($item->getFishItem->fish_item_specific_price)}}</td>
                <td>Rp. {{number_format($item->getFishItem->fish_item_normal_price)}}</td>
                <td>{{$item->getFishItem->fish_item_quantity}}</td>
                <td>{{$item->order_item_quantity}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<style>
    th {
        text-align: left;
    }
</style>


<script>
    $("#table-detail").dataTable();
</script>