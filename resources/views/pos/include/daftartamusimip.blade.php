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
                @if(count($data) > 0)
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
        <button type="button" class="btn btn-success tambah-pembawa">
            Tambah Pembawa
        </button>
    </div>
</div>
<div class="row hidden fotonya">
    <form action="" id="formtamusimip">
        <h5 class="info-text"> Masukkan data diri anda.</h5>
        <div class="col-sm-4">
            <div class="picture-container">
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
                <div class="col-md-12">
                    <button type="button" id="simpantamusimip" class="btn btn-primary simpantamusimip">Simpan Tamu</button>
                    <button type="button" id="batalsimpan" class="btn btn-default batalsimpan">Batal</button>
                </div>
            </div>
        </div>
        <div class="col-sm-8">

            <div class="col-sm-12">
                <div class="form-group">
                    <label class="namb">Pilih data tamu<code>*</code></label>
                    <input type="radio" name="baru" id="" value="baru" checked> Tamu Baru
                    <input type="radio" name="baru" id="" value="pernah"> Pernah Berkunjung
                </div>
            </div>

            <div class="col-sm-12 historinya hidden">
                <div class="form-group">
                    <select class="caritamu form-control select2" style="width:100%;" name="caritamu"></select>
                </div>
                <input type="hidden" name="iddetailtamu" class="iddetailtamu">
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Jenis Pengenal <small><code>*</code></small></label>
                    <select name="pengenal" id="" class="form-control jenisp">
                        <option>Pilih pengenal</option>
                        <option value="KTP">KTP</option>
                        <option value="SIM">SIM</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>No. Pengenal <small><code>*</code></small></label>
                    <input name="nopengenal" type="text" class="form-control nop" placeholder="No. KTP, SIM, Dll">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama <small><code>*</code></small></label>
                    <input name="nama" type="text" class="form-control namap" placeholder="Andrew...">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Pekerjaan <small><code>*</code></small></label>
                    <input name="pekerjaan" type="text" class="form-control jabp" placeholder="Manager...">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Telepon <small><code>*</code></small></label>
                    <input name="telp" type="text" class="form-control kontakp" placeholder="081234567898">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Alamat <small><code>*</code></small></label>
                    <input name="alamat" type="text" class="form-control alamatp" placeholder="Alamat tamu...">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>A <small><code>*</code></small></label>
                    <input name="nopass" type="text" class="form-control" placeholder="40">
                </div>
            </div>
            
        </div>
    </form>
</div>
@include('vendor.include.konfirmasihapusp')
{!! Html::script('plugins/select2/dist/js/select2.full.min.js')!!}
{!! Html::script('plugins/webcamjs-master/webcam.min.js')!!}
{!! Html::script('js/webcam.js')!!}
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var simpantamu = url_local+"/kmb/public/simpantamusimip/{{$id}}";
        var urltamu = url_local+"/kmb/public/daftartamu/{{$id}}";
        var urlcp = url_local+"/kmb/public/tamupernahmasuk";
        var url = url_local+"/kmb/public/tamupernahmasuk/";


        $('input:radio[name=baru]').change(function() {
            if (this.value == 'baru') {
                $('.historinya').addClass('hidden');
            }
            else if (this.value == 'pernah') {
                $('.historinya').removeClass('hidden');
            }
        });

        $('.caritamu').select2({
            placeholder: 'Cari...',
            ajax: {
            url: urlcp,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                    return {
                    text: item.namatamu,
                    id: item.iddetailtamu
                    }
                })
                };
            },
            cache: true
            }
        });

        $('.caritamu').on('select2:select', function (e) {
            var id = $(this).val();
            $.get(url+id, function(data){
                console.log(data);
                $('.jenisp').val(data['pengenal']);
                $('.nop').val(data['nopengenal']);
                $('.namap').val(data['namatamu']);
                $('.jabp').val(data['jabatan']);
                $('.kontakp').val(data['notlptamu']);
                $('.alamatp').val(data['alamattamu']);
                $('.iddetailtamu').val(data['iddetailtamu']);

            })
        });

        $('.tambah-pembawa').click(function(){
            $('#pembawa').addClass('hidden');
            $('.fotonya').removeClass('hidden');
        });

        $('.batalsimpan').click(function(){
            $('#pembawa').removeClass('hidden');
            $('.fotonya').addClass('hidden');
        });

        $('.simpantamusimip').click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = new FormData($('#formtamusimip')[0]);
            var type = "POST";
            var my_url = simpantamu;

            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(){
                    setVisible('#pembawa', false);
                    setVisible('#loadingpembawa', true);
                },
                success: function(data){
                    $('.tamu').load(urltamu);
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
        setVisible('#pembawa', true);
        setVisible('#loadingpembawa', false);
    });
</script>