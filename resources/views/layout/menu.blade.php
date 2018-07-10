<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <a href="{{url('/backend')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-file"></i>
            <span>Manajemen Konten</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="{{url('content/page')}}">
                    <i class="fa fa-circle-o"></i> Manajemen Halaman
                </a>
            </li>
            <li>
                <a href="{{url('content/link')}}">
                    <i class="fa fa-circle-o"></i> Manajemen Link Luar
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-institution"></i>
            <span>Data Master</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="{{url('master/pengguna')}}">
                    <i class="fa fa-circle-o"></i> Manajemen Pengguna
                </a>
            </li>
            <li>
                <a href="{{url('master/periode')}}">
                    <i class="fa fa-circle-o"></i> Manajemen Periode
                </a>
            </li>
            <li>
                <a href="{{url('master/kategori-ikan')}}">
                    <i class="fa fa-circle-o"></i> Manajemen Kategori Ikan</a>
            </li>
            <li>
                <a href="{{url('master/ukuran-ikan')}}">
                    <i class="fa fa-circle-o"></i> Manajemen Ukuran Ikan
                </a>
            </li>
            <li>
                <a href="{{url('master/ikan')}}">
                    <i class="fa fa-circle-o"></i> Manajemen Ikan
                </a>
            </li>
            {{--<li>
                <a href="{{url('master/kurir')}}">
                    <i class="fa fa-circle-o"></i> Manajemen Kurir
                </a>
            </li>--}}
        </ul>
    </li>
    <li class="treeview">
        <a>
            <i class="fa fa-balance-scale"></i>
            <span>Manajemen Transaksi</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>

        <ul class="treeview-menu">
            <li>
                <a href="{{url('transaction/in')}}">
                    <i class="fa fa-circle-o"></i> Transaksi Masuk
                </a>
            </li>
            <li>
                <a href="{{url('transaction/progress')}}">
                    <i class="fa fa-circle-o"></i> Transaksi On Progress
                </a>
            </li>
            <li>
                <a href="{{url('transaction/record')}}">
                    <i class="fa fa-circle-o"></i> Rekap Transaksi
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a>
            <i class="fa fa-feed"></i>
            <span>Manajemen Feedback</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>

        <ul class="treeview-menu">
            <li>
                <a href="{{url('feedback')}}">
                    <i class="fa fa-circle-o"></i> Feedback Masuk
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a>
            <i class="fa fa-line-chart"></i>
            <span>Laporan</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>

        <ul class="treeview-menu">
            <li>
                <a href="{{url('report/period-selling')}}">
                    <i class="fa fa-circle-o"></i> Penjualan Per Periode
                </a>
            </li>
            <li>
                <a href="{{url('report/price-statistic')}}">
                    <i class="fa fa-circle-o"></i> Statistik Harga Ikan
                </a>
            </li>
            {{--<li>
                <a href="#">
                    <i class="fa fa-circle-o"></i> Performa Kurir
                </a>
            </li>--}}

            <li>
                <a href="{{url('report/stock')}}">
                    <i class="fa fa-circle-o"></i> Stok
                </a>
            </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="{{url('logout')}}">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
        </a>
    </li>
</ul>