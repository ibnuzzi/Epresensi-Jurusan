@extends('layouts.app')
@section('content')
<div id="camera"></div>
<button id="take-picture">Take Picture</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<script>
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#camera');

    document.getElementById('take-picture').addEventListener('click', function() {
        Webcam.snap(function(data_uri) {
            // Kirim data_uri ke server Anda, misalnya dengan AJAX
            console.log(data_uri);
        });
    });
</script>
@endsection
