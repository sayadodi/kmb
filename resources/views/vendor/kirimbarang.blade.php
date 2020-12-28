@extends('index')
@section('konten')
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
          <li><a href="#tools" data-toggle="tab">Tools</a></li>
          <li><a href="#tujuan" data-toggle="tab">Tujuan dan Kendaraan</a></li>

        </ul>
        <div class="tab-content">
            {{-- Barang --}}
            <div class="active tab-pane" id="barang">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Form barang</h4>
                        <div class="progress" style="height: 2px;">
                            <div class="progress-bar" role="progressbar" style="width: 8%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
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
                    </div>
                </div>
                <br>
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
                <h4>Pengantar barang</h4>
                <hr>
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

            {{-- Tools --}}
            <div class="tab-pane" id="tools">
                <h4>Daftar tools tambahan</h4>
                <small>Jika membawa barang tambahan berupa tools tambahan yang bukan termasuk order</small>
                <hr>
                <div class="table-responsive">
                    <table id="table-barangb" class="table table-condensed table-striped">
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

            {{-- Tujuan dan kendaraan --}}
            <div class="tab-pane" id="tujuan">
                
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection