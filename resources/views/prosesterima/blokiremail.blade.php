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
					<h3 class="box-title">Data Pengiriman</h3>
					<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                <form action="{{url('blokiremail/tambah')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Masukkan Email</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger btn-block" value="Blokir">
                    </div>
                </form>
				<div class="table-responsive">
                <table id="example1" class="table table-condensed table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Email</th>
                                <th>Tanggal</th>
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
								<td>{{$d->email}}</td>
								<td>{{$d->tglblok}}</td>
								<td>
                                    <a onclick="return confirm('Apakah anda yakin akan menghapus email ini dari blokir ?')" href="{{url('hapusblokir/'.$d->idblokir)}}">Hapus</a>
                                </td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="4">Tidak ada email yang diblokir</td>
							</tr>
							@endif
						</tbody>
						<tfoot>
							<tr>
                                <th>#</th>
								<th>Email</th>
                                <th>Tanggal</th>
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