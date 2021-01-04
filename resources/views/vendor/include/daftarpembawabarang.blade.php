<div id="loadingpembawa" align="center">
    Proses...
</div>
<div id="pembawa"">
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
<script>
    onReady(function() {
        setVisible('#pembawa', true);
        setVisible('#loadingpembawa', false);
    });
</script>