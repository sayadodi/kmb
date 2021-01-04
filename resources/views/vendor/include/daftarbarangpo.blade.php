<div id="loadingbarang" align="center">
    Proses...
</div>
<div id="barang"">
    <div class="box box-widget no-border">
        <div class="box-header">
        <h3 class="box-title">Form Barang</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-xs simpanbarangpo">Simpan</button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        </div>
        <div class="progress" style="height: 2px;">
        <div class="progress-bar" role="progressbar" style="width: 8%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="box-body">
        <div class="row">
            <div class="col-md-12">
            <form action="" class="form-horizontal" method="post" id="formbarangpo" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-md-12 col-sm-12 col-xs-12 namb">Jenis Barang<code>*</code></label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="radio" name="jenisb" id="" value="PO"> Barang PO
                    <input type="radio" name="jenisb" id="" value="NonPO"> Tools Tambahan
                </div>
            </div>
            <div class="form-group nb">
                <label class="col-md-12 col-sm-12 col-xs-12 namb">Nama Barang<code>*</code></label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="text" name="namabarang" id="" class="form-control">
                </div>
            </div>

            <div class="form-group jb">
                <label class="col-md-12 col-sm-12 col-xs-12">Jumlah / Satuan<code>*</code></label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <input type="number" name="jumlah" class="form-control jumlah" placeholder="Masukkan Jumlah">
                    <span class="errorj help-block hidden"></span>
                </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    <input type="text" name="satuan" class="form-control satuan" placeholder="Masukkan Satuan">
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
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urlbarangpo = url_local+"/kmb/public/simpanbarangpo";

        $(".simpanbarangpo").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = new FormData($('#formbarangpo')[0]);
            formData.append('kiriman',$('.idkirim').val());
            var type = "POST";
            var my_url = urlbarangpo;

            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(){
                    setVisible('#barang',true);
                    setVisible("#loadingbarang",false);
                },
                success: function(data){
                    $('#formbarangpo').trigger("reset");
                    $('.dbarang').load(urlpo);  
                    // 
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });
</script>
<script>
    onReady(function() {
        setVisible('#barang', true);
        setVisible('#loadingbarang', false);
    });
</script>