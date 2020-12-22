@extends('index')
@section('konten')
	<div class="col-md-9">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Barang</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          {{ Form::open(array('method' => 'POST', 'url' => 'formbarang', 'class' => 'form', 'files' => true)) }}
              <div class="box-body">
                @if($errors->any())
					<div class="form-group {{ $errors->has('namaBarang') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xnama','Nama Barang') }}
					{{ Form::text('namaBarang','',array('placeholder' => 'Masukkan Nama Barang', 'class' => 'form-control' )) }}
					@if ($errors->has('namaBarang'))
						<span class="help-block">{{ $errors->first('namaBarang') }}</span>
					@endif
				</div>

				@if($errors->any())
					<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xket','Keterangan') }}
					{{ Form::text('keterangan','',array('placeholder' => 'Masukkan keterangan barang', 'class' => 'form-control')) }}
					@if ($errors->has('keterangan'))
						<span class="help-block">{{ $errors->first('keterangan') }}</span>
					@endif
				</div>
				
				@if($errors->any())
					<div class="form-group {{ $errors->has('qty') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xqty','Jumlah') }}
					{{ Form::text('qty','',array('placeholder' => 'Masukkan jumlah barang', 'class' => 'form-control')) }}
					@if ($errors->has('qty'))
						<span class="help-block">{{ $errors->first('qty') }}</span>
					@endif
				</div>	

				@if($errors->any())
					<div class="form-group {{ $errors->has('satuan') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xsatuan','Satuan') }}
					{{ Form::text('satuan','',array('placeholder' => 'Masukkan Satuan Barang', 'class' => 'form-control')) }}
					@if ($errors->has('satuan'))
						<span class="help-block">{{ $errors->first('satuan') }}</span>
					@endif
				</div>	

			
              </div>
              <div class="box-footer">
                {{ Form::submit('Submit',array('class' => 'btn btn-primary'))}}
                <a href="{{ url("dashboardvendor") }}" class="btn btn-default">Kembali</a>
              </div>
            {{ Form::close() }}
        </div>
      </div>
    </div>
    <div class="col-md-3">
    	<div class="callout callout-danger">
            <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
                - Harap isikan data dengan sebenar-benarnya <br>
        </div>
    </div>
@endsection