Webcam.set({
    width: 500,
    height: 350,
    image_format: 'jpg',
    jpeg_quality: 100
});
Webcam.attach('#camera');

function preview() {
    // ganti display webcam menjadi none dan simpan menjadi terlihat
    document.getElementById('webcam').style.display = 'none';
    document.getElementById('simpan').style.display = '';

    Webcam.snap(function(data_uri, canvas, context) {
        // untuk preview gambar sebelum di upload
        Webcam.freeze();
        var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

        document.getElementById('namafoto').value = raw_image_data;
    });
}

function batal() {
    // batal preview
    Webcam.unfreeze();
    
    // ganti display webcam dan simpan seperti semula
    document.getElementById('namafoto').value = '';
    document.getElementById('webcam').style.display = '';
    document.getElementById('simpan').style.display = 'none';
}