@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #camera {
            transform: scaleX(-1);
        }

        #map {
            height: 200px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div id="error-message" style="display: none;"></div>
        <input type="hidden" name="location" id="lokasi">
        <input type="hidden" name="status" id="status" value="present">
        <div id="camera"></div>
        <button id="take-picture" class="btn btn-primary d-flex col-12 justify-content-center"><svg
                xmlns="http://www.w3.org/2000/svg" class="me-2" width="32" height="32" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M4 4h3l2-2h6l2 2h3a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2m8 3a5 5 0 0 0-5 5a5 5 0 0 0 5 5a5 5 0 0 0 5-5a5 5 0 0 0-5-5m0 2a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3" />
            </svg> Absen</button>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div id="map"></div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script>
        Webcam.set({
            width: 350,
            height: 300,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#camera');

        document.getElementById('take-picture').addEventListener('click', function() {
            Webcam.snap(function(data_uri) {
                photo = data_uri;
            });
            var location = $('#lokasi').val();
            var status = $('#status').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('attendance.store') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    photo: photo,
                    location: location,
                    status: status
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        icon: 'success',
                        text: response.meta.message
                    })
                },
                error: function(response) {
                    var response = response.responseJSON
                    var status = response.meta.code
                    if (status == 400) {
                        Swal.fire({
                            title: 'Error!',
                            icon: 'error',
                            text: response.meta.message
                        });
                    }
                }
            });
        });




        var lokasi = document.getElementById('lokasi');

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        } else {
            console.error("Tidak Support.");
        }

        function successCallback(position) {
            lokasi.value = position.coords.latitude + "," + position.coords.longitude;
            console.log(lokasi.value);
            var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 17);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
            var circle = L.circle([-7.8915843,112.6079343], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 10
            }).addTo(map);
        }

        function errorCallback(error) {
            console.error("Error getting geolocation:", error);
        }
    </script>
@endsection
