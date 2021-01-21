<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{!! csrf_token() !!}" />
  <title>Keluar Masuk Barang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @section('css')
    @include('include.css')
  @show
</head>
<body class="hold-transition skin-red sidebar-mini">
  <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
          <div class="preloader">
            <span></span>
             <p>Please wait...</p>
         </div>
        </div>
    </div>
    <!-- #END# Page Loader -->
<div class="wrapper">

  <header class="main-header">
    @include('include.header')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      @include('include.menu')
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @include('include.dir')

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
       @yield('konten')
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    ©{{date('Y')}} PT PJB UBJOM Paiton
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@section('scripts')
  @include('include.js')
@show

<script type="text/javascript">
  $(function () {
    setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);
});
</script>
</body>
</html>