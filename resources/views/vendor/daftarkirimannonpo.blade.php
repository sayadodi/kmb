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
        <div class="callout callout-warning">
            <h4><i class="icon fa fa-info"></i> Info!</h4>
                - Klik nama pengiriman untuk mengatur kiriman <br>
                - Daftar dibawah adalah daftar kiriman yang pernah dilakukan oleh vendor<br>
        </div>
    </div>
    <div class="col-xs-12">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Order</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive daftarkirimannonpo">
                
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#masukkannonpo">
                Tambah kiriman
                </button>
        </div>
        <!-- /.box-footer -->
        </div>
    </div>
</div>

<div class="modal" id="masukkannonpo" class="masukkannonpo" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konrimasi Kiriman</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="proses" class="proses" align="center" style="display: none">
                Proses...
            </div>
            <form action="" class="form-horizontal formtambahnonpo" method="post" id="formtambahnonpo" style="display: block">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-md-12 col-sm-12 col-xs-12 namb">Keperluan<code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control keperluan" placeholder="Contoh: Memasang lampu dijalan A">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary tambahkirimannonpo">Lanjutkan</button>
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
        var url = url_local+"/kmb/public/datadaftarkirimannonpo";
        $(".daftarkirimannonpo").load(url);

        var urltambah = url_local+"/kmb/public/kirimnonpo/tambah";

        $(".tambahkirimannonpo").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = {
                keperluan: $(".keperluan").val(),
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
                    setVisible("#formtambahnonpo",false);
                },
                success: function(data){
                    console.log(data.errors);
                    if(data.errors){
                        if(data.errors.keperluan){
                            setVisible('#proses',false);
                            setVisible("#formtambahnonpo",true);
                        }
                    }else{
                        setVisible('#proses',false);
                        setVisible("#formtambahnonpo",true);
                        $('#formtambahnonpo').trigger("reset");
                        $(".daftarkirimannonpo").load(url);
                        $("#masukkannonpo").modal('hide');
                    }
                    
                    // 
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
	});
</script>
@stop