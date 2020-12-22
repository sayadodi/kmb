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
        <div class="box-body">
          <div class="form-group">
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
              <form class="frmbaru" method="post">
                {{ csrf_field() }}
                <div class="col-md-5">
                  <label>Urutan Baru</label>
                  <select multiple class="form-control" id="baru" name="baru[]" style="height: 350px">

                  </select>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <br>
                <button type="button" class="btn btn-primary btn-savesetb">Submit</button>
                <button type="button" class="btn btn-danger btn-savesetba">Darurat</button>
              </div>
            </div>
            <br>
            <p class="sukses text-center alert alert-success hidden"></p>
            </form>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <div class="col-md-6">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Setting Approver Keluar</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <ul class="list-group list-group-unbordered">
            @if (empty($aj1))
              
            @else
            <li class="list-group-item">
              <b>{{$aj1->jabatan}}</b>
            </li>
            @endif
            
            @if (empty($aj2))
              
            @else
            <li class="list-group-item">
              <b>{{$aj2->jabatan}}</b>
            </li>
            @endif

            @if (empty($aj3))
              
            @else
              <li class="list-group-item">
              <b>{{$aj3->jabatan}}</b>
            </li>
            @endif

            @if (empty($aj4))
              
            @else
              <li class="list-group-item">
              <b>{{$aj4->jabatan}}</b>
            </li>
            @endif

            @if (empty($aj5))
              
            @else
              <li class="list-group-item">
              <b>{{$aj5->jabatan}}</b>
            </li>
            @endif

            @if (empty($aj6))
              
            @else
              <li class="list-group-item">
              <b>{{$aj6->jabatan}}</b>
            </li>
            @endif
          </ul>
          @if ($sekarang->status == "Y")
            <span class="label label-success">Sedang Aktif</span>
          @else
            <a href="{{url('alihkana/'.$sekarang->idsettingb)}}" class="btn btn-danger btn-xs">Aktifkan</a>
          @endif
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <div class="col-md-6">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Setting Approver Keluar Darurat</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <ul class="list-group list-group-unbordered">
            @if (empty($aj1a))
              
            @else
            <li class="list-group-item">
              <b>{{$aj1a->jabatan}}</b>
            </li> 
            @endif

            @if (empty($aj2a))
              
            @else
            <li class="list-group-item">
              <b>{{$aj2a->jabatan}}</b>
            </li>
            @endif

            @if (empty($aj3a))
              
            @else
              <li class="list-group-item">
              <b>{{$aj3a->jabatan}}</b>
            </li>
            @endif

            @if (empty($aj4a))
              
            @else
              <li class="list-group-item">
              <b>{{$aj4a->jabatan}}</b>
            </li>
            @endif

            @if (empty($aj5a))
              
            @else
              <li class="list-group-item">
              <b>{{$aj5a->jabatan}}</b>
            </li>
            @endif

            @if (empty($aj6a))
              
            @else
              <li class="list-group-item">
              <b>{{$aj6a->jabatan}}</b>
            </li>
            @endif
          </ul>
          @if ($sekaranga->status == "Y")
            <span class="label label-success">Sedang Aktif</span>
          @else
            <a href="{{url('alihkana/'.$sekaranga->idsettingb)}}" class="btn btn-danger btn-xs">Aktifkan</a>
          @endif
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
</section>
{!! Html::script('plugins/jQuery/jquery-2.2.3.min.js')!!}
{!! Html::script('js/settingb.js')!!}
@endsection