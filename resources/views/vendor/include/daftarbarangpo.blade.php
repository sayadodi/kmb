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
                    <th>Dokumen</th>
                    <th>Jenis Barang</th>
                    <th>Keterangan</th>
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
                        <td>{{ $d->jumlahbarang }} {{ $d->satuan }}</td>
                        <td>
                            <img src="{{asset('gambar/'.$d->fotobarang)}}" alt="" height="70" width="70">
                        </td>
                        <td>{{$d->dokumen}}</td>
                        <td>{{ $d->jenisbarang }}</td>
                        <td>{{ $d->keterangan }}</td>
                        <td>
                            <a href="#" data-id="{{$d->iddetailkirim}}" class="hapusdata">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">Tidak ada data!</td>
                    </tr>
                @endif
                </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#daftarbarangpo">
                Tambah Barang
            </button>
        </div>
    </row>
</div>

<div class="modal" id="daftarbarangpo" class="daftarbarangpo" data-backdrop="static" data-keyboard="false">
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
            <form action="" class="form-horizontal" method="post" id="formbarangpo" enctype="multipart/form-data">
            <input type="hidden" name="idkirim" value="{{$id}}">
            <input type="hidden" name="jenis" value="{{$jenis}}">
            {{ csrf_field() }}
            @if($jenis == "po")
            <div class="form-group">
                <label class="col-md-12 col-sm-12 col-xs-12 namb">Jenis Barang<code>*</code></label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="radio" name="jenisb" id="" value="PO"> Barang PO
                    <input type="radio" name="jenisb" id="" value="NonPO"> Tools Tambahan
                </div>
            </div>
            @else
            <div class="form-group" style="display: none">
                <label class="col-md-12 col-sm-12 col-xs-12 namb">Jenis Barang<code>*</code></label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="radio" name="jenisb" id="" value="PO"> Barang PO
                    <input type="radio" name="jenisb" id="" value="NonPO" checked> Tools Tambahan
                </div>
            </div>
            @endif
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
        <div class="modal-footer">
            <button type="button" class="btn btn-primary simpanbarangpo">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
</div>
@include('vendor.include.konfirmasihapus')
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urlbarangpo = url_local+"/kmb/public/simpanbarangpo";
        var urlpo = url_local+"/kmb/public/databarangpo/{{$jenis}}/{{$id}}";
        var urlsa = url_local+"/kmb/public/ketsamping/{{$id}}";
        var urlh = url_local+"/kmb/public/hapusbarang/";

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
                    $('.ketsamping').load(urlsa);
                    $("#daftarbarangpo").modal('hide');
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