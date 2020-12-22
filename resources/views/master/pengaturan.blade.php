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
					<h3 class="box-title">Daftar pengaturan Approver</h3>
					<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<div class="text-right">
					<a href="{{url('daftarpengaturanapprover/tambah')}}" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Tambah</a>
              		<a href="{{url('daftarpengaturanapprover')}}" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Segarkan</a>
				</div>		
				<br>	
				<div class="table-responsive">
					<table id="example1" class="table table-condensed table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Jenis</th>
								<th>Urutan</th>
								<th>Tanggal Buat</th>
                                <th>Tanggal Akhir</th>
                                <th>Aktif</th>
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
								<td>{{$d->jenis}}</td>
								<td><a href="">Lihat</a></td>
								<td>{{$d->tglbuat}}</td>
								<td>{{$d->tglakhir}}</td>
								<td>{{$d->status}}</td>
								<td>
									<a onclick="return confirm('Apakah anda yakin akan menghapus data ini ?');" _method="delete" href="{{url('daftarkaryawan/hapus/')}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a> 
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
                                <th>#</th>
								<th>Jenis</th>
								<th>Urutan</th>
								<th>Tanggal Buat</th>
                                <th>Tanggal Akhir</th>
                                <th>Aktif</th>
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