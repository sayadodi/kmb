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
			  <td align="center" valign="top"><strong>DOKUMEN LEVEL IV - FORMULIR : SURAT MASUK BARANG</strong></td>
		    </tr>
		</table>
	  </div>
    <div align="center">
      <b><u>SURAT MASUK BARANG</u></b>
      <br />
      
    </div>
    <div align="center">
      {!!DNS1D::getBarcodeSVG($kirim->kodekirim, "C39")!!}
      <br>
    </div>

<h5>Data Order</h5>
<hr />
<table width="100%" border="0" cellspacing="2" cellpadding="8">
  <tr>
    <td width="21%">Perusahaan</td>
    <td width="1%">:</td>
    <td width="78%">{{$kirim->namavendor}}</td>
  </tr>
  <tr>
    <td>No. PO</td>
    <td>:</td>
    <td>{{$kirim->nopo}}</td>
  </tr>
  <tr>
    <td>Order</td>
    <td>:</td>
    <td>{{$kirim->keperluan}}</td>
  </tr>
  <tr>
    <td>Tanggal Order</td>
    <td>:</td>
    <td>{{$kirim->tglbuat}}</td>
  </tr>
</table>
<h5>Data Pengantar barang</h5>
<hr />
<table id="table-ikut" class="table table-condensed table-striped" style="font-size: 12px;">
	<thead>
		<tr>
			<th>#</th>
			<th>Identitas</th>
			<th>Nama</th>
			<th>Kontak</th>
			<th>Alamat</th>
			<th>Jabatan</th>
      <th>No Pass</th>
		</tr>
	</thead>
	<tbody>
	  @php
        	$i = 1; 
      @endphp
      @foreach ($data as $d)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$d->pengenal}} / {{$d->nopengenal}}</td>
        <td>{{$d->namatamu}}</td>
        <td>{{$d->notlptamu}}</td>
        <td>{{$d->alamattamu}}</td>
        <td>{{$d->jabatan}}</td>
        <td>A{{$d->nopass}} / B{{$d->nopass}}</td>
      </tr>
      @endforeach
	</tbody>
</table>
<h5>Data Barang yang dibawa</h5>
<hr />
<table class="table table-condensed table-striped" style="font-size: 12px;">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama barang</th>
			<th>Jumlah</th>
			<th>Keterangan</th>
            <th>Jenis</th>
		</tr>
	</thead>
	<tbody>
		@php
        $j = 1; 
      @endphp
      @foreach ($barang as $ba)
      <tr>
        <td>{{$j++}}</td>
        <td>{{$ba->namamarang}}</td>
        <td>{{$ba->jumlahbarang}} {{$ba->satuan}}</td>
        <td>{{$ba->keterangan}}</td>
        <td>{{$ba->jenisbarang}}</td>
      </tr>
      @endforeach
	</tbody>
</table>
<div id="ttd">

</div>
<br>
<br />
<table width="100%" class="tabel" cellpadding="0" cellspacing="0" style="font-size: 11px;">
	<tr>
		<td width="18%" align="center" bgcolor="#e5e5e5">No. Domunem</td>
		<td width="22%" align="center" valign="bottom">JOMPTM-FM-SMP-05-046</td>
		<td width="39%" rowspan="2" align="center">Dokumen terkendali dan terkini Sistem Manajemen Pengamanan Unit Bisnis Jasa O&amp;M PLTU Paiton</td>
		<td width="8%" align="center" valign="bottom" bgcolor="#e5e5e5">No. Revisi</td>
		<td width="13%" align="center" valign="bottom">00</td>
  </tr>
	<tr>
	  <td width="18%" align="center" bgcolor="#e5e5e5">Tanggal Terbit</td>
	  <td align="center" valign="top">01 Juni 2015</td>
	  <td align="center" valign="top" bgcolor="#e5e5e5">Halaman</td>
	  <td align="center" valign="top">1 dari halaman 1</td>
    </tr>
</table>