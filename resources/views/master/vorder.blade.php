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
					<h3 class="box-title">Data Order</h3>
					<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				{{-- <a href="{{url('karyawan/create')}}" class="btn btn-default btn-sm"><i class="fa fa-plus"></i></a> --}}
				<div class="text-right">
              		<a href="{{url('daftarorder/'.$id)}}" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Segarkan</a>	
				</div>
				<br>
				<div class="table-responsive">
					<table id="example1" class="table table-condensed table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>PO</th>
								<th>WO</th>
								<th>Order</th>
								<th>Deal</th>
								<th>Kadaluarsa</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($order as $d)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$d->po}}</td>
								<td>{{$d->wo}}</td>
								<td>{{$d->namaOrder}}</td>
								<td>{{tanggal_indo($d->tglDeal,true)}}</td>
								<td>{{tanggal_indo($d->tglKadaluarsa,true)}}</td>
								<td>{{$d->statusOrder}}</td>
								<td><a href="{{URL('detailpo/'.$d->idOrder)}}" class="btn btn-success btn-xs"><i class="fa fa-shopping-cart"></i></a></td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>PO</th>
								<th>WO</th>
								<th>Order</th>
								<th>Deal</th>
								<th>Kadaluarsa</th>
								<th>Status</th>
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