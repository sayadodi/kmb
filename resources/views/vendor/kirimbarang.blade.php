@extends('index')
@section('konten')
<style type="text/css">
.no-border {
    border: 0;
    box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
}
</style>
<section class="content">
<div class="row">
	<div class="col-md-12">
		@include('include.flash_message')
	</div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="box box-primary">
            <div class="box-body box-profile">
            <p class="text-muted text-center">Nama CV</p>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <b>Jumlah Barang</b> <a class="pull-right">14</a>
                </li>
                <li class="list-group-item">
                <b>Pembawa Barang</b> <a class="pull-right">2</a>
                </li>
                <li class="list-group-item">
                <b>Jumlah Tools</b> <a class="pull-right">0</a>
                </li>
            </ul>

            </div>
            <!-- /.box-body -->
        </div>

        <div class="callout callout-danger">
            <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
                - Harap pastikan data sesuai dengan yang terdaftar pada unit <br>
                - Silahkan terima jika data ada dan berikan saran<br>
                - Tolak jika data vendor tidak sesuai
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-10">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li><a href="#barang" data-toggle="tab">Barang</a></li>
          <li><a href="#pembawa" data-toggle="tab">Pembawa barang</a></li>
          <li><a href="#tujuan" data-toggle="tab">Tujuan dan Kendaraan</a></li>

        </ul>
        <div class="tab-content">
          {{-- Barang --}}
          <div class="active tab-pane" id="barang">
            <div class="box box-widget no-border">
              <div class="box-header">
                <h3 class="box-title">Form Barang</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-primary btn-xs">Simpan</button>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="progress" style="height: 2px;">
                <div class="progress-bar" role="progressbar" style="width: 8%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12 namb">Jenis Barang<code>*</code></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="radio" name="jenisb" id=""> Barang PO
                            <input type="radio" name="jenisb" id=""> Tools Tambahan
                        </div>
                    </div>
                    <div class="form-group nb">
                        <label class="col-md-12 col-sm-12 col-xs-12 namb">Nama Barang<code>*</code></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="" id="" class="form-control">
                        </div>
                    </div>
    
                    <div class="form-group jb">
                        <label class="col-md-12 col-sm-12 col-xs-12">Jumlah / Satuan<code>*</code></label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <input type="number" name="jumlah" class="form-control jumlah" placeholder="Masukkan Jumlah">
                            <span class="errorj help-block hidden"></span>
                        </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                            <input type="text" name="satuan" class="form-control satuan" placeholder="Masukkan Satuan" readonly>
                        </div>
                    </div>
                    <p class="et text-center alert alert-danger hidden"></p>
    
                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12">Keterangan</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <textarea class="form-control keterangan" name="keterangan"></textarea>
                        </div>
                    </div>

                    <div class="form-group gb">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <label class="col-md-12 col-sm-12 col-xs-12">Gambar<code>*</code></label>
                            <input type="file" name="gambar" class="form-control gambar">
                            <span class="errorg help-block hidden"></span>
                        </div>
                        
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <label class="col-md-6 col-sm-12 col-xs-12">Berkas</label>
                            <input type="file" name="berkas" class="form-control berkas">
                        </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                * Wajib diisi
              </div>
            </div>

            <div class="table-responsive">
              <h4>Daftar barang</h4>
              <div class="progress" style="height: 2px;">
                  <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 8%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <table id="table-barang" class="table table-condensed table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama barang</th>
                  <th>Jumlah</th>
                  <th>Gambar</th>
                  <th>Dokumen</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>

          {{-- Pembawa barang --}}
          <div class="tab-pane" id="pembawa">
          <div class="box box-widget no-border">
              <div class="box-header">
                <h3 class="box-title">Form Identitas pengantar</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-primary btn-xs">Simpan</button>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="progress" style="height: 2px;">
                <div class="progress-bar" role="progressbar" style="width: 8%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="idikutan" class="idikutan" value="">
                    <div class="form-group jp">
                      <div class="col-md-4">
                        <label>Jenis Pengenal</label>
                        <select name="jenis" class="form-control jenisp">
                          <option>Pilih</option>
                          <option value="KTP">KTP</option>
                          <option value="SIM">SIM</option>
                          <option value="SIM">Ekspedisi</option>
                        </select>
                      </div>
                      <div class="col-md-8">
                        <label>Nomor pengenal / No Resi</label>
                        <input type="text" name="nomor" class="form-control nomorp" placeholder="Masukkan nomor">
                        <span class="enp help-block hidden"></span>
                      </div>
                    </div>

                    <div class="form-group nap">
                      <div class="col-md-4">
                        <label>Nama pengikut / Ekspedisi</label>
                        <input type="text" name="nama" class="form-control namap" placeholder="Masukkan nama">
                        <span class="enap help-block hidden"></span>
                      </div>

                      <div class="col-md-4">
                        <label>Jabatan</label>
                        <input type="text" name="nama" class="form-control jabp" placeholder="Masukkan nama">
                        <span class="ejbpp help-block hidden"></span>
                      </div>

                      <div class="col-md-4">
                        <label>No Hp/Telp</label>
                        <input type="text" name="kontak" class="form-control kontakp" placeholder="Masukkan Kontak">
                        <span class="ekp help-block hidden"></span>
                      </div>
                    </div>

                    <div class="form-group ap">
                      <div class="col-md-12">
                        <label>Alamat</label>
                        <textarea class="form-control alamatp" name="alamat"></textarea>
                        <span class="eap help-block hidden"></span>
                      </div>
                    </div>
                    </form>
                  </div>           
                </div>
              </div>
              <div class="box-footer">
                * Wajib diisi
              </div>
            </div>
            
            <h4>Pengantar barang</h4>
            <div class="progress" style="height: 2px;">
              <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 8%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="table-responsive">
                  <table id="table-ikut" class="table table-condensed table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Identitas</th>
                      <th>Nama</th>
                      <th>Foto</th>
                      <th>Kontak</th>
                      <th>Alamat</th>
                      <th>Jabatan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                      <td>1</td>
                      <td>2</td>
                      <td>3</td>
                      <td>Lihat</td>
                      <td>4</td>
                      <td>5</td>
                      <td>6</td>
                      <td>7</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
          </div>

          {{-- Tujuan dan kendaraan --}}
          <div class="tab-pane" id="tujuan">
              
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection