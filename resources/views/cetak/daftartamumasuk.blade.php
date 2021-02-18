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
                <form action="{{url('laporantamu/cetak')}}" method="get">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" name="tgl1" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="tgl2" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-default btn-block" value="Cetak">
                    </div>
                </form>
				<div class="table-responsive">
					<table id="example1" class="table table-condensed table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Keperluan</th>
                                <th>Nama Tamu</th>
                                <th>Status</th>
								<th>Tanggal Masuk</th>
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
								<td>{{$d->jenis}}</td>
								<td>{{$d->namatamu}}</td>
								<td>{{$d->jabatan}}</td>
                                <td>{{$d->tgltamu}}</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="5">Belum ada tamu hari ini</td>
							</tr>
							@endif
						</tbody>
						<tfoot>
							<tr>
                                <th>#</th>
								<th>Keperluan</th>
                                <th>Nama Tamu</th>
                                <th>Status</th>
								<th>Tanggal Masuk</th>
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