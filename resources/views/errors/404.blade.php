@include('include.css')
<!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Halaman tidak ditemukan.</h3>

          <p>
            Kami tidak menemukan halaman yang anda cari, mohon koreksi kembali alamat yang anda masukkan.<a href="{{url('login')}}">Masuk sebagai admin</a> atau <a href="{{url('loginvendor')}}">Masuk sebagai vendor</a>.
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->