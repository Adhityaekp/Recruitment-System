<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Check Camera</title>
    <style>
        #masukButton:disabled {
            background-color: #d6d6d6;
            color: #a3a3a3;
            cursor: not-allowed;
        }
    </style>
</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light">
    <x-header name="Nama Trainee" class="Kelas Trainee" profileImage="/img/user.jpg" />

    <div class="camera-container">
        <div class="camera-preview">
            <video id="cameraStream" autoplay playsinline></video>
            <div class="info-text">Preview Kamera</div>
            <div class="camera-controls">
                <button id="startCamera" class="btn-camera-on" title="Cek Kamera">
                    <i class="bi bi-camera-video-fill"></i>
                    <span>Cek Kamera</span>
                </button>
            </div>
        </div>

        <div class="info-section">
            <h1>Siap untuk memulai test?</h1>
            <button id="masukButton" class="btn btn-masuk w-75 mb-3 py-2 fs-5"
                onclick="window.location.href='/user/subtest1';" disabled>Masuk</button>
            <button class="btn button-back w-50" onclick="window.location.href='/user/start';">Kembali</button>
        </div>
    </div>

    <script>
        const cameraStream = document.getElementById('cameraStream');
        const startCameraButton = document.getElementById('startCamera');
        const masukButton = document.getElementById('masukButton');
        let stream = null;

        async function startCamera() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: true
                });
                cameraStream.srcObject = stream;
                startCameraButton.disabled = true;
                masukButton.disabled = false;
            } catch (error) {
                alert('Kamera tidak dapat diakses. Pastikan izin sudah diberikan.');
                console.error(error);
            }
        }

        startCameraButton.addEventListener('click', startCamera);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
