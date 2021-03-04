@extends('index')
@section('konten')
<section class="content">
<div class="row">
  <div class="col-md-12">
    @include('include.flash_message')
  </div>
</div>
<div class="row">
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Atur Hak {{$jabatan->jabatan}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="{{url('aturhak/'.$jabatan->idJabatan)}}" method="post">
            {{ csrf_field() }}
            <table>
              <tr>
                <td width="">
                  <div class="checkbox icheck">
                  <input name="h1" type="checkbox" id="h1" value="Admin" @if(!empty($hak->admin)) checked="" @endif /> Admin
                </div></td>
              </tr>
              <tr>
                <td>
                  <div class="checkbox icheck">
                  <input name="h2" type="checkbox" class="iCheck" id="h2" value="Approver" @if(!empty($hak->approver)) checked="" @endif /> Approver
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="checkbox icheck">
                  <input name="h3" type="checkbox" id="h3" value="Pos" @if(!empty($hak->pos)) checked="" @endif /> Pos
                </div>
                </td>
              </tr>
              <!-- <tr>
                <td>
                <div class="checkbox icheck">
                  <input name="h4" type="checkbox" id="h4" value="Cetak surat" @if(!empty($hak->h4)) checked="" @endif /> Cetak Surat
                </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="checkbox icheck">
                  <input name="h5" type="checkbox" id="h5" value="Foto" @if(!empty($hak->h5)) checked="" @endif /> Atur foto
                </div></td>
              </tr>
              <tr>
                <td>
                <div class="checkbox icheck">
                  <input name="h6" type="checkbox" id="h6" value="Y" @if(!empty($hak->h6)) checked="" @endif /> Scan Qr-Code
                </div></td>
              </tr>
              <tr>
                <td>
                <div class="checkbox icheck">
                  <input name="h7" type="checkbox" id="h7" value="Y" @if(!empty($hak->h7)) checked="" @endif /> Meminta order
                </div>
                </td>
              </tr>
              <tr>
                <td>
                <div class="checkbox icheck">
                  <input name="h8" type="checkbox" id="h8" value="komentar" @if(!empty($hak->h8)) checked="" @endif /> Komentar Barang SPV.
                </div>
                </td>
              </tr>
              <tr>
                <td>
                <div class="checkbox icheck">
                  <input name="h9" type="checkbox" id="h9" value="keluarkan" @if(!empty($hak->h9)) checked="" @endif /> Mengeluarkan Barang.
                </div>
                </td>
              </tr>
              <tr>
                <td>
                <div class="checkbox icheck">
                  <input name="h10" type="checkbox" id="h10" value="lobby" @if(!empty($hak->h10)) checked="" @endif /> Lobby.
                </div>
                </td>
              </tr> -->
              <tr>
                <td>
                <div class="checkbox icheck">
                  <input name="h4" type="checkbox" id="h4" value="Gudang" @if(!empty($hak->gudang)) checked="" @endif /> Gudang.
                </div>
                </td>
              </tr>
              <!-- <tr>
                <td>
                <div class="checkbox icheck">
                  <input name="h12" type="checkbox" id="h12" value="urgent" @if(!empty($hak->h12)) checked="" @endif /> Urgent.
                </div>
                </td>
              </tr> -->
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" name="simpan" id="simpan" class="btn btn-primary" value="Submit" /></td>
              </tr>
            </table>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-9">
      <div class="callout callout-success">
            <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
                <b>Aturan hak.</b> <br>
                - <b>[Admin]</b> artinya jabatan ini berhak mengakses menu admin.<br>
                - <b>[Aprrover]</b> artinya jabatan ini berhak mengakses aprrover masuk dan keluar.<br>
                - <b>[Terima kiriman]</b> artinya jabatan ini berhak mengecek data sebelum dikirim (default di gudang).<br>
                - <b>[Cetak Surat]</b> artinya jabatan ini berhak mengakses cetak surat.<br>
                - <b>[Atur Foto]</b> artinya jabatan ini berhak mengatur foto pengirim (default di Satpam).<br>
                - <b>[Scan QR-code]</b> artinya jabatan ini berhak scan QR-code surat (default di resepsionis).<br>
                - <b>[Meminta Order]</b> artinya jabatan ini berhak meminta order secara pribadi pada vendor.<br>
                - <b>[Komentar SPV]</b> artinya jabatan ini berhak menerima notifikasi jika ada barang yang masuk.<br>
                - <b>[Mengeluarkan Barang]</b> artinya jabatan ini berhak mengeluarkan barang.<br>
                - <b>[Pos]</b> artinya jabatan ini berhak berada di pos.<br>
                - <b>[Urgent]</b> artinya jabatan ini berhak menerima permintaan urgent.<br>
        </div>
    </div>
</div>
</section>
{!! Html::script('plugins/jQuery/jquery-2.2.3.min.js')!!}
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
@endsection