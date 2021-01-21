@extends('index')
@section('konten')
	<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Scan</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <form method="get" action="">
          <div class="form-group">
            <label>Masukkan Scan</label>	
            <input type="text" name="scan" class="form-control scan" autofocus="" placeholder="Scan surat dari pos">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12 hasil">

  </div>
@endsection
@section('scripts')
    @parent
    <script>
      $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        $(document).on('keyup', '.scan', function (e) {
    			var id = $('.scan').val();
		      var load = url_local+"/kmb/public/scan/"+id;
          $('.hasil').load(load);
    		});
      });
    </script>
    @stop