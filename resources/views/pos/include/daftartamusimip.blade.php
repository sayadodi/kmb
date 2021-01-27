<div id="loadingpembawa" align="center">
    Proses...
</div>
<div id="pembawa" class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="table-ikut" class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Identitas</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
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
                            <td>{{$d->pengenal}} - {{$d->nopengenal}}</td>
                            <td>{{$d->namatamu}}</td>
                            <td>{{$d->notlptamu}}</td>
                            <td>{{$d->alamattamu}}</td>
                            <td>{{$d->jabatan}}</td>
                            <td>
                                <a href="#" data-id="{{$d->iddetailtamu}}" class="hapusdatap">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Tidak ada data!</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#daftarpembawabarang">
            Tambah Pembawa
        </button>
    </div>
</div>
<div class="modal" id="daftarpembawabarang" class="daftarpembawabarang" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Form Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Isi
        <div class="modal-footer">
            <button type="button" class="btn btn-primary simpanpembawa">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
</div>
@include('vendor.include.konfirmasihapusp')
{!! Html::script('plugins/webcamjs-master/webcam.min.js')!!}
{!! Html::script('js/webcam.js')!!}
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urlbarangpo = url_local+"/kmb/public/simpanpembawa";
        var urlpembawa = url_local+"/kmb/public/datapembawa/{{$id}}";
        var urlsa = url_local+"/kmb/public/ketsamping/{{$id}}";
        var urlhp = url_local+"/kmb/public/hapuspembawa/";

        $(".hapusdatap").click(function(){
            var id = $(this).data('id');
            $(".iddatap").val(id);
            $("#deleteModalp").modal();
        });

        $("#btn-deletep").click(function(){
            var id = $(".iddatap").val();
            var urlhapus = urlhp + id;
            $.ajax({
                type : 'GET',
                url : urlhapus,
                data : id,
                dataType: 'json',
                beforeSend: function(){
                    setVisible('#pembawa',true);
                    setVisible("#loadingpembawa",false);
                },
                success: function(data){
                    $(".iddatap").val("");
                    $('.dpembawa').load(urlpembawa);  
                    $('.ketsamping').load(urlsa);
                    $("#deleteModalp").modal('hide');
                },
                error: function(data){
                    
                }
            });
        });

        $(".simpanpembawa").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = new FormData($('#formpembawa')[0]);
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
                    setVisible('#pembawa',true);
                    setVisible("#loadingpembawa",false);
                },
                success: function(data){
                    $('#formpembawa').trigger("reset");
                    $('.dpembawa').load(urlpembawa);  
                    $('.ketsamping').load(urlsa);
                    $("#daftarpembawabarang").modal('hide');
                    // 
                },
                error: function(data){
                    
                }
            });
        });
    });
</script>
<script>
    onReady(function() {
        setVisible('#pembawa', true);
        setVisible('#loadingpembawa', false);
    });
</script>