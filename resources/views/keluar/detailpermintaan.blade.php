@extends('index')
@section('konten')
<div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        Cek kelengkapan data sebelum menerima kiriman dari vendor.
      </div>
    </div>
<section class="invoice">
    <!-- title row -->
    <div class="row">
    <div class="col-xs-12">
        <h2 class="page-header">
        <i class="fa fa-globe"></i> Pengeluaran Barang
        <small class="pull-right">Date: {{date("d-m-Y")}}</small>
        </h2>
    </div>
    <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    <div class="col-sm-6 invoice-col">
        Dari
        <address>
        <strong>{{$data->namavendor}}</strong><br>
        {{$data->alamat}}<br>
        Phone: {{$data->telepon}}<br>
        Email: {{$data->email}}
        </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-6 invoice-col">
        Kepada
        <address>
        <strong>Gudang</strong><br>
        PT PJB UBJOM PLTU PAITON<br>
        Phone: (555) 539-1037<br>
        Email: pjb@gmail.com
        </address>
    </div>
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <input type="hidden" name="idkeluar" value="{{$id}}" class="idkeluar">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tsimip" data-toggle="tab">Simip</a></li>
              <li><a href="#tbarang" data-toggle="tab">Barang</a></li>
              <li><a href="#tpembawa" data-toggle="tab">Pembawa barang</a></li>
              <li><a href="#tkendaraan" data-toggle="tab">Kendaraan</a></li>
    
            </ul>
            <div class="tab-content">
              {{-- Penentuan simip --}}
              <div class="active tab-pane dsimip" id="tsimip">
                
              </div>
              {{-- Barang --}}
              <div class="tab-pane dbarang" id="tbarang">
                
              </div>
    
              {{-- Pembawa barang --}}
              <div class="tab-pane dpembawa" id="tpembawa">
                
              </div>
    
              {{-- Tujuan dan kendaraan --}}
              <div class="tab-pane dkendaraan" id="tkendaraan">
                
              </div>
            </div>
          </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-4 historiapprove">
        
    </div>
    <div class="col-xs-4 historiapprovesimip">
        
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
        
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
    <div class="col-xs-12 tombol">
        <button type="button" class="btn btn-primary btn-setujui">Setujui</button>
    </div>
    </div>
</section>
@endsection
@section('scripts')
@parent
    {!! Html::script('plugins/select2/dist/js/select2.full.min.js')!!}
    {!! Html::script('js/fungsiloading.js')!!}
    {!! Html::script('js/sweetalert.min.js')!!}
    <script>
      $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        var urlb = url_local+"/kmb/public/mintakeluar/daftarbarang/{{ $id }}";
        var urlp = url_local+"/kmb/public/mintakeluar/daftarpembawa/{{ $id }}";
        var urlk = url_local+"/kmb/public/mintakeluar/daftarkendaraan/{{ $id }}";
        var urls = url_local+"/kmb/public/mintakeluar/simip/{{ $id }}";
        var urlsp = url_local+"/kmb/public/mintakeluar/simpan/{{ $id }}";
        $(".dsimip").load(urls);
        $(".dbarang").load(urlb);
        $(".dpembawa").load(urlp);
        $(".dkendaraan").load(urlk);

        $(".btn-setujui").click(function(){
            swal({
            title: "Anda yakin ?",
            text: "Sebelum konfirmasi pastikan kelengkapan data, aksi ini tidak bisa dibatalkan!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                var urlkirim = url_local+"/kmb/public/mintakeluar/simpan/{{$id}}";
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                })

                var formData = new FormData($('#formsimip')[0]);
                var type = "POST";
                var my_url = urlkirim;
                console.log(formData);
                $.ajax({
                    type : type,
                    url : my_url,
                    data : formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function(){
                        
                    },
                    success: function(data){
                        window.location.reload();  
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            } else {
                swal("Pengiriman dibatalkan!");
            }
            });
        });
      });
    </script>
@stop