<div id="loadingkendaraan" align="center">
    Proses...
</div>
<div id="kendaraan" class="row">
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
                @if(count($data) > 0)
                    @foreach($data as $d)
                        <tr>
                            <td><?=$i++?></td>
                            <td>{{$d->jeniskendaraan}}</td>
                            <td>{{$d->namakendaraan}}</td>
                            <td>{{$d->plat}}</td>
                            <td>
                                <a href="#" data-id="{{$d->idkendaraan}}" class="hapusdatak">Hapus</a>
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
        <button type="button" class="btn btn-success tambah-kendaraan">
            Tambah Kendaraan
        </button>
    </div>
</div>
<div class="row hidden kendaraannya">
    <div class="col-md-12">
        <form method="post" action="" enctype="multipart/form-data" class="form-horizontal" id="formkendaraan">
            <input type="hidden" name="idsimip" value="{{$id}}">
            {{ csrf_field() }}
            <div class="form-group jp">
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <label>Nama Kendaraan<code>*</code></label>
                    <input type="text" name="namak" class="form-control" placeholder="Dino A4, L300, NMAX">
                </div>
                <div class="col-md-3">
                    <label>Plat Nomor<code>*</code></label>
                    <input type="text" name="plat" class="form-control" placeholder="P 09 JB">
                </div>
                <div class="col-md-3">
                    <label>A<code>*</code></label>
                    <input type="text" name="gatepass" class="form-control" placeholder="50">
                </div>
                <div class="col-md-12">
                    <button type="button" id="simpankendsimip" class="btn btn-primary simpankendsimip">Simpan Kendaraan</button>
                    <button type="button" id="batalsimpankend" class="btn btn-default batalsimpankend">Batal</button>
                </div>
            </div>
        </form>
    </div>           
</div>
@include('vendor.include.konfirmasihapusk')
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urlkendaraan = url_local+"/kmb/public/simpankendsimip";
        var urlkend = url_local+"/kmb/public/daftarkend/{{$id}}";

        $('.tambah-kendaraan').click(function(){
            $('#kendaraan').addClass('hidden');
            $('.kendaraannya').removeClass('hidden');
        });

        $('.batalsimpankend').click(function(){
            $('#kendaraan').removeClass('hidden');
            $('.kendaraannya').addClass('hidden');
        });

        $('.simpankendsimip').click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = new FormData($('#formkendaraan')[0]);
            var type = "POST";
            var my_url = simpankendaraan;

            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(){
                    setVisible('#kendaraan', false);
                    setVisible('#loadingkendaraan', true);
                },
                success: function(data){
                    $('.kendaraan').load(urlkend);
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