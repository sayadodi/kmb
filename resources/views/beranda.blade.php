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
      <!-- Profile Image -->
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">Daftar Kiriman</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>

        <div class="box-body">
            Selamat datang diberanda
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    
</div>
</section>
@endsection