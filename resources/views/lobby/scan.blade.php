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