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
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Setting Baru</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <form class="frmbaru" method="post">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <div class="row">
              <div class="col-md-12">
                <label>Jenis Pengaturan</label>
                <select name="xjenis" class="form-control">
                  <option value="Masuk">Barang Masuk</option>
                  <option value="Simip">SIMIP</option>
                  <option value="Keluar">Barang Keluar</option>

                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                <label>Daftar Jabatan</label>
                <select multiple class="form-control" id="lama" style="height: 350px">
                  @foreach ($jabatan as $j)
                    <option value="{{$j->idJabatan}}">{{$j->jabatan}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-1">
                <br>
                <button type="button" class="btn btn-default ulang"><<</button>
                <br>
                <br>
                <button type="button" class="btn btn-default pindah">>></button>
              </div>
              
                
                <div class="col-md-5">
                  <label>Urutan Baru</label>
                  <select multiple class="form-control" id="baru" name="baru[]" style="height: 350px">

                  </select>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <br>
                <button type="button" class="btn btn-primary btn-saveset">Submit</button>
                <button type="button" class="btn btn-danger btn-saveseta">Darurat</button>
              </div>
            </div>
            <br>
            <p class="sukses text-center alert alert-success hidden"></p>
          </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

</div>
</section>
{!! Html::script('plugins/jQuery/jquery-2.2.3.min.js')!!}
{!! Html::script('js/setting.js')!!}
@endsection