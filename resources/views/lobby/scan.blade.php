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

<div class="modal fade" id="modal-kosong">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Perhatian</h4>
        </div>
		<input type="hidden" name="idtamunya" class="idtamunya">
        <div class="modal-body">
          Data tidak ada
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
    @parent
    <script>
      $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        $(document).on('keyup', '.scan', function (e) {
    			var id = $('.scan').val();
		        $('.idtamunya').focus();
		        $.ajax({
		            type : "GET",
		            url : url_local+"/kmb/public/scan/"+id,
		            data : "",
		            dataType: 'json',
		            beforeSend: function(){
		                
		            },
		            success: function(data){
			            if (data == "Kosong"){            		
			            	
			            }else{
			            	window.location = data;
			            }
		            },
		            error: function(data){
		                
		            }
		        });
    		});
      });
    </script>
    @stop