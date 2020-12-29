<!-- Content Header (Page header) -->
    <section class="content-header">
      @if(is_active('beranda'))
      <h1>
      Dashboard
      <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    @endif
    @if(is_active('requestvendor'))
      <h1>
      Daftar vendor
      <small>Halaman ini berisi permintaan untuk mendaftar vendor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Daftar vendor</li>
      </ol>
    @endif

    @if(is_active('formbarang'))
      <h1>
      Form Barang
      <small>Form pengisian barang ketika tidak ada dalam PO</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Form Barang</li>
      </ol>
    @endif

    @if(is_active('berandavendor'))
      <h1>
      Beranda
      <small>Selamat datang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    @endif

    @if(is_active('kirimbarang'))
      <h1>
      Kirim barang
      <small>Atur isian dengan sebaik-baiknya</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Kirim Barang</li>
      </ol>
    @endif

    @if(is_active('daftartamu'))
      <h1>
      Daftar tamu
      <small>Daftar kunjungan tamu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Daftar tamu</li>
      </ol>
    @endif

    @if(is_active('kirimpo'))
      <h1>
      Daftar kiriman
      <small>Histori daftar kiriman yang dilakukan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Daftar kiriman</li>
      </ol>
    @endif

    @if(is_active('daftarjabatan'))
      <h1>
        Daftar Jabatan
        <small>Berisi data jabatan yang bisa dipakai sebagai urutan approve</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jabatan</li>
      </ol>
    @endif
    @if(is_active('daftarkaryawan'))
      <h1>
        Daftar Karyawan
        <small>Berisi data karyawan Approver</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Karyawan</li>
      </ol>
    @endif
    @if(is_active('karyawan/create'))
      <h1>
        Form Tambah Karyawan
        <small>Form tambah karyawan approver</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{URL('karyawan')}}">Karyawan</a></li>
        <li class="active">Tambah</li>
      </ol>
    @endif
    @if(is_active('karyawan.edit'))
      <h1>
        Form Ubah Karyawan
        <small>Form ubah karyawan approver</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{URL('karyawan')}}">Karyawan</a></li>
        <li class="active">Ubah</li>
      </ol>
    @endif
    @if(is_active('daftarvendor'))
      <h1>
        Daftar vendor
        <small>Berisi daftar vendor yang sudah terdaftar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Vendor</li>
      </ol>
    @endif
    @if(is_active('editvendor'))
      <h1>
        Form Vendor
        <small>Form ubah untuk vendor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{URL('daftarvendor')}}">Vendor</a></li>
        <li class="active">Ubah</li>
      </ol>
    @endif
    @if(is_active('daftarorder'))
      <h1>
        Daftar order
        <small>Data order dari vendor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{URL('daftarvendor')}}">Vendor</a></li>
        <li class="active">Daftar Order</li>
      </ol>
    @endif
    @if(is_active('terimapemohon'))
      <h1>
        Daftar pemohon
        <small>Data pemohon pengirim barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pemohon</li>
      </ol>
    @endif
    @if(is_active('detailterima'))
      <h1>
        Detail kiriman barang
        <small>Data detail kiriman barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('terimapemohon')}}">Pemohon</a></li>
        <li class="active">Detail kiriman barang</li>
      </ol>
    @endif
    @if(is_active('aturhak'))
      <h1>
        Daftar jabatan
        <small>Data jabatan untuk diatur haknya</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hak jabatan</li>
      </ol>
    @endif

    @if(is_active('sethak'))
      <h1>
        Daftar hak
        <small>Ceklist hak untuk jabatan ini</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hak jabatan</li>
      </ol>
    @endif

     @if(is_active('daftarpengaturanapprover'))
      <h1>
        Setting urutan approve
        <small>Klik lihat untuk melihat urutan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Setting urutan</li>
      </ol>
    @endif

    @if(is_active('tambahapprover'))
      <h1>
        Setting urutan approve
        <small>Atur data dengan benar, pastikan karyawan dengan jabatan tersebut dalam keadaan aktif</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Setting urutan</li>
      </ol>
    @endif

    @if(is_active('detailpo'))
      <h1>
        Detail Order
        <small>Data detail dari order vendor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('daftarvendor')}}">Vendor</a></li>
        <li class="active">Detail Order</li>
      </ol>
    @endif

    @if(is_active('daftarkeluar'))
      <h1>
        Daftar Keluar Barang
        <small>Data pengeluaran barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('daftarkeluar')}}">Daftar keluar</a></li>
        <li class="active">Atur Keluar barang</li>
      </ol>
    @endif

    @if(is_active('aturkeluar'))
      <h1>
        Atur keluar barang
        <small>Halaman pengaturan keluar barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('daftarkeluar')}}">Daftar keluar</a></li>
        <li class="active">Atur Keluar barang</li>
      </ol>
    @endif

    @if(is_active('orderan'))
      <h1>
        Daftar orderan barang
        <small>Data orderan barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar order</li>
      </ol>
    @endif

    @if(is_active('orderanpribadi'))
      <h1>
        Daftar orderan barang
        <small>Data orderan barang pribadi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar order pribadi</li>
      </ol>
    @endif

    @if(is_active('orderan/add'))
      <h1>
        Buat Order
        <small>Isikan data dengan benar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('orderan')}}">Daftar Order</a></li>
        <li class="active">Buat Order</li>
      </ol>
    @endif

    @if(is_active('obarang'))
      <h1>
      Daftar barang
      <small>Sebelum keluar, atur barang dengan lengkap</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="{{url('orderan')}}">Daftar Order</a></li>
        <li class="active">Atur barang</li>
      </ol>
    @endif

    @if(is_active('ttamu'))
      <h1>
      Tambah tamu
      <small>Sebelum tambah, atur keterangan dengan lengkap</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="{{url('daftartamu')}}">Daftar tamu</a></li>
        <li class="active">Tambah tamu</li>
      </ol>
    @endif

    @if(is_active('cari'))
      <h1>
      Pencarian data
      <small>Masukkan pengenal dari pembawa barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pencarian</li>
      </ol>
    @endif

    @if(is_active('inproses'))
      <h1>
      Tamu in proses
      <small>Tamu yang dalam keadaan masuk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Proses</li>
      </ol>
    @endif

    @if(is_active('dashboardvendor'))
      <h1>
      Dashboard
      <small>Detail data order</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Detail kiriman</li>
      </ol>
    @endif

    @if(is_active('terimapemohonb'))
      <h1>
      Terima keluar
      <small>Menerima proses pengeluaran barang.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Barang keluar</li>
      </ol>
    @endif

    @if(is_active('alihkan'))
      <h1>
      Pengalihan
      <small>Masukkan data pengalihan pengaturan.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pengalihan pengaturan</li>
      </ol>
    @endif

    @if(is_active('datatamu'))
      <h1>
      Data tamu
      <small>Daftar keluar masuk tamu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data tamu</li>
      </ol>
    @endif

    @if(is_active('databarang'))
      <h1>
      Data barang
      <small>Daftar keluar masuk barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data barang</li>
      </ol>
    @endif

    @if(is_active('ubahpass'))
      <h1>
      Ubah Password Akun
      <small>Masukkan password baru</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah password</li>
      </ol>
    @endif

    @if(is_active('formvendor'))
      <h1>
      Form Vendor
      <small>Isikan data dengan benar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="{{url('daftarvendor')}}">Vendor</a></li>
        <li class="active">Form Vendor</li>
      </ol>
    @endif

    @if(is_active('khusus'))
      <h1>
      Daftar Tamu
      <small>Atur tamu dengan baik dan benar, mohon jangan diisi bila bukan haknya</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="{{url('daftartamu')}}">Daftar Tamu</a></li>
        <li class="active">Simip</li>
      </ol>
    @endif

    @if(is_active('approvekeluarbarang'))
      <h1>
      Approve Keluar Barang
      <small>Tunggu Hingga Semua Approver Menyetujui</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Approve Keluar</li>
      </ol>
    @endif

    @if(is_active('barangkeluar'))
      <h1>
      Atur keluar barang
      <small>Atur keluar barang dengan teliti</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Atur keluar barang</li>
      </ol>
    @endif

    @if(is_active('masukkanpengikut'))
      <h1>
      Atur pembawa barang
      <small>Atur pembawa barang dengan teliti</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Atur keluar barang</li>
      </ol>
    @endif

    @if(is_active('masukkankendaraan'))
      <h1>
      Atur kendaraan dll
      <small>Atur kendaraan dll barang dengan teliti</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Atur keluar barang</li>
      </ol>
    @endif

    @if(is_active('caripo'))
      <h1>
      Pencarian PO
      <small>Masukkan nomor PO dengan benar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pencarian PO</li>
      </ol>
    @endif

    @if(is_active('hasilcaripo'))
      <h1>
      Hasil pencarian PO
      <small>Data disini berisi gelombang pengiriman barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Hasil Pencarian PO</li>
      </ol>
    @endif

    @if(is_active('daftarkirimantools'))
      <h1>
      Daftar kiriman tools
      <small>Data disini berisi gelombang pengiriman tools</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Daftar Kiriman Tools</li>
      </ol>
    @endif

    @if(is_active('kirimtools'))
      <h1>
      Daftar kiriman tools
      <small>Data disini berisi gelombang pengiriman tools</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Atur Tools</li>
      </ol>
    @endif

    @if(is_active('daftarambiltools'))
      <h1>
      Daftar pengambilan tools
      <small>Data disini berisi gelombang pengiriman tools</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Atur Tools</li>
      </ol>
    @endif

    @if(is_active('barangditolak'))
      <h1>
      Daftar barang yang pernah ditolak
      <small>Data disini berisi barang yang ditolak</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Barang ditolak</li>
      </ol>
    @endif

    @if(is_active('masukkanpengikutv'))
      <h1>
      Daftar yang akan membawa barang
      <small>Data disini berisi orang yang akan membawa barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li>Ambil tools</li>
        <li class="active">Daftar pembawa</li>
      </ol>
    @endif

    @if(is_active('barangkeluarv'))
      <h1>
      Daftar barang
      <small>Data disini berisi daftar barang yang pernah dibawa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li>Ambil tools</li>
        <li class="active">Daftar barang</li>
      </ol>
    @endif

    @if(is_active('carikeluarv'))
      <h1>
      Form cari
      <small>Kode masuk ada pada surat dekat qrcode</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pencarian</li>
      </ol>
    @endif

    @if(is_active('masukkankendaraanv'))
      <h1>
      Langkah terakhir...
      <small>Masukkan data pendukung yang dibutuhkan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li>Ambil Tools</li>
        <li class="active">Terakhir</li>
      </ol>
    @endif

    @if(is_active('reqtools'))
      <h1>
      Permintaan pengeluaran tools
      <small>Klik mata untuk melihat detail, panah untuk setuju...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li>Ambil Tools</li>
        <li class="active">Terakhir</li>
      </ol>
    @endif

    @if(is_active('laporan'))
      <h1>
      Laporan
      <small>Semua pelaoran barang keluar atau barang masuk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Laporan</li>
      </ol>
    @endif
    </section>

