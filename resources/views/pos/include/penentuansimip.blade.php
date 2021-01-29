<div id="loadingsimip" align="center">
    Proses...
</div>
<div id="simip">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <input type="hidden" name="idkirimnya" class="idkirimnya" value="{{ $id }}">
                <div class="form-group">
                    <label class="col-md-12 col-sm-12 col-xs-12 namb">Apakah barang akan dibawa masuk kewilayah A(Khusus) ?<code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(empty($data))
                            <input type="radio" name="p1" id="" value="Y"> Iya
                            <input type="radio" name="p1" id="" value="N"> Tidak
                        @else
                            @if($data->areakhusus == 'Y')
                                <input type="radio" name="p1" id="" value="Y" checked> Iya
                                <input type="radio" name="p1" id="" value="N"> Tidak
                            @elseif($data->areakhusus == 'N')
                                <input type="radio" name="p1" id="" value="Y"> Iya
                                <input type="radio" name="p1" id="" value="N" checked> Tidak
                            @endif
                        @endif
                    </div>
                </div>
                <div class="form-group @if(empty($data)) hidden @else  @endif kenda">
                    <label class="col-md-12 col-sm-12 col-xs-12">Apakah Menggunakan kendaraan Roda 4 ?<code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    @if(empty($data->k3))
                        <input type="radio" name="p2" id="" value="Y"> Iya
                        <input type="radio" name="p2" id="" value="N" checked> Tidak
                    @else
                        <input type="radio" name="p2" id="" value="Y" checked> Iya
                        <input type="radio" name="p2" id="" value="N"> Tidak
                    @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        var urlp1 = url_local+"/kmb/public/p1";
        var urlp2 = url_local+"/kmb/public/p2";

        $('input:radio[name=p1]').change(function() {
            var va = $(this).val();
            if (this.value == 'Y') {
                $('.kenda').removeClass('hidden');
            }
            else if (this.value == 'N') {
                $('.kenda').addClass('hidden');
            }
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = {
                p1 : va,
                idkirim : $('.idkirimnya').val(),
            }
            var type = "POST";
            var my_url = urlp1;

            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                beforeSend: function(){
                    
                },
                success: function(data){;  
                    console.log(data);
                },
                error: function(data){
                    console.log(data);
                    
                }
            });
        });

        $('input:radio[name=p2]').change(function() {
            var va2 = $(this).val();
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = {
                p2 : va2,
                idkirim : $('.idkirimnya').val(),
            }
            var type = "POST";
            var my_url = urlp2;

            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                beforeSend: function(){
                    setVisible('#simip',true);
                    setVisible("#loadingsimip",false);
                },
                success: function(data){;  
                    console.log(data);
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
        setVisible('#simip', true);
        setVisible('#loadingsimip', false);
    });
</script>