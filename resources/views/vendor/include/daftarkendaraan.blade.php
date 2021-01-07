<div id="loadingkendaraan" align="center">
    Proses...
</div>
<div id="kendaraan">
    <div class="box box-widget no-border">
        <div class="box-header">
            <h3 class="box-title">Form Kendaraan</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-xs simpankendaraan">Simpan</button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="progress" style="height: 2px;">
            <div class="progress-bar" role="progressbar" style="width: 8%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="box-body">
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
        <div class="box-footer">
        * Wajib diisi
        </div>
    </div>

    <h4>Kendaraan</h4>
    <div class="progress" style="height: 2px;">
        <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 8%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
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