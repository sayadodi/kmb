<div id="loadingsamping" align="center">
    Proses...
</div>
<div id="samping">
    <form action="" id="formkirim" method="post">
        <input type="hidden" name="idkirim" class="idkirim" value="{{$id}}">
        {{ csrf_field() }}
    </form>
    <div class="box box-primary">
        <div class="box-body box-profile">
            <p class="text-muted text-center">{{session('nama')}}</p>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <b>Jumlah Barang</b> <a class="pull-right">{{$jmlbarang}}</a>
                </li>
                <li class="list-group-item">
                <b>Pembawa Barang</b> <a class="pull-right">{{$jmlbawa}}</a>
                </li>
                <li class="list-group-item">
                <b>Jumlah Tools</b> <a class="pull-right">{{$jmltools}}</a>
                </li>
            </ul>

            @if(($jmlbarang > 0 && $jmlbawa > 0 && $jmltools > 0 && $jmlken > 0))
                <button type="button" class="btn btn-primary btn-block btn-sm kirimbarang"><i class="fa fa-send"></i> Kirim</button>
            @endif

            @if($data->statusgudang == "Meminta")
                <button type="button" class="btn btn-default btn-block btn-sm disabled"><i class="fa fa-clock-o"></i> Menunggu</button>
            @endif

            <!-- @if($data->statusgudang == "Ditolak")
                <button type="button" class="btn btn-success btn-block btn-sm"><i class="fa fa-send"></i> Kirim Lagi</button>
            @endif -->
        </div>
    </div>
    @if($data->statusgudang == "Ditolak")
    <div class="box box-danger">
        <div class="box-body box-profile">
            <p class="text-muted text-center">Alasan Ditolak</p>
            Disini Alasannya
        </div>
    </div>
    @endif
</div>
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urlkirim = url_local+"/kmb/public/kirimpengiriman";
        var urlsamping = url_local+"/kmb/public/ketsamping/{{$id}}";

        $(".kirimbarang").click(function(){
            swal({
            title: "Anda yakin ?",
            text: "Sebelum konfirmasi pastikan kiriman anda sudah diatur semua, pastikan data benar-benar valid!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                })

                var formData = new FormData($('#formkirim')[0]);
                var type = "POST";
                var my_url = urlkirim;

                $.ajax({
                    type : type,
                    url : my_url,
                    data : formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function(){
                        setVisible('#samping',true);
                        setVisible("#loadingsamping",false);
                    },
                    success: function(data){
                        $('.ketsamping').load(urlsamping);  
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            } else {
                swal("Pengiriman dibatalkan!");
            }
            });
        });
    });
</script>
<script>
    onReady(function() {
        setVisible('#samping', true);
        setVisible('#loadingsamping', false);
    });
</script>