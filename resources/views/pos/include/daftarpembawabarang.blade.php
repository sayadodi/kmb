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
                        <th>Foto</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
                        <th>No pass</th>
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
                            <td>
                                    <b>A</b> <input type="text" name="" id="passa" placeholder="09" size="5" class="passa" data-kode="{{$d->idhistori}}" value="{{ $d->nopassa }}">
                                    <b>B</b> <input type="text" name="" id="passb" placeholder="09" size="5" class="passb" data-kode="{{$d->idhistori}}" value="{{$d->nopass}}">
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
    </div>
</div>

<div class="modal" id="modal-pengikut" class="modal-pengikut" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Form Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data" class="frmpengikut">
            {{ csrf_field() }}
            <input type="hidden" name="idikut" id="idikut" class="idikut">
            <input type="hidden" class="namafoto" name="namafoto" id="namafoto">
            <input type="hidden" class="idkirim" id="idkirim" value="{{$id}}">
            <div class="col-md-12">
                <input type="hidden" id="namafoto" class="namafoto"  name="namafoto" value="">
                <div id="camera">Foto</div>
                
                <div id="webcam" style="margin: 10px" align="center">
                    <input type=button value="Ambil Foto" onClick="preview()">
                </div>

                <div id="simpan" style="display:none; margin: 10px;" align="center">
                    <input type=button value="Ambil Ulang" onClick="batal()">
                </div>
            </div>
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <input type="button" class="btn btn-primary btn-savefoto" value="Submit">
        </div>
      </div>
    </div>
</div>
{!! Html::script('plugins/webcamjs-master/webcam.min.js')!!}
{!! Html::script('js/webcam.js')!!}
{!! Html::script('js/foto.js')!!}
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        var urlpa = url_local+"/kmb/public/datapembawapos/{{$id}}";
        var urlla = url_local+"/kmb/public/langkah/{{$id}}";

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
                        $('.dpembawa').load(urlpa); 
                        $('.langkah').load(urlla);
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }
        });

        $(".passb").keyup(function(event) {
            if (event.keyCode === 13) {
                var urlkirim = url_local+"/kmb/public/ubahnopass";
                var i = $(this).data('kode');
                var p = $(this).val();

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
                console.log(formData);
                $.ajax({
                    type : type,
                    url : my_url,
                    data : formData,
                    dataType: 'json',
                    beforeSend: function(){
                        
                    },
                    success: function(data){
                        $('.dpembawa').load(urlpa); 
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
        setVisible('#pembawa', true);
        setVisible('#loadingpembawa', false);
    });
</script>