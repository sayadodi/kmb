<div id="loadingsimip" align="center">
    Proses...
</div>
<div id="simip">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post" id="formsimip">
                <input type="hidden" name="idkeluarnya" class="idkeluarnya" value="{{ $id }}">
                <div class="form-group">
                    <label class="col-md-12 col-sm-12 col-xs-12 namb">Apakah barang yang akan dikeluarkan ada diwilayah A(Khusus) ?<code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if($data->areakhusus == "")
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
                <div class="form-group @if($data->areakhusus == '') hidden @else  @endif kenda">
                    <label class="col-md-12 col-sm-12 col-xs-12">Apakah Menggunakan kendaraan Roda 4 ?<code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    @if($data->areakhusus == "")
                        <input type="radio" name="p2" id="" value="Y"> Iya
                        <input type="radio" name="p2" id="" value="N"> Tidak
                    @else
                        @if(empty($data->k3))
                            <input type="radio" name="p2" id="" value="Y"> Iya
                            <input type="radio" name="p2" id="" value="N" checked> Tidak
                        @else
                            <input type="radio" name="p2" id="" value="Y" checked> Iya
                            <input type="radio" name="p2" id="" value="N"> Tidak
                        @endif
                    @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('input:radio[name=p1]').change(function() {
            var va = $(this).val();
            if (this.value == 'Y') {
                $('.kenda').removeClass('hidden');
            }
            else if (this.value == 'N') {
                $('.kenda').addClass('hidden');
            }
        });

    });
</script>
<script>
    onReady(function() {
        setVisible('#simip', true);
        setVisible('#loadingsimip', false);
    });
</script>