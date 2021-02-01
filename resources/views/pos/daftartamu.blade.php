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
							@if (count($data) > 0)
							@foreach ($data as $d)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$d->keperluan}}</td>
								<td>{{$d->tglmasuk}}</td>
								<td>{{controlNotifMenu::infotamu($d->kodetamu,"tamu")}}</td>
                                <td>
                                    <a target="_blank" href="{{url('cetaktamu/'.$d->kodetamu)}}"><i class="fa fa-print"></i></a>
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
                <div class="box-footer">
                <a href="{{url('kunjungan')}}" class="btn btn-default"><i class="fa fa-plus"></i> Tambah Tamu</a>
                </div>
			</div>
			<!-- /.box -->
		</div>   
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
@endsection