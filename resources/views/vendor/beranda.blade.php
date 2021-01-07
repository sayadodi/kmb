@extends('index')
@section('konten')
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-aqua">
	<div class="inner">
	<h3>1</h3>

	<p>Kiriman</p>
	</div>
	<div class="icon">
	<i class="fa fa-send"></i>
	</div>
	<a href="#" class="small-box-footer"><i class="fa fa-info"></i></a>
</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-green">
	<div class="inner">
	<h3>10</h3>

	<p>Barang dikirim</p>
	</div>
	<div class="icon">
	<i class="fa fa-archive"></i>
	</div>
	<a href="#" class="small-box-footer"><i class="fa fa-info"></i></a>
</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-yellow">
	<div class="inner">
	<h3>2</h3>

	<p>Tools Dikirim</p>
	</div>
	<div class="icon">
	<i class="fa fa-gear"></i>
	</div>
	<a href="#" class="small-box-footer"><i class="fa fa-info"></i></a>
</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-red">
	<div class="inner">
	<h3>10</h3>

	<p>Pembawa</p>
	</div>
	<div class="icon">
	<i class="fa fa-user"></i>
	</div>
	<a href="#" class="small-box-footer"><i class="fa fa-info"></i></a>
</div>
</div>

    <div class="col-xs-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Kiriman yang telah diterima</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive kirimanberanda">
                
            </div>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
@parent
{!! Html::script('js/fungsiloading.js')!!}
<script>
      $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        var urlpo = url_local+"/kmb/public/kirimanberanda";

        // Simpan barang
        $('.kirimanberanda').load(urlpo);
      });
</script>
@stop