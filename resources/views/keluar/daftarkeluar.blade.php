@extends('index')
@section('konten')
<!-- Main content -->
<section class="content">
<div class="row">
	<div class="col-md-12">
		@include('include.flash_message')
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="callout callout-success">
            <h4><i class="icon fa fa-info"></i> Info!</h4>
                - Klik keperluan untuk melihat detail <br>
                - Daftar dibawah adalah daftar pengeluaran barang<br>
        </div>
    </div>
    <div class="col-xs-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Pengeluaran Barang</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive daftarpengeluaran">
                
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahkeluar">
                Tambah Pengeluaran
            </button>
        </div>
        <!-- /.box-footer -->
        </div>
    </div>
</div>

<div class="modal" id="tambahkeluar" class="tambahkeluar" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konrimasi Kiriman</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="proses" align="center" style="display: none">
                Proses...
            </div>
            <form action="" class="form-horizontal" method="post" id="formtambahpo" style="display: block">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-md-12 col-sm-12 col-xs-12">Tujuan<code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control tujuan" placeholder="Contoh: Bengkel Unit 9">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-12 col-sm-12 col-xs-12">Keperluan<code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control keperluan" placeholder="Contoh: Service berkala mobil dinas">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 col-sm-12 col-xs-12">Jenis Barang<code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <select name="jenis" class="form-control jenis">
                            <option>Pilih Jenis</option>
                            <option value="Milik Sendiri">Milik Sendiri</option>
                            <option value="Pinjam">Pinjam</option>
                            <option value="Repair">Repair</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary tambahkeluar">Lanjutkan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
</div>
</section>
@endsection
@section('scripts')
    @parent
    {!! Html::script('js/fungsiloading.js')!!}
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        var url = url_local+"/kmb/public/datadaftarpengeluaran";
        $(".daftarpengeluaran").load(url);

        var urltambah = url_local+"/kmb/public/barangkeluar/tambah";
        var redirect = url_local+"/kmb/public/barangkeluar/";


        $(".tambahkeluar").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = {
                keperluan: $(".keperluan").val(),
                tujuan: $(".tujuan").val(),
                jenis: $(".jenis").val(),
            }

            var type = "POST";
            var my_url = urltambah;
            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                beforeSend: function(){
                    setVisible('#proses',true);
                    setVisible("#formtambahpo",false);
                },
                success: function(data){
                    window.location.href = redirect+data.id;
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
	});
</script>
@stop