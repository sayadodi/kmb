@extends('index')
@section('konten')
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
					<h3 class="box-title">Data Vendor</h3>
					<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				{{-- <a href="{{url('karyawan/create')}}" class="btn btn-default btn-sm"><i class="fa fa-plus"></i></a> --}}
				<div class="text-right">
					<a href="{{url('formvendor')}}" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Tambah</a>
              		<a href="{{url('daftarvendor')}}" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Segarkan</a>					
				</div>
				<br>
				<div class="table-responsive">
					<table id="example1" class="table table-condensed table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Telepon</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($vendor as $d)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$d->namavendor}}</td>
								<td>{{$d->telepon}}</td>
								<td>{{$d->email}}</td>
								<td>{{$d->alamat}}</td>
								<td>{{$d->status}}</td>
								<td>
									<a href="{{URL('daftarvendor/'.$d->kdvendor.'/edit')}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a> - <a href="{{URL('daftarorder/'.$d->kdvendor)}}" class="btn btn-success btn-xs"><i class="fa fa-shopping-cart"></i></a></td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Telepon</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>Status</th>
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