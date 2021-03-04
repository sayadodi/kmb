@if($kiriman->statuskiriman == "Diterima Gudang")
    <button type="button" class="btn btn-success pull-right konfirmasikiriman"><i class="fa fa-credit-card"></i> Terima</button>
@elseif($kiriman->statuskiriman == "Diterima Pos")
    <span class="label label-success pull-right"><i class="fa fa-clock-o"></i> Menunggu Approver</span>
@endif
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urlkirim = url_local+"/kmb/public/barangmasukterima/{{$id}}";

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

                var formData = new FormData($('#formsimip')[0]);
                var type = "POST";
                var my_url = urlkirim;

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