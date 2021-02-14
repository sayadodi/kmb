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
            @if($data->status == "PO")
                @if(($jmlbarang > 0 && $jmlbawa > 0 && $jmlken > 0) && ($data->statuskiriman == "Mengatur" && !empty($data->tglkirim) && !empty($data->tujuan)))
                    <button type="button" class="btn btn-primary btn-block btn-sm kirimbarang"><i class="fa fa-send"></i> Kirim</button>
                @endif

                @if(($jmlbarang > 0 && $jmlbawa > 0 && $jmlken > 0) && ($data->statuskiriman == "Ditolak Gudang"))
                    <button type="button" class="btn btn-primary btn-block btn-sm kirimbarang"><i class="fa fa-send"></i> Kirim</button>
                @endif

                @if (($jmlbarang > 0 && $jmlbawa > 0 && $jmlken > 0) && ($data->statuskiriman == "Meminta Gudang"))
                    <button type="button" class="btn btn-default btn-block btn-sm" disabled><i class="fa fa-clock-o"></i> Menunggu Persetujuan</button>
                @endif

                @if (($jmlbarang > 0 && $jmlbawa > 0 && $jmlken > 0) && ($data->statuskiriman == "Diterima Gudang"))
                    <button type="button" class="btn btn-success btn-block btn-sm" disabled><i class="fa fa-check"></i> Disetujui Gudang</button>
                    <a target="_blank" class="btn btn-default btn-block btn-sm" href="{{url('cetaksurat/'.$data->kodekirim)}}"><i class="fa fa-print"></i> Cetak Surat</a>
                @endif
            @endif

            @if($data->status == "NonPO")
                @if(($jmltools > 0 && $jmlbawa > 0 && $jmlken > 0) && ($data->statuskiriman == "Mengatur" && !empty($data->tglkirim) && !empty($data->tujuan)))
                    <button type="button" class="btn btn-primary btn-block btn-sm kirimbarang"><i class="fa fa-send"></i> Kirim</button>
                @endif

                @if (($jmltools > 0 && $jmlbawa > 0 && $jmlken > 0) && ($data->statuskiriman == "Meminta Gudang"))
                    <button type="button" class="btn btn-default btn-block btn-sm" disabled><i class="fa fa-clock-o"></i> Menunggu Persetujuan</button>
                @endif

                @if (($jmltools > 0 && $jmlbawa > 0 && $jmlken > 0) && ($data->statuskiriman == "Diterima Gudang"))
                    <button type="button" class="btn btn-success btn-block btn-sm" disabled><i class="fa fa-check"></i> Disetujui Gudang</button>
                    <a target="_blank" class="btn btn-default btn-block btn-sm" href="{{url('cetaksurat/'.$data->kodekirim)}}"><i class="fa fa-print"></i> Cetak Surat</a>
                @endif
            @endif
        </div>
    </div>
    <div class="box box-warning direct-chat direct-chat-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Histori kiriman</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            </div>
        </div>
        <div class="box-body">
            <div class="direct-chat-messages">
                @foreach($histori as $h)
                    @if(empty($h->kdkaryawan))
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">{{session('nama')}}</span>
                        <span class="direct-chat-timestamp pull-right">{{$h->tgltt}}</span>
                        </div>
                        <img class="direct-chat-img" src="{{asset('dist/img/user2-160x160.jpg')}}" alt="message user image">
                        <div class="direct-chat-text">
                        {{$h->alasan}}
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    @endif
                    @if(!empty($h->kdkaryawan))
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">UBJOM</span>
                        <span class="direct-chat-timestamp pull-left">{{$h->tgltt}}</span>
                        </div>
                        <img class="direct-chat-img" src="{{asset('images/sasas.png')}}" alt="message user image">
                        <div class="direct-chat-text">
                        <b>{{$h->status}}</b> : {{$h->alasan}}
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
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