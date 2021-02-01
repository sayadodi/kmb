{!! Html::style('bootstrap/css/bootstrap.min.css')!!}
<title>SIMIP</title>
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
    .kop{
		width: 100%;
		float:left;	
        margin-bottom: 20px;
        margin-right: 10px;
	}
    .col-centered{
        display: inline-block;
        float: none;
        text-align: left;
        margin-right: -4px;
        text-align: center;
    }
    #tamu td{
        padding: 8px;
    }
</style>
<div class="kop">
    <table width="100%" class="tabel" cellpadding="0" cellspacing="0" id="atas">
        <tr>
            <td width="13%" rowspan="2" align="center" class="kecil"><img src="{{asset('images/sasas.png')}}" height="50px" width="70px"><br>
            UBJ O&amp;M<br>
            PLTU PAITON</td>
            <td width="87%" align="center" valign="bottom" bgcolor="#e5e5e5"><strong>SISTEM MANAJEMEN PENGAMANAN UNIT BISNIS JASA O&amp;M PLTU PAITON PERATURAN KAPOLRI NOMOR : 24 TAHUN 2007</strong></td>
        </tr>
        <tr>
            <td align="center" valign="top"><strong>DOKUMEN LEVEL IV - FORMULIR : SURAT IJIN MASUK INSTALASI PEMBANGKIT</strong></td>
        </tr>
    </table>
</div>
<table width="100%" style="font-size: 12px">
    <tr>
    <td align="left">
        <b>NO.</b>
        
    </td>
    <td align="right">
        <b>Tempat & Tgl. Pemohon</b>
        PAITON, {{date("d-m-Y")}}
    </td>
    </tr>
</table>
    <br>

<table width="100%" border="0" id="tamu">
  <tr>
    <td width="21%">Perusahaan</td>
    <td width="1%">:</td>
    <td width="78%">{{$simip->perusahaan}}</td>
  </tr>
  <tr>
    <td>Kepentingan</td>
    <td>:</td>
    <td>{{$simip->kepentingan}}</td>
  </tr>
  <tr>
    <td>Tujuan</td>
    <td>:</td>
    <td>{{$simip->tujuan}}</td>
  </tr>
  <tr>
    <td>Pendamping</td>
    <td>:</td>
    <td>{{$simip->pendamping}}</td>
  </tr>
  <tr>
    <td>Tanggal & Jam</td>
    <td>:</td>
    <td>{{$simip->tglsimip}}</td>
  </tr>
</table>
<h3>Data Tamu</h3>
<hr />
<table id="example1" class="table table-condensed table-striped">
    <thead>
        <tr>
        <th>#</th>
        <th>Identitas</th>
        <th>Nama</th>
        <th>Kontak</th>
        <th>Alamat</th>
        <th>Jabatan</th>
        <th>No Visitor</th>
        <th>Foto Dll</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1; 
        @endphp
        @foreach ($orang as $d)
        <tr>
        <td>{{$i++}}</td>
        <td>{{$d->pengenal}} / {{$d->nopengenal}}</td>
        <td>{{$d->namatamu}}</td>
        <td>{{$d->notlptamu}}</td>
        <td>{{$d->alamattamu}}</td>
        <td>{{$d->jabatan}}</td>
        <td>{{$d->nopass}}</td>
        <td><img src="{{ asset('tamu/'.$d->fototamu) }}" width="70" height="70"></td>
        </tr>
        @endforeach
    </tbody>
</table>
<h3>Kendaraan</h3>
<hr />
<div class="table-responsive">
    <table id="table-ikut" class="table table-condensed table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Jenis</th>
                <th>Nama</th>
                <th>Plat</th>
            </tr>
        </thead>
        <tbody>
        @php
            $i = 1;
        @endphp
        @if(count($kendaraan) > 0)
            @foreach($kendaraan as $d)
                <tr>
                    <td><?=$i++?></td>
                    <td>{{$d->jeniskendaraan}}</td>
                    <td>{{$d->namakendaraan}}</td>
                    <td>{{$d->plat}}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">Tidak menggunakan kendaraan!</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
<br>
<div id="ttd">

</div>
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
{!! Html::script('plugins/jQuery/jquery-2.2.3.min.js')!!}