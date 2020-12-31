@extends('index')
@section('konten')
<style type="text/css">
.no-border {
    border: 0;
    box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
}
</style>
<section class="content">
<div class="row">
	<div class="col-md-12">
		@include('include.flash_message')
	</div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="box box-primary">
            <div class="box-body box-profile">
            <p class="text-muted text-center">Nama CV</p>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <b>Jumlah Barang</b> <a class="pull-right">14</a>
                </li>
                <li class="list-group-item">
                <b>Pembawa Barang</b> <a class="pull-right">2</a>
                </li>
                <li class="list-group-item">
                <b>Jumlah Tools</b> <a class="pull-right">0</a>
                </li>
            </ul>

            </div>
            <!-- /.box-body -->
        </div>

        <div class="callout callout-danger">
            <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
                - Harap pastikan data sesuai dengan yang terdaftar pada unit <br>
                - Silahkan terima jika data ada dan berikan saran<br>
                - Tolak jika data vendor tidak sesuai
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-10">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li><a href="#barang" data-toggle="tab">Barang</a></li>
          <li><a href="#pembawa" data-toggle="tab">Pembawa barang</a></li>
          <li><a href="#tujuan" data-toggle="tab">Tujuan dan Kendaraan</a></li>

        </ul>
        <div class="tab-content">
          {{-- Barang --}}
          <div class="active tab-pane" id="barang">
            
          </div>

          {{-- Pembawa barang --}}
          <div class="tab-pane" id="pembawa">
            
          </div>

          {{-- Tujuan dan kendaraan --}}
          <div class="tab-pane" id="tujuan">
              
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection