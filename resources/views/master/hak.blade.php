@extends('index')
@section('konten')
<?php 
  use App\Http\Controllers\controlNotifMenu;
?>
<section class="content">
<div class="row">
  <div class="col-md-12">
    @include('include.flash_message')
  </div>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="callout callout-danger">
            <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
                - Klik nama jabatan untuk mengatur hak. <br>
                - Ini berfungsi untuk mengatur hak dari jabatan tersebut berhak apa saja.
        </div>
    </div>
    <div class="col-md-12">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Jabatan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <table id="example1" class="table table-condensed table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Jabatan</th>
                <th>Hak</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($data as $d)
							<tr>
								<td>{{$i++}}</td>
								<td>
                  <a href="{{url('aturhak/'.$d->idJabatan)}}"><b>{{$d->jabatan}}</b></a>
                </td>
                <td>
                  {{nl2br(controlNotifMenu::carihak($d->idJabatan))}}
                </td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Jabatan</th>
							</tr>
						</tfoot>
					</table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    
</div>
</section>
@endsection