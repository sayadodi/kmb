@extends('index')
@section('konten')
	<div class="col-md-9">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Vendor</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          {{ Form::model($vendor,array('method' => 'PUT', 'url' => 'terimavendor/'.$vendor->kdvendor, 'class' => 'form', 'files' => true)) }}
              <div class="box-body">
                @if($errors->any())
					<div class="form-group {{ $errors->has('namavendor') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xnam','Nama Vendor') }}
					{{ Form::text('namavendor',null,array('placeholder' => 'Masukkan nama', 'class' => 'form-control', 'disabled')) }}
					@if ($errors->has('namavendor'))
						<span class="help-block">{{ $errors->first('namavendor') }}</span>
					@endif
				</div>

				@if($errors->any())
					<div class="form-group {{ $errors->has('telepon') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xtlp','Telepon') }}
					{{ Form::text('telepon',null,array('placeholder' => 'Masukkan telepon', 'class' => 'form-control', 'disabled')) }}
					@if ($errors->has('telepon'))
						<span class="help-block">{{ $errors->first('telepon') }}</span>
					@endif
				</div>
				
				@if($errors->any())
					<div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xmail','Email') }}
					{{ Form::text('email',null,array('placeholder' => 'Masukkan Email', 'class' => 'form-control','disabled')) }}
					@if ($errors->has('email'))
						<span class="help-block">{{ $errors->first('email') }}</span>
					@endif
				</div>	


				@if($errors->any())
					<div class="form-group {{ $errors->has('alamat') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xalamat','Alamat') }}
					{{ Form::text('alamat',null,array('placeholder' => 'Masukkan Alamat', 'class' => 'form-control','disabled')) }}
					@if ($errors->has('alamat'))
						<span class="help-block">{{ $errors->first('alamat') }}</span>
					@endif
				</div>

                @if($errors->any())
					<div class="form-group {{ $errors->has('status') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xstatus','Status') }}
					{{ Form::select('status',array('1' => 'Terima','0' => 'Tolak'),null,['class'=>'form-control']) }}
					@if ($errors->has('status'))
						<span class="help-block">{{ $errors->first('status') }}</span>
					@endif
				</div>

                <div class="form-group">
                {{ Form::label('xalasan','Alasan') }}
                {{ Form::textarea('alasan', null, [
                    'class'      => 'form-control',
                    'rows'       => 1, 
                    'name'       => 'alasan',
                    'id'         => 'alasan',
                    'placeholder' => 'Contoh ditolak: Maaf nomor telepon anda salah , contoh diterima: Lanjutkan pengiriman'
                ]) }}
                </div>

              </div>
              <div class="box-footer">
                {{ Form::submit('Submit',array('class' => 'btn btn-primary'))}}
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