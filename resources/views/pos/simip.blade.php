@extends('index')
@section('konten')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @include('include.flash_message')
        </div>
    </div>
	<div class="row">
		<div class="col-xs-12">
			<!-- /.box -->

			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Data Simip</h3>
					<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kepentingan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @if (count($data) > 0)
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{url('simip/'.$d->idtamu)}}">{{$d->kepentingan}}</a></td>
                                    <td>{{$d->tglsimip}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3">Belum ada permintaan kiriman</td>
                                </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Kepentingan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
				</div>

                <div class="box-footer">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#masukkansimip">
                Tambah kiriman
                </button>
                </div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
</section>
<div class="modal" id="masukkansimip" class="masukkansimip" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konrimasi Tamu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <div class="modal-body">
            <form action="" class="form-horizontal formsimip" method="post" id="formsimip">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-md-12 col-sm-12 col-xs-12 namb">Kepentingan<code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control kepentingan" placeholder="Contoh: Studi Lingkungan">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary tambahsimip">Lanjutkan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
    @parent
    {!! Html::script('js/fungsiloading.js')!!}
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;

        var urltambah = url_local+"/kmb/public/simip/tambah";
        var redirect = url_local+"/kmb/public/simip/";

        $(".tambahsimip").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = {
                kepentingan: $(".kepentingan").val(),
            }

            var type = "POST";
            var my_url = urltambah;
            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                beforeSend: function(){
                    
                },
                success: function(data){
                    console.log(data.errors);
                    if(data.errors){
                        if(data.errors.kepentingan){
                            
                        }
                    }else{
                        $('#formsimip').trigger("reset");
                        window.location.href = redirect+data.id;
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