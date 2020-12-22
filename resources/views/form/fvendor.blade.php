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
          {{ Form::open(array('method' => 'POST', 'url' => 'tvendor', 'class' => 'form', 'files' => true)) }}
          		{{ Form::hidden('re', "$link") }}
              <div class="box-body">
                @if($errors->any())
					<div class="form-group {{ $errors->has('idvendor') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xid','ID Vendor') }}
					{{ Form::text('idVendor','',array('placeholder' => 'Masukkan ID vendor contoh : VEND80', 'class' => 'form-control','maxlength' => 7 )) }}
					@if ($errors->has('idVendor'))
						<span class="help-block">{{ $errors->first('idVendor') }}</span>
					@endif
				</div>

				@if($errors->any())
					<div class="form-group {{ $errors->has('namaVendor') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xnama','Nama Vendor') }}
					{{ Form::text('namaVendor','',array('placeholder' => 'Masukkan nama vendor', 'class' => 'form-control')) }}
					@if ($errors->has('namaVendor'))
						<span class="help-block">{{ $errors->first('namaVendor') }}</span>
					@endif
				</div>
				
				@if($errors->any())
					<div class="form-group {{ $errors->has('emailVendor') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xmail','Email') }}
					{{ Form::text('emailVendor','',array('placeholder' => 'Masukkan Email', 'class' => 'form-control')) }}
					@if ($errors->has('emailVendor'))
						<span class="help-block">{{ $errors->first('emailVendor') }}</span>
					@endif
				</div>	

				@if($errors->any())
					<div class="form-group {{ $errors->has('hpVendor') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xmail','Telepon') }}
					{{ Form::text('hpVendor','',array('placeholder' => 'Masukkan No. Telepon', 'class' => 'form-control')) }}
					@if ($errors->has('hpVendor'))
						<span class="help-block">{{ $errors->first('hpVendor') }}</span>
					@endif
				</div>	

				@if($errors->any())
					<div class="form-group {{ $errors->has('status') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xstatus','Status') }}
					{{ Form::select('status',array('1' => 'Aktif','0' => 'Tidak Aktif'),null,['class'=>'form-control','placeholder'=>'Pilih']) }}
					@if ($errors->has('status'))
						<span class="help-block">{{ $errors->first('status') }}</span>
					@endif
				</div>

				@if($errors->any())
					<div class="form-group {{ $errors->has('alamatVendor') ? 'has-error' : 'has-success' }}">
				@else
					<div class="form-group">
				@endif
					{{ Form::label('xalamat','Alamat') }}
					{{ Form::text('alamatVendor','',array('placeholder' => 'Masukkan Alamat Vendor', 'class' => 'form-control')) }}
					@if ($errors->has('alamatVendor'))
						<span class="help-block">{{ $errors->first('alamatVendor') }}</span>
					@endif
				</div>

			
              </div>
              <div class="box-footer">
                {{ Form::submit('Submit',array('class' => 'btn btn-primary'))}}
                <a href="{{ url("$link") }}" class="btn btn-default">Kembali</a>
              </div>
            {{ Form::close() }}
        </div>
      </div>
    </div>
    <div class="col-md-3">
    	<div class="callout callout-danger">
            <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
                - Harap isikan data dengan sebenar-benarnya <br>
                - Status aktif hanya untuk karyawan yang berhak melakukan approve saat ini <br>
                - ID Vendor berisi 6 angka
        </div>
    </div>
@endsection