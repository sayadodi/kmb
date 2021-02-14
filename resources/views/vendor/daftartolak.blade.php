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
                - Klik nama pengiriman untuk melihat lebih lanjut <br>
                - Daftar dibawah adalah daftar kiriman yang pernah dilakukan oleh vendor<br>
        </div>
    </div>
    <div class="col-xs-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Barang Ditolak</h3>

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
                            <th>No PO</th>
                            <th>Keperluan</th>
                            <th>Tanggal Kirim</th>
                            <th>Nama Barang</th>
                            <th>Alasan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @if (count($tolak) > 0)
                        @foreach ($tolak as $d)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$d->nopo}}</td>
                            <td>{{$d->keperluan}}</td>
                            <td>{{$d->tglkirim}}</td>
                            <td>{{$d->namabarang}}</td>
                            <td>{{$d->alasantolak}}</td>
                            <td>Keluarkan</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">Tidak ada barang yang ditolak</td>
                        </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>No PO</th>
                            <th>Keperluan</th>
                            <th>Tanggal Kirim</th>
                            <th>Nama Barang</th>
                            <th>Alasan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
                
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        </div>
    </div>
</div>
</section>
@endsection