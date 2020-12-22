@extends('index')
@section('konten')
<section class="content">
<div class="row">
  <div class="col-md-12">
    @include('include.flash_message')
  </div>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Form Ubah Password</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form role="form" action="{{url('ubahpassv')}}" method="post">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>Password baru</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" name="simpanpass" class="btn btn-primary btn-jab" value="Submit">
                <input type="button" class="btn btn-danger reset" value="Reset">
              </div>
            </form>
        </div>
      </div>
    </div>
</div>
</section>
@endsection