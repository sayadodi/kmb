<div id="loadingkendaraan" align="center">
    Proses...
</div>
<div id="kendaraan" class="row">
    <div class="col-md-12">
        <div class="callout callout-success">
            <h4><i class="icon fa fa-info"></i> Info!</h4>
                - Isi minimal satu orang <br>
                - Isikan identitas dengan benar<br>
        </div>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="table-ikut" class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Plat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @if(!empty($data))
                    @foreach($data as $d)
                        <tr>
                            <td><?=$i++?></td>
                            <td>{{$d->jeniskendaraan}}</td>
                            <td>{{$d->namakendaraan}}</td>
                            <td>{{$d->plat}}</td>
                            <td>
                                Hapus
                                Ubah
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Tidak ada data!</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#daftarkendaraan">
            Tambah Kendaraan
        </button>
    </div>
</div>
<div class="modal" id="daftarkendaraan" class="daftarkendaraan" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Form Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                <form method="post" action="" enctype="multipart/form-data" class="form-horizontal" id="formkendaraan">
                <input type="hidden" name="idkirim" value="{{$id}}">
                {{ csrf_field() }}
                <div class="form-group jp">
                    <div class="col-md-4">
                    <label>Jenis kendaraan<code>*</code></label>
                    <select name="jenisk" class="form-control">
                        <option>Pilih</option>
                        <option value="Motor">Motor</option>
                        <option value="Pick up">Pick up</option>
                        <option value="Truck">Truck</option>
                        <option value="Box">Box</option>
                        <option value="Kontainer">Kontainer</option>
                    </select>
                    </div>
                    <div class="col-md-4">
                    <label>Nama Kendaraan<code>*</code></label>
                    <input type="text" name="namak" class="form-control nomorp" placeholder="Dino A4, L300, NMAX">
                    </div>
                    <div class="col-md-4">
                    <label>Plat Nomor<code>*</code></label>
                    <input type="text" name="plat" class="form-control namap" placeholder="P 09 JB">
                    </div>
                </div>
                </form>
                </div>           
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary simpankendaraan">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urlkendaraan = url_local+"/kmb/public/simpankendaraan";
        var urldatak = url_local+"/kmb/public/datakendaraan/{{$id}}";
        var urlsa = url_local+"/kmb/public/ketsamping/{{$id}}";

        $(".simpankendaraan").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = new FormData($('#formkendaraan')[0]);
            var type = "POST";
            var my_url = urlkendaraan;

            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(){
                    setVisible('#kendaraan',true);
                    setVisible("#loadingkendaraan",false);
                },
                success: function(data){
                    $('#formkendaraan').trigger("reset");
                    $('.dkendaraan').load(urldatak);  
                    $('.ketsamping').load(urlsa);

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
        setVisible('#kendaraan', true);
        setVisible('#loadingkendaraan', false);
    });
</script>