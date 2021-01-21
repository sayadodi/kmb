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
              <li><a href="#tbarang" data-toggle="tab">Barang</a></li>
              <li><a href="#tpembawa" data-toggle="tab">Pembawa barang</a></li>
              <li><a href="#tkendaraan" data-toggle="tab">Kendaraan</a></li>
    
            </ul>
            <div class="tab-content">
              {{-- Barang --}}
              <div class="active tab-pane dbarang" id="tbarang">
                
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
    <div class="col-xs-8 historiapprove">
        
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
        <p class="lead">Keterangan lain</p>

        <div class="table-responsive">
        <table class="table">
            <tr>
            <th style="width:50%">Berkas jalan:</th>
            <td>{{$kiriman->berkas}}</td>
            </tr>
            <tr>
            <th>Jumlah barang</th>
            <td>{{$jmlbarang}}</td>
            </tr>
            <tr>
            <th>Jumlah pembawa:</th>
            <td>{{$jmlbawa}}</td>
            </tr>
            <tr>
            <th>Jumlah tools:</th>
            <td>{{$jmltools}}</td>
            </tr>
        </table>
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


        // Simpan barang
        $('.dbarang').load(urlpo);
        $('.dpembawa').load(urlpa);
        $('.dkendaraan').load(urlke);
        $('.historiapprove').load(urlhi);
        $('.tombol').load(urlto);
      });
    </script>

<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urlkirim = url_local+"/kmb/public/barangmasukterima";

        $(".konfirmasikiriman").click(function(){
            swal({
            title: "Anda yakin ?",
            text: "Sebelum konfirmasi pastikan kelengkapan data, aksi ini tidak bisa dibatalkan!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                })

                var formData = {
                    idkirim: $('.idkirim').val(),
                }
                var type = "POST";
                var my_url = urlkirim;

                $.ajax({
                    type : type,
                    url : my_url,
                    data : formData,
                    dataType: 'json',
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