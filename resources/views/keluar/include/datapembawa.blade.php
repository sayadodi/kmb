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
                                <a href="#" data-id="{{$d->idhistori}}" class="hapusdatap">Hapus</a>
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
        <button type="button" class="btn btn-success btn-tambahp">
            Tambah Pembawa
        </button>
    </div>
</div>
<div class="row hidden tambahpembawa">
    <div class="col-md-12">
        <form method="post" action="" enctype="multipart/form-data" class="form-horizontal" id="formpembawa">
            <input type="hidden" name="idkeluar" value="{{$id}}">
            <input type="hidden" name="iddetailtamu" class="iddetailtamu">
            {{ csrf_field() }}
            <input type="hidden" name="idikutan" class="idikutan" value="">
            <div class="form-group">
                <label class="col-md-12 col-sm-12 col-xs-12 namb">Pilih data pembawa<code>*</code></label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="radio" name="baru" id="" value="baru" checked> Pembawa Baru
                    <input type="radio" name="baru" id="" value="pernah"> Pernah Membawa
                </div>
            </div>
            <div class="form-group hidden historinya">
                <label class="col-md-12 col-sm-12 col-xs-12">Pilih Pembawa<code>*</code></label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <select class="caritamu form-control select2" style="width:100%;" name="caritamu"></select>
                </div>
            </div>
            <div class="form-group jp">
                <div class="col-md-4">
                <label>Jenis Pengenal</label>
                <select name="jenisp" class="form-control jenisp">
                    <option>Pilih</option>
                    <option value="KTP">KTP</option>
                    <option value="SIM">SIM</option>
                    <option value="SIM">Ekspedisi</option>
                </select>
                </div>
                <div class="col-md-8">
                <label>Nomor pengenal / No Resi</label>
                <input type="text" name="nomorp" class="form-control nomorp" placeholder="Masukkan nomor">
                </div>
            </div>

            <div class="form-group nap">
                <div class="col-md-4">
                <label>Nama pengikut / Ekspedisi</label>
                <input type="text" name="namap" class="form-control namap" placeholder="Masukkan nama">
                </div>

                <div class="col-md-4">
                <label>Jabatan</label>
                <input type="text" name="jabp" class="form-control jabp" placeholder="Masukkan nama">
                </div>

                <div class="col-md-4">
                <label>No Hp/Telp</label>
                <input type="text" name="kontakp" class="form-control kontakp" placeholder="Masukkan Kontak">
                </div>
            </div>

            <div class="form-group ap">
                <div class="col-md-12">
                <label>Alamat</label>
                <textarea class="form-control alamatp" name="alamat"></textarea>
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary simpanpembawa">Simpan</button>
                <button type="button" class="btn btn-secondary btn-batalp">Batal</button>
            </div>
        </form>
    </div>           
</div>
@include('vendor.include.konfirmasihapusp')
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        var urlcp = url_local+"/kmb/public/pernahmembawa";
        var urlsp = url_local+"/kmb/public/barangkeluar/simpanpembawa";
        var urlpem = url_local+"/kmb/public/barangkeluar/datapembawa/{{$id}}";
        
        $('.btn-tambahp').click(function(){
            $('#pembawa').addClass('hidden');
            $('.tambahpembawa').removeClass('hidden');
        });

        $('.btn-batalp').click(function(){
            $('#pembawa').removeClass('hidden');
            $('.tambahpembawa').addClass('hidden');
        });

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
            var my_url = urlsp;

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
                    $('.datapembawa').load(urlpem); 
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