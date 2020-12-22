@extends('index')
@section('konten')
<section class="content">
<div class="row">
  <div class="col-md-12">
    @include('include.flash_message')
  </div>
</div>
<div class="row">
    <div class="col-md-5">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Jabatan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <ul class="list-group list-group-unbordered">
            @foreach ($data as $d)
            <li class="list-group-item">
              <b>{{$d->jabatan}}</b> <a onclick="return confirm('Apakah anda yakin akan menghapus data ini ?');" href="{{url('daftarjabatan/hapus/'.$d->idJabatan)}}" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash-o"></i></a> <a class="pull-right">&nbsp;</a> <a data-id="{{$d->idJabatan}}" data-jab="{{$d->jabatan}}" class="btn btn-warning btn-xs pull-right editJab"><i class="fa fa-pencil"></i></a>
            </li>
            @endforeach
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    
    <div class="col-md-7">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Form Jabatan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form role="form" action="{{url('daftarjabatan/simpan')}}" method="post">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control jabatan" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan">
                  <input type="hidden" name="idJab" id="idJab" class="idJab">
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" name="simpanjabatan" class="btn btn-primary btn-jab" value="Submit">
                <input type="button" class="btn btn-danger reset" value="Reset">
              </div>
            </form>
        </div>
      </div>
    </div>
</div>
</section>
{!! Html::script('plugins/jQuery/jquery-2.2.3.min.js')!!}
<script type="text/javascript">
  $(document).on('click', '.editJab', function (e) {
    var id = $(this).attr('data-id');
    var jab = $(this).attr('data-jab');
    $('.jabatan').val(jab);
    $('.idJab').val(id);
    $('.btn-jab').val("Edit");
  });

  $(document).on('click', '.reset', function(e){
    $('.btn-jab').val("Submit");
    $('.jabatan').val("");
    $('.idJab').val("");
  });
</script>
@endsection