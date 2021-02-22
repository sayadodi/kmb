@extends('index')
@section('konten')
<style type="text/css">
.no-border {
    border: 0;
    box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
}
</style>
<section class="content">
<div class="row">
	<div class="col-md-12">
		@include('include.flash_message')
	</div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="callout callout-danger">
          <h4><i class="icon fa fa-ban"></i> Proses Pengeluaran Barang</h4>
              - Pilih barang yang akan dikeluarkan <br>
              - Atur Orang yang akan mengeluarkan<br>
              - Atur dokumen dan data tambahan
    </div>    
  </div>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tbarang" data-toggle="tab">Barang</a></li>
          <li><a href="#tpembawa" data-toggle="tab">Pembawa barang</a></li>
          <li><a href="#ttujuan" data-toggle="tab">Kendaraan</a></li>
          <div class="text-right" style="padding: 5px">
            <input type="button" value="Simpan" class="btn btn-danger btn-sm btn-simpan">
          </div>
        </ul>
        <div class="tab-content">
          {{-- Barang --}}
          <div class="active tab-pane dbarang" id="tbarang">
            
          </div>

          {{-- Pembawa barang --}}
          <div class="tab-pane dpembawa" id="tpembawa">
            
          </div>

          {{-- Tujuan dan kendaraan --}}
          <div class="tab-pane" id="ttujuan">
              <div class="dkendaraan">

              </div>
          </div>
        </div>
      </div>
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
        var urlb = url_local+"/kmb/public/daftarkeluar/daftarbarang/{{ $id }}";
        var urlp = url_local+"/kmb/public/daftarkeluar/daftarpembawa/{{ $id }}";
        var urlk = url_local+"/kmb/public/daftarkeluar/daftarkendaraan/{{ $id }}";
        var urlsp = url_local+"/kmb/public/daftarkeluar/simpan/{{ $id }}";

        $(".dbarang").load(urlb);
        $(".dpembawa").load(urlp);
        $(".dkendaraan").load(urlk);

        $(".btn-simpan").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var myCheckboxes = new Array();
            $("input:checked").each(function() {
              myCheckboxes.push($(this).val());
            });
            var type = "POST";
            var my_url = urlsp;
            console.log(myCheckboxes);
            $.ajax({
                type : type,
                url : my_url,
                data : 'kdbrg='+myCheckboxes,
                dataType: 'json',
                beforeSend: function(){
                    
                },
                success: function(data){
                    console.log(data); 
                },
                error: function(data){
                    
                }
            });
        });
      });
    </script>
@stop