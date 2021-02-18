{!! Html::style('bootstrap/css/bootstrap.min.css')!!}
<title>PJB OBJOM</title>
<style type="text/css">
  		.kecil{
  			font-size: 8px;
  		}
		.tabel {
 	 		border-spacing: 0;
  			border-collapse: collapse;
		}
  		.tabel td {
    		border: solid 2px #000;
  		}
      .row-centered{
        text-align: center;
      }
      .col-centered{
        display: inline-block;
        float: none;
        text-align: left;
        margin-right: -4px;
        text-align: center;
      }
	</style>
		<div class="col-md-12">
		<table width="100%" class="tabel" cellpadding="0" cellspacing="0">
			<tr>
				<td width="13%" rowspan="2" align="center" class="kecil"><img src="{{asset('images/sasas.png')}}" height="50px" width="70px"><br>
			    UBJ O&amp;M<br>
			    PLTU PAITON</td>
				<td width="87%" align="center" valign="bottom" bgcolor="#e5e5e5"><strong>SISTEM MANAJEMEN PENGAMANAN UNIT BISNIS JASA O&amp;M PLTU PAITON PERATURAN KAPOLRI NOMOR : 24 TAHUN 2007</strong></td>
			</tr>
			<tr>
			  <td align="center" valign="top"><strong>DOKUMEN LEVEL IV - FORMULIR : Daftar Tamu</strong></td>
		    </tr>
		</table>
	  </div>
    <div align="center">
      <b><u>Daftar Tamu</u></b>
      <br />
      
    </div>


<h5>Daftar Tamu</h5>
<hr />
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
{!! Html::script('plugins/jQuery/jquery-2.2.3.min.js')!!}