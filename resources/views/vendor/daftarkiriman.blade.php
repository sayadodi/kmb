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
        <div class="col-md-12">
            <div class="callout callout-success">
                <h4><i class="icon fa fa-info"></i> Info!</h4>
                    - Klik nama pengiriman untuk mengatur kiriman <br>
                    - Daftar dibawah adalah daftar kiriman yang pernah dilakukan oleh vendor<br>
            </div>
        </div>
		<div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Order</h3>

                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                <table class="table no-margin tabled">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Pengiriman</th>
                            <th>Tanggal Kirim</th>
                            <th>Tujuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="pages/examples/invoice.html">Perbaikan jalan</a></td>
                            <td>20 Desember 2020</td>
                            <td>Mbak Rini</td>
                            <td><span class="label label-success">Shipped</span></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
            </div>
		</div>
	</div>
</section>
@endsection