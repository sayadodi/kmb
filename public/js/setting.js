$(document).ready(function(){
    var url_local = window.location.protocol+'//'+window.location.host;
	var urlb = url_local+"/kmbarang2/public/daftarpengaturanapprover/tambah";

	$(document).on('click', '.pindah', function (e) {
		var teks = $("#lama option:selected").text();
		var val = $("#lama option:selected").val();
		
		$("#baru").append($("<option></option>").attr("value",val).text(teks));
	});

	$(document).on('click', '.ulang', function (e) {
		$("#baru option:selected").remove();
	});

	$(".btn-saveset").click(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        })

        selectBox = document.getElementById("baru");

        for (var i = 0; i < selectBox.options.length; i++) {
        	selectBox.options[i].selected = true;
        }

        var formData = new FormData($('.frmbaru')[0]);

        var type = "POST";
        var my_url = urlb;
        
        $.ajax({
            type : type,
            url : my_url,
            data : formData,
            dataType: 'json',
            processData: false,
            cache: false,
            contentType: false,
            beforeSend: function(){
                $('.btn-saveset').prop('disabled', true);
                $('.btn-saveset').addClass('disabled');
                $('.btn-saveset').removeClass('btn-primary');
                $('.btn-saveset').addClass('btn-success');
                $('.btn-saveset').val("Menyimpan...");
            },
            success: function(data){
            	$('.sukses').removeClass('hidden');
        		$('.sukses').text("Data berhasil tersimpan").delay(1000).slideUp(300);
        		$('.btn-saveset').prop('disabled', false);
                $('.btn-saveset').removeClass('disabled');
                $('.btn-saveset').removeClass('btn-success');
                $('.btn-saveset').addClass('btn-primary');
                $('.btn-saveset').val("Submit");
                //setInterval('window.location.reload()', 1000);
                console.log(data);
            },
            error: function(data){
                console.log(data);
            }
        });
    });

});
