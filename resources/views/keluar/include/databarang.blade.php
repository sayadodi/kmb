<div id="loadingbarang" align="center">
    Proses...
</div>
<div id="barang">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="table-barang" class="table table-condensed table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama barang</th>
                    <th>Jumlah</th>
                    <th>Gambar</th>
                    <th>Spesifikasi</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @if(isset($data))
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $d->namabarang }}</td>
                        <td>{{ $d->jumlah }} {{ $d->satuan }}</td>
                        <td>
                            <img src="{{asset('gambar/'.$d->foto)}}" alt="" height="70" width="70">
                        </td>
                        <td>{{ $d->spesifikasi }}</td>
                        <td>
                            <a href="#" data-id="{{$d->iddetailkeluar}}" class="hapusdata">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Tidak ada data!</td>
                    </tr>
                @endif
                </tbody>
                </table>
            </div>
                <button type="button" class="btn btn-success btn-tambah">
                    Tambah Barang
                </button>
        </div>
    </div>
</div>
<div class="row hidden tambahbarang">
    <div class="col-md-12">
    <form action="" class="form-horizontal" method="post" id="formbarang" enctype="multipart/form-data">
    <input type="hidden" name="idkeluar" value="{{$id}}">
    {{ csrf_field() }}
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
    </div>

    <div class="form-group">
        <button type="button" class="btn btn-primary simpanbarang">Simpan</button>
        <button type="button" class="btn btn-secondary btn-batal">Batal</button>
    </div>
    </form>
    </div>
</div>
@include('vendor.include.konfirmasihapus')
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urlbarang = url_local+"/kmb/public/barangkeluar/simpanbarang/{{$id}}";
        var urlbrg = url_local+"/kmb/public/barangkeluar/databarang/{{$id}}";
        var urlh = url_local+"/kmb/public/hapusbarang/";

        $('.btn-tambah').click(function(){
            $('#barang').addClass('hidden');
            $('.tambahbarang').removeClass('hidden');
        });

        $('.btn-batal').click(function(){
            $('#barang').removeClass('hidden');
            $('.tambahbarang').addClass('hidden');
        });

        $(".hapusdata").click(function(){
            var id = $(this).data('id');
            $(".iddata").val(id);
            $("#deleteModal").modal();
        });

        $("#btn-delete").click(function(){
            var id = $(".iddata").val();
            var urlhapus = urlh + id;
            $.ajax({
                type : 'GET',
                url : urlhapus,
                data : id,
                dataType: 'json',
                beforeSend: function(){
                    setVisible('#barang',true);
                    setVisible("#loadingbarang",false);
                },
                success: function(data){
                    $(".iddata").val("");
                    $('.dbarang').load(urlpo);  
                    $('.ketsamping').load(urlsa);
                    $("#deleteModal").modal('hide');
                    // 
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

        $(".simpanbarang").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = new FormData($('#formbarang')[0]);
            formData.append('keluar',$('.idkeluar').val());
            var type = "POST";
            var my_url = urlbarang;

            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(){
                    
                },
                success: function(data){
                    $('#formbarang').trigger("reset");
                    $('.databarang').load(urlbrg);  
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