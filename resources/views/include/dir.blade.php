<section class="content-header">
    @if(is_active('berandavendor'))
      <h1>
      Dashboard
      <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    @endif

    @if(is_active('ubahpassv'))
      <h1>
      Ubah Password
      <small>Ubah password untuk privasi anda</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah password</li>
      </ol>
    @endif

    @if(is_active('kirimpo'))
      <h1>
      Daftar Kiriman
      <small>Semua histori pengiriman ada disini</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Daftar Kiriman</li>
      </ol>
    @endif

    @if(is_active('kirimnonpo'))
      <h1>
      Daftar Kiriman Non PO
      <small>Semua histori pengiriman Non PO ada disini</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Daftar Kiriman</li>
      </ol>
    @endif

    @if(is_active('kirimbarang'))
      <h1>
      Pengiriman
      <small>Atur pengiriman anda dengan benar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pengiriman barang</li>
      </ol>
    @endif

    <!-- Request vendor dan kiriman -->
    @if(is_active('requestkiriman'))
      <h1>
      Daftar permintaan kiriman
      <small>Klik Nomor PO untuk melihat detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pengiriman barang</li>
      </ol>
    @endif

    @if(is_active('requestvendor'))
      <h1>
      Daftar permintaan vendor
      <small>Klik Detail untuk lebih lanjut</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Permintaan daftar</li>
      </ol>
    @endif

    @if(is_active('detailreqkiriman'))
      <h1>
      Detail permintaan
      <small>Silahkan cek dengan baik</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Detail pengiriman</li>
      </ol>
    @endif

    <!-- POS -->
    @if(is_active('barangmasuk'))
      <h1>
      Barang Masuk
      <small>Permintaan barang masuk yang telah disetujui oleh unit untuk dikirim</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Barang Masuk</li>
      </ol>
    @endif

    @if(is_active('tamu'))
      <h1>
      Tamu
      <small>Daftar tamu masuk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Daftar Tamu</li>
      </ol>
    @endif

    @if(is_active('simip'))
      <h1>
      SIMIP
      <small>Daftar tamu daerah khusus</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Simip</li>
      </ol>
    @endif

    @if(is_active('keluarkan'))
      <h1>
      Daftar Tamu
      <small>Tamu yang sedang berada didalam</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Keluarkan</li>
      </ol>
    @endif

    @if(is_active('daftartamu'))
      <h1>
      Daftar Tamu
      <small>Daftar tamu masuk area B</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Daftar Tamu</li>
      </ol>
    @endif

    @if(is_active('menungguapprover'))
      <h1>
      Menunggu Approver
      <small>Daftar tamu yang menunggu Approver</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Daftar Tamu</li>
      </ol>
    @endif

    @if(is_active('atursimip'))
      <h1>
      Atur Tamu Simip
      <small>Daftar tamu daerah khusus</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Atur Simip</li>
      </ol>
    @endif


    @if(is_active('kirimanbarang'))
      <h1>
      Detail Kiriman
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Detail Kiriman</li>
      </ol>
    @endif

    @if(is_active('kunjungan'))
      <h1>
      Tambah Tamu
      <small>Masukkan Tamu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Tamu</li>
      </ol>
    @endif

    @if(is_active('laporanbarangmasuk'))
      <h1>
      Laporan Barang Masuk
      <small>Daftar Barang masuk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Barang Masuk</li>
      </ol>
    @endif

    @if(is_active('blokiremail'))
      <h1>
      Daftar Email Diblokir
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Daftar Blokir</li>
      </ol>
    @endif
    <!-- Pengeluaran Barang -->
    @if(is_active('barangkeluar'))
      <h1>
      Barang Keluar
      <small>Daftar Pengeluaran Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Barang Keluar</li>
      </ol>
    @endif

    @if(is_active('detailkeluar'))
      <h1>
      Detail Barang Keluar
      <small>Detail Pengeluaran Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Detail Barang Keluar</li>
      </ol>
    @endif

    @if(is_active('daftarkeluar'))
      <h1>
      Keluarkan Barang
      <small>Daftar Pengeluaran Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Barang Keluar</li>
      </ol>
    @endif

    @if(is_active('detailkeluarv'))
      <h1>
      Detail Barang Keluar
      <small>Detail Pengeluaran Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Detail Barang Keluar</li>
      </ol>
    @endif
    <!-- Admin -->
    @if(is_active('aturhak'))
      <h1>
      Atur Hak
      <small>Klik Jabatan untuk mengatur hak</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Atur Hak</li>
      </ol>
    @endif
</section>