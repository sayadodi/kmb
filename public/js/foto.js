$(document).ready(function(){
    var url_local = window.location.protocol+'//'+window.location.host;
	var urlfoto = url_local+"/kmb/public/foto";

	$(document).on('click', '.aturikut', function (e) {
		document.getElementById('idikut').value = $(this).attr('data-id');
		$('#modal-pengikut').modal('show');
	});

	$(".btn-savefoto").click(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        })

        var formData = {
        	idikut: $(".idikut").val(),
            namafoto: $(".namafoto").val(),
        }
        var urlpa = url_local+"/kmb/public/datapembawapos/"+$(".idkirim").val();
        var urlla = url_local+"/kmb/public/langkah/"+$(".idkirim").val();
        var type = "POST";
        var my_url = urlfoto;

        $.ajax({
            type : type,
            url : my_url,
            data : formData,
            dataType: 'json',
            success: function(data){
            	if ((data.errors)) {
            		$('.error').removeClass('hidden');
            		$('.error').text("Terjadi kesalahan, mohon periksa kevalidan data");
            	}else{
            		$('.dpembawa').load(urlpa); 
                    $('.langkah').load(urlla);
                    $("#modal-pengikut").modal('hide');
                }
            },
            error: function(data){
                
            }
        });
    });

});