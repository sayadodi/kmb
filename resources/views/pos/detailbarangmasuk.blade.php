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
        <i class="fa fa-globe"></i> {{ $kiriman->namavendor }}
        <small class="pull-right">Date: {{ $kiriman->tglbuat }}4</small>
        </h2>
    </div>
    <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
        Dari
        <address>
        <strong>{{ $kiriman->namavendor }}.</strong><br>
        {{ $kiriman->alamat }}<br>
        Phone: {{ $kiriman->telepon }}<br>
        Email: {{ $kiriman->email }}
        </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        Kepada
        <address>
        <strong>Gudang</strong><br>
        PT PJB UBJOM PLTU PAITON<br>
        Phone: (555) 539-1037<br>
        Email: pjb@gmail.com
        </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        <b>{{ $kiriman->nopo }}</b><br>
        <br>
        <b>Order ID:</b> {{ $kiriman->kodekirim }}<br>
        <b>Tangga kirim:</b> {{ $kiriman->tglkirim }}<br>
        <b>Account:</b> {{ $kiriman->keperluan }}
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <input type="hidden" name="idkirim" value="{{$id}}" class="idkirim">
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
        <p class="lead">Langkah-Langkah</p>

        <div class="table-responsive langkah">
        
        </div>
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
    <div class="col-xs-12 tombol">
        
    </div>
    </div>
</section>
@endsection
@section('scripts')
    @parent
    {!! Html::script('js/fungsiloading.js')!!}
    {!! Html::script('js/sweetalert.min.js')!!}
    <script>
      $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        var urlpo = url_local+"/kmb/public/databarangpopos/{{$id}}";
        var urlpa = url_local+"/kmb/public/datapembawapos/{{$id}}";
        var urlke = url_local+"/kmb/public/datakendaraanpos/{{$id}}";
        var urlhi = url_local+"/kmb/public/historiapprove/{{$id}}";
        var urlto = url_local+"/kmb/public/tombol/{{$id}}";
        var urlsi = url_local+"/kmb/public/penentuansimip/{{$id}}";
        var urlla = url_local+"/kmb/public/langkah/{{$id}}";

        var urlhis = url_local+"/kmb/public/historiapprovesimip/{{$id}}";
        var khusus = "{{$kiriman->areakhusus}}";
        if(khusus == 'Y'){
          $('.historiapprovesimip').load(urlhis);
        }

        // Simpan barang
        $('.dbarang').load(urlpo);
        $('.dpembawa').load(urlpa);
        $('.dkendaraan').load(urlke);
        $('.dsimip').load(urlsi);
        $('.historiapprove').load(urlhi);
        $('.tombol').load(urlto);
        $('.langkah').load(urlla);
      });
    </script>
@stop