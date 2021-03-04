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
                        @if(!empty($kiriman->k3))
                            <th>Gate Pass</th>
                        @else

                        @endif
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
                                <b>A</b> <input type="text" name="" size="5" id="gatepass" placeholder="09" class="gatepass" data-kode="{{$d->idhistorikend}}" value="{{ $d->nogate }}">
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Tidak ada data!</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        var urlke = url_local+"/kmb/public/datakendaraanpos/{{$id}}";
        var urlla = url_local+"/kmb/public/langkah/{{$id}}";

        $(".gatepass").keyup(function(event) {
            if (event.keyCode === 13) {
                var gatepass = url_local+"/kmb/public/ubahgatepass";
                
                var q = $(this).data('kode');
                var w = $(this).val();
                var id = $(".idkirim").val();
                var loade = url_local+"/kmb/public/scan/"+id;

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                })

                var formData = {
                    kode : q,
                    no: w,
                }
                var type = "POST";
                var my_url = gatepass;
                $.ajax({
                    type : type,
                    url : my_url,
                    data : formData,
                    dataType: 'json',
                    beforeSend: function(){
                        
                    },
                    success: function(data){
                        $('.dkendaraan').load(urlke);
                        $('.langkah').load(urlla);
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }
        });
    });
</script>
<script>
    onReady(function() {
        setVisible('#kendaraan', true);
        setVisible('#loadingkendaraan', false);
    });
</script>