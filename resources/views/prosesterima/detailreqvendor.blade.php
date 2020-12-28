@extends('index')
@section('konten')
	<div class="col-md-12">
    	<div class="callout callout-danger">
            <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
                - Harap pastikan data sesuai dengan yang terdaftar pada unit <br>
				- Silahkan terima jika data ada dan berikan saran<br>
				- Tolak jika data vendor tidak sesuai
        </div>
    </div>
	<div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Vendor</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
		<form action="{{url('requestvendor/'.$vendor->kdvendor)}}" method="post">
			<div class="box-body">
			{{ csrf_field() }}
				<input type="hidden" name="kdvendor" value="{{$vendor->kdvendor}}">
				<div class="form-group has-success">					
					<label>Nama Vendor</label>
					<input type="text" name="namavendor" class="form-control" readonly value="{{$vendor->namavendor}}">
				</div>

				<div class="form-group has-success">					
					<label>No. Telepon</label>
					<input type="text" name="telepon" class="form-control" readonly value="{{$vendor->telepon}}">
				</div>

				<div class="form-group has-success">					
					<label>Email</label>
					<input type="text" name="email" class="form-control" readonly value="{{$vendor->email}}">
				</div>	

				<div class="form-group has-success">					
					<label>Alamat</label>
					<textarea name="alamat" rows="3" class="form-control" readonly>{{$vendor->alamat}}</textarea>
				</div>
				
				<div class="form-group">					
					<label>Status</label>
					<select name="status" class="form-control" required>
						<option>Pilih Status</option>
						<option value="Aktif">Terima</option>
						<option value="Ditolak">Tolak</option>
					</select>
				</div>

				<div class="form-group">					
					<label>Alasan</label>
					<textarea name="alasan" rows="5" class="form-control" placeholder="Contoh ditolak: Maaf nomor telepon anda salah , contoh diterima: Lanjutkan pengiriman"></textarea>
				</div>

				<div class="box-footer">
					<input type="submit" value="Kirim" class="btn btn-flat btn-primary">
					<a href="{{url('requestvendor')}}" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
      </div>
    </div>
    
@endsection