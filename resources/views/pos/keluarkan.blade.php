@extends('index')
@section('konten')
<?php 
  use App\Http\Controllers\controlNotifMenu;
?>
<!-- Main content -->
<section class="content">
<div class="row">
	<div class="col-md-12">
		@include('include.flash_message')
	</div>
</div>
	<div class="row">
        
		<div class="col-xs-12">
			<!-- /.box -->
            <h4>Tamu</h4>
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Data Tamu</h3>
					<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<div class="table-responsive">
					<table id="example1" class="table table-condensed table-striped">
						<thead>
							<tr>
								<th>#</th>
                                <th>Kepentingan</th>
								<th>Tanggal Masuk</th>
								<th>Info</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@if (count($tamu) > 0)
							@foreach ($tamu as $d)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$d->keperluan}}</td>
								<td>{{$d->tglmasuk}}</td>
								<td>{{controlNotifMenu::infotamu($d->kodetamu,"tamu")}}</td>
                                <td>
                                    <a onclick="return confirm('Anda Yakin Akan Mengeluarkan Tamu Ini ?')" href="{{url('keluarkan/tamu/'.$d->kodetamu)}}">Keluarkan</a>
                                </td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="5">Belum ada permintaan kiriman</td>
							</tr>
							@endif
						</tbody>
						<tfoot>
							<tr>
                                <th>#</th>
                                <th>Kepentingan</th>
								<th>Tanggal Masuk</th>
								<th>Info</th>
								<th>Aksi</th>
							</tr>
						</tfoot>
					</table>
				</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<div class="col-xs-12">
			<!-- /.box -->
            <h4>Simip</h4>
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Daftar Tamu SIMIP</h3>
					<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<div class="table-responsive">
					<table id="example1" class="table table-condensed table-striped">
						<thead>
							<tr>
                                <th>#</th>
                                <th>Kepentingan</th>
								<th>Tanggal Masuk</th>
								<th>Info</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$j = 1;
							@endphp
							@if (count($simip) > 0)
							@foreach ($simip as $e)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$e->kepentingan}}</td>
								<td>{{$e->tglsimip}}</td>
								<td>{{controlNotifMenu::infotamu($e->idtamu,"simip")}}</td>
                                <td>
                                    <a onclick="return confirm('Anda Yakin Akan Mengeluarkan Tamu Ini ?')" href="{{url('keluarkan/simip/'.$e->idtamu)}}">Keluarkan</a>
                                </td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="5">Belum ada permintaan kiriman</td>
							</tr>
							@endif
						</tbody>
						<tfoot>
							<tr>
                                <th>#</th>
                                <th>Kepentingan</th>
								<th>Tanggal Masuk</th>
								<th>Info</th>
								<th>Aksi</th>
							</tr>
						</tfoot>
					</table>
				</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
        
		<div class="col-xs-12">
			<!-- /.box -->
            <h4>Pengiriman</h4>
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Data Pengiriman</h3>
					<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<div class="table-responsive">
                    <table id="example1" class="table table-condensed table-striped">
						<thead>
							<tr>
                                <th>#</th>
                                <th>Kepentingan</th>
								<th>Tanggal Masuk</th>
								<th>Info</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$k = 1;
							@endphp
							@if (count($kirim) > 0)
							@foreach ($kirim as $f)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$f->keperluan}}</td>
								<td>{{$f->tglmasuk}}</td>
								<td>{{controlNotifMenu::infotamu($f->kodekirim,"pengiriman")}}</td>
                                <td>
                                    <a onclick="return confirm('Anda Yakin Akan Mengeluarkan Tamu Ini ?')" href="{{url('keluarkan/pengiriman/'.$f->kodekirim)}}">Keluarkan</a>
                                </td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="5">Belum ada permintaan kiriman</td>
							</tr>
							@endif
						</tbody>
						<tfoot>
							<tr>
                                <th>#</th>
                                <th>Kepentingan</th>
								<th>Tanggal Masuk</th>
								<th>Info</th>
								<th>Aksi</th>
							</tr>
						</tfoot>
					</table>
				</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
@endsection