<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">BERANDA</li>
        <!-- <li class="menu-sidebar {{ (Request::path() == 'admin') ? 'active' : '' }}"><a href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i> Home</span></a></li> -->

        @if(\Auth::user()->role ==1)
        <li class="menu-sidebar"><a href="{{ url('/paket-laundry') }}"><span class="glyphicon glyphicon-tags"></span> Paket Laundry</span></a></li>
        <li class="treeview">

        <li class="menu-sidebar"><a href="{{ url('/customer') }}"><span class="glyphicon glyphicon-tags"></span> Customer</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/karyawan') }}"><span class="glyphicon glyphicon-tags"></span> Karyawan</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/status-pesanan') }}"><span class="glyphicon glyphicon-tags"></span> Status Pesanan</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/status-pembayaran') }}"><span class="glyphicon glyphicon-tags"></span> Status Pembayaran</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/transaksi-pesanan') }}"><span class="glyphicon glyphicon-tags"></span> Transaksi Pesanan</span></a></li>

        @endif

        <li class="menu-sidebar"><a href="{{ url('/transaksi-pesanan') }}"><span class="glyphicon glyphicon-tags"></span> Transaksi Pesanan</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data Kamar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{ url('transaksi-pesanan') }}"><i class="fa fa-circle-o"></i> List Kamar</a></li>
            <li><a href="{{ url('master/kamar/add') }}"><i class="fa fa-circle-o"></i> Tambah Kamar</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data jabatan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{ url('master/jabatan') }}"><i class="fa fa-circle-o"></i> List jabatan</a></li>
            <li><a href="{{ url('master/jabatan/add') }}"><i class="fa fa-circle-o"></i> Tambah jabatan</a></li>
          </ul>
        </li>

        <li class="header">SISWA DAN GURU</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data Santri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{ url('master/santri') }}"><i class="fa fa-circle-o"></i> List Santri</a></li>
            <li><a href="{{ url('master/santri/add') }}"><i class="fa fa-circle-o"></i> Tambah Santri</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data guru</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{ url('master/guru') }}"><i class="fa fa-circle-o"></i> List guru</a></li>
            <li><a href="{{ url('master/guru/add') }}"><i class="fa fa-circle-o"></i> Tambah guru</a></li>
          </ul>
        </li>

        <li class="header">KELAS</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data Kelas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{ url('master/kelas') }}"><i class="fa fa-circle-o"></i> List kelas</a></li>
            <li><a href="{{ url('master/kelas/add') }}"><i class="fa fa-circle-o"></i> Tambah kelas</a></li>
          </ul>
        </li>

        <li class="header">Pendaftaran Online</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Penerimaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{ url('admin/pendaftaran') }}"><i class="fa fa-circle-o"></i> List Pendaftar</a></li>
            <li><a href="{{ url('admin/wa') }}"><i class="fa fa-circle-o"></i> Template Pesan WA</a></li>
          </ul>
        </li>

        <li class="header">OTHER</li>

        @if(\Auth::user()->name == 'Admin')
        <li class="menu-sidebar"><a href="{{ url('/reset-password') }}"><span class="glyphicon glyphicon-log-out"></span> Reset Password</span></a></li>
        @endif

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>