{!! Html::style('bootstrap/css/bootstrap.min.css')!!}
<?php 
  use App\Http\Controllers\controlNotifMenu;
?>
<title>TAMU</title>
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
		.kop{
			width: 100%;
			float:left;	
      margin-bottom: 20px;
      margin-right: 10px;
		}
		.bar{
			width: 15%;	
		}
    .garis{
      width: 100%;
      border: solid 1px #000;
      clear: left;
      margin-top: 20px;
      margin-bottom: 20px;
      padding: 10px;
    }
    #data td{
      padding: 7px;
    }
    #atas td{
      padding: 7px;
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
        <td align="center" valign="top"><strong>DOKUMEN LEVEL IV - FORMULIR : SURAT MASUK TAMU</strong></td>
        </tr>
    </table>
    </div>
    

<div class="garis">
	<table width="100%" border="0" style="font-size:16px;" id="data">
  <tr>
    <td>POS UTAMA √</td>
    <td colspan="3" align="right" class="ris">NO VISITOR : B {{$pembawa->nopass}}</td>
  </tr>
  <tr>
    <td>POS DALAM</td>
    <td colspan="3" class="ris">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" class="ris">&nbsp;</td>
  </tr>
  <tr>
    <td width="23%">Nama</td>
    <td colspan="2" class="ris">: {{$pembawa->namatamu}}</td>
    <td rowspan="9" align="right" class="ris">
    @if (empty($pembawa->foto))
        {{-- true expr --}}
      @else
        <img src="{{asset("tamu/".$pembawa->fototamu)}}" height="200" width="200">
      @endif</td>
  </tr>
  <tr>
    <td>Identitas</td>
    <td colspan="2" class="ris">: {{$pembawa->pengenal}} / {{$pembawa->nopengenal}}</td>
    </tr>
  <tr>
    <td>Pekerjaan</td>
    <td colspan="2" class="ris">: {{$pembawa->jabatan}}</td>
    </tr>
  <tr>
    <td>Alamat</td>
    <td colspan="2" class="ris">: {{$pembawa->alamattamu}}</td>
    </tr>
  <tr>
    <td>Perusahaan</td>
    <td colspan="2" class="ris">: {{$tamu->perusahaan}}</td>
    </tr>
  <tr>
    <td>No. Telepon</td>
    <td colspan="2" class="ris">: {{$pembawa->notlptamu}}</td>
    </tr>
  <tr>
    <td>Yang ditemui</td>
    <td colspan="2" class="ris">: {{controlNotifMenu::carinamakaryawan($tamu->bertemu)}}</td>
    </tr>
  <tr>
    <td>Dengan/Tanpa penjanjian</td>
    <td colspan="2" class="ris">: {{$tamu->janji}}</td>
    </tr>
  <tr>
    <td>Kepentingan</td>
    <td colspan="2" class="ris">: {{$tamu->keperluan}}</td>
    </tr>
  <tr>
    <td>Kendaraan</td>
    <td width="19%" class="ris">: {{$tamu->kendaraan}}</td>
    <td colspan="2" class="ris">No. Pol. : {{$tamu->noplat}}</td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td class="ris">: {{date("d m Y")}}</td>
    <td width="35%" class="ris">Jam masuk : {{$tamu->tglmasuk}}</td>
    <td width="23%" class="ris">Jam keluar</td>
  </tr>
</table>
<br>
<br>
<br>
<br>
<br>
<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-6 text-center">
    Tamu / Pengunjung
    <br>
    <br>
    <br>
    ({{$pembawa->namatamu}})
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6 text-center">
    Petugas keamanan
    <br>
    <br>
    <br>
    ({{controlNotifMenu::carinamakaryawan($tamu->kodepos)}})
  </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
    User
    <br>
    <br>
    <br>
    ({{controlNotifMenu::carinamakaryawan($tamu->bertemu)}})
  </div>
</div>
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