<div id="loadingtujuan" align="center">
    Proses...
</div>
<div id="tujuan"">
    <div class="row">
        <div class="col-md-12">
        <form method="post" action="" enctype="multipart/form-data" class="form-horizontal" id="formtujuan">
        <input type="hidden" name="idkirim" value="{{$id}}">
        <input type="hidden" name="jenis" value="{{$jenis}}">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-md-6">
                <label>Tanggal kirim<code>*</code></label>
                <input type="date" name="tanggalkirim" id="" value="{{$data->tglkirim}}" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Tujuan<code>*</code></label>
                @if($jenis == "po")
                    <input type="text" name="tujuan" class="form-control" value="Gudang" readonly>
                @else
                    <input type="text" name="tujuan" class="form-control" value="{{$data->tujuan}}" placeholder="Contoh: Pak Toni">
                @endif         
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <label>Kelengkapan<code>*</code></label>
                <input type="file" name="kelengkapan" id="" class="form-control">
                {{$data->berkas}}
            </div>
        </div>
        </form>
        </div>           
    </div>
    <button type="button" class="btn btn-success btn-block simpantujuan">Simpan</button>
</div>
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urltujuan = url_local+"/kmb/public/simpantujuan";
        var urldatatu = url_local+"/kmb/public/datatujuan/{{$jenis}}/{{$id}}";
        var urlsa = url_local+"/kmb/public/ketsamping/{{$id}}";



        $(".simpantujuan").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = new FormData($('#formtujuan')[0]);
            var type = "POST";
            var my_url = urltujuan;

            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(){
                    setVisible('#tujuan',true);
                    setVisible("#loadingtujuan",false);
                },
                success: function(data){
                    $('#tujuan').trigger("reset");
                    $('.dtujuan').load(urldatatu);  
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
        setVisible('#tujuan', true);
        setVisible('#loadingtujuan', false);
    });
</script>