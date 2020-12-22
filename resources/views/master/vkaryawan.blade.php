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
					<h3 class="box-title">Data karyawan</h3>
					<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<div class="text-right">
					<a href="{{url('daftarkaryawan/create')}}" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Tambah</a>
              		<a href="{{url('daftarkaryawan')}}" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Segarkan</a>
				</div>		
				<br>	
				<div class="table-responsive">
					<table id="example1" class="table table-condensed table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Telepon</th>
								<th>Username</th>
								<th>Alamat</th>
								<th>Jabatan</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($data as $d)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$d->namaKaryawan}}</td>
								<td>{{$d->tlpKaryawan}}</td>
								<td>{{$d->email}}</td>
								<td>{{$d->alamatKaryawan}}</td>
								<td>{{$d->jabatan}}</td>
								<td>{{$d->status}}</td>
								<td>
									<a onclick="return confirm('Apakah anda yakin akan menghapus data ini ?');" _method="delete" href="{{url('daftarkaryawan/hapus/'.$d->idKaryawan)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a> 
									<a href="{{URL('daftarkaryawan/'.$d->idKaryawan.'/edit')}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a></td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Telepon</th>
								<th>Username</th>
								<th>Alamat</th>
								<th>Jabatan</th>
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