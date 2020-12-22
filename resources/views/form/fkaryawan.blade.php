@extends('index')
@section('konten')
	<div class="col-md-9">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Karyawan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          {{ Form::open(array('method' => 'POST', 'url' => 'karyawan', 'class' => 'form', 'files' => true)) }}
              <div class="box-body">
                @if($errors->any())
					<div class="form-group {{ $errors->has('namaKaryawan') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xnim','Nama Karyawan') }}
					{{ Form::text('namaKaryawan','',array('placeholder' => 'Masukkan nama', 'class' => 'form-control')) }}
					@if ($errors->has('namaKaryawan'))
						<span class="help-block">{{ $errors->first('namaKaryawan') }}</span>
					@endif
				</div>

				@if($errors->any())
					<div class="form-group {{ $errors->has('tlpKaryawan') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xtlp','Telepon') }}
					{{ Form::text('tlpKaryawan','',array('placeholder' => 'Masukkan telepon', 'class' => 'form-control')) }}
					@if ($errors->has('tlpKaryawan'))
						<span class="help-block">{{ $errors->first('tlpKaryawan') }}</span>
					@endif
				</div>
				
				@if($errors->any())
					<div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xmail','Username') }}
					{{ Form::text('email','',array('placeholder' => 'Masukkan Username', 'class' => 'form-control')) }}
					@if ($errors->has('email'))
						<span class="help-block">{{ $errors->first('email') }}</span>
					@endif
				</div>	

				@if($errors->any())
					<div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xpass','Password') }}
					{{ Form::password('password',['placeholder' => 'Masukkan Password', 'class' => 'form-control']) }}
					@if ($errors->has('password'))
						<span class="help-block">{{ $errors->first('password') }}</span>
					@endif
				</div>

				@if($errors->any())
					<div class="form-group {{ $errors->has('idJabatan') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					@foreach ($jabatan as $j)
                  		@php
							$jabs = array();
							$jab[$j->idJabatan] = $j->jabatan;
						@endphp 
                  	@endforeach
					{{ Form::label('xjab','Jabatan') }}
					{{ Form::select('idJabatan',$jab,null,['class'=>'form-control','placeholder'=>'Pilih']) }}
					@if ($errors->has('idJabatan'))
						<span class="help-block">{{ $errors->first('idJabatan') }}</span>
					@endif
				</div>

				@if($errors->any())
					<div class="form-group {{ $errors->has('status') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xstatus','Status') }}
					{{ Form::select('status',array('Y' => 'Aktif','N' => 'Tidak Aktif'),null,['class'=>'form-control','placeholder'=>'Pilih']) }}
					@if ($errors->has('status'))
						<span class="help-block">{{ $errors->first('status') }}</span>
					@endif
				</div>

				@if($errors->any())
					<div class="form-group {{ $errors->has('android') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xandroid','Hak Android') }}
					{{ Form::select('android',array('Y' => 'Aktif','T' => 'Tidak Aktif'),null,['class'=>'form-control','placeholder'=>'Pilih']) }}
					@if ($errors->has('android'))
						<span class="help-block">{{ $errors->first('android') }}</span>
					@endif
				</div>

				@if($errors->any())
					<div class="form-group {{ $errors->has('web') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xweb','Hak Web') }}
					{{ Form::select('web',array('Y' => 'Aktif','T' => 'Tidak Aktif'),null,['class'=>'form-control','placeholder'=>'Pilih']) }}
					@if ($errors->has('web'))
						<span class="help-block">{{ $errors->first('web') }}</span>
					@endif
				</div>

				@if($errors->any())
					<div class="form-group {{ $errors->has('alamatKaryawan') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xalamat','Alamat') }}
					{{ Form::text('alamatKaryawan','',array('placeholder' => 'Masukkan Alamat', 'class' => 'form-control')) }}
					@if ($errors->has('alamatKaryawan'))
						<span class="help-block">{{ $errors->first('alamatKaryawan') }}</span>
					@endif
				</div>

				@if($errors->any())
					<div class="form-group {{ $errors->has('ttd') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xttd','TTD') }}
					{{ Form::file('ttd',array('class' => 'form-control')) }}
					@if ($errors->has('ttd'))
						<span class="help-block">{{ $errors->first('ttd') }}</span>
					@endif
				</div>
              </div>
              <div class="box-footer">
                {{ Form::submit('Submit',array('class' => 'btn btn-primary'))}}
                {{ Form::reset('Reset',array('class' => 'btn btn-default'))}}
              </div>
            {{ Form::close() }}
        </div>
      </div>
    </div>
    <div class="col-md-3">
    	<div class="callout callout-danger">
            <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
                - Harap isikan data dengan sebenar-benarnya <br>
                - Status aktif hanya untuk karyawan yang berhak melakukan approve saat ini
        </div>
    </div>
@endsection