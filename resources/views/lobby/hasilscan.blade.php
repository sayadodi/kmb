<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Hasil Scan</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <h5>Daftar Pembawa</h5>
        <hr>
        <input type="hidden" name="idkirim" class="idkirim" value="{{ $id }}">
        <div class="table-responsive">
            <table id="table-ikut" class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Identitas</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
                        <th>Pass B</th>
                        <th>Pass A</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @if(!empty($tamu))
                    @foreach($tamu as $d)
                        <tr>
                            <td><?=$i++?></td>
                            <td>{{$d->pengenal}} - {{$d->nopengenal}}</td>
                            <td>{{$d->namatamu}}</td>
                            <td>
                            @if(empty($d->fototamu))
                                <button class="btn btn-primary btn-xs aturikut" data-id="{{$d->iddetailtamu}}">Atur</button>
                            @else
                                <img src="{{asset('tamu/'.$d->fototamu)}}" alt="" width="70" height="70">
                            @endif
                            </td>
                            <td>{{$d->notlptamu}}</td>
                            <td>{{$d->alamattamu}}</td>
                            <td>{{$d->jabatan}}</td>
                            <td><b>B</b>{{$d->nopass}}</td>
                            <td>
                                <b>A</b> <input type="text" name="" id="passa" placeholder="09" size="5" class="passa" data-kode="{{$d->iddetailtamu}}" value="{{ $d->nopassa }}">
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Tidak ada data!</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <h5>Kendaraan</h5>
        <hr>
        <div class="table-responsive">
            <table id="table-ikut" class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Plat</th>
                        <th>Gate Pass</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @if(!empty($kend))
                    @foreach($kend as $e)
                        <tr>
                            <td><?=$i++?></td>
                            <td>{{$e->jeniskendaraan}}</td>
                            <td>{{$e->namakendaraan}}</td>
                            <td>{{$e->plat}}</td>
                            <td>
                                <b>A</b> <input type="text" name="" size="5" id="gatepass" placeholder="09" class="gatepass" data-kode="{{$e->idkendaraan}}" value="{{ $e->nogate }}">

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
    </div>
</div>
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        $(".passa").keyup(function(event) {
            if (event.keyCode === 13) {
                var urlkirim = url_local+"/kmb/public/ubahnopassa";
                
                var i = $(this).data('kode');
                var p = $(this).val();
                var id = $(".idkirim").val();
                var loada = url_local+"/kmb/public/scan/"+id;

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                })

                var formData = {
                    kode : i,
                    no: p,
                }
                var type = "POST";
                var my_url = urlkirim;
                $.ajax({
                    type : type,
                    url : my_url,
                    data : formData,
                    dataType: 'json',
                    beforeSend: function(){
                        
                    },
                    success: function(data){
                        $('.hasil').load(loada);
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }
        });

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
                        $('.hasil').load(loade);
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }
        });
    });
</script>