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
    <title>Psikotest - IQ Test</title>
    <style>
    </style>
</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light">
    <x-header name="Nama Trainee" class="Kelas Trainee" profileImage="/img/user.jpg" />
    <video id="webcam" autoplay muted playsinline class="webcam-video"></video>


    <div class="mt-4">
        <div class="text-center">
            <h1 class="mb-4" style="font-size: 48px;">Ketentuan Sub Test 1</h1>
            <div style="max-width: 1000px;">
                <p class="mb-4"
                    style="text-align: center; font-size: 24px; font-weight: 500; color:rgba(0, 0, 0, 0.5)">
                    Sebelum memulai, harap baca ketentuan berikut terkait pelaksanaan Sub Test 1.</p>
                <p class="mb-4" style="text-align: left; color: rgba(0, 0, 0, 0.6); font-size: 20px;">
                    <span
                        style="display: block; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(0, 0, 0, 0.1);">
                        1. Pastikan Anda berada di tempat yang tenang dan tidak terganggu selama mengerjakan tes ini.
                    </span>
                    <span
                        style="display: block; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(0, 0, 0, 0.1);">
                        2. Tes ini harus dikerjakan secara mandiri tanpa alat bantu.
                    </span>
                    <span
                        style="display: block; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(0, 0, 0, 0.1);">
                        3. Soal pada sub tes ini mengukur kemampuan dasar Anda dalam memahami pola logika dan relasi
                        antar elemen.
                    </span>
                    <span
                        style="display: block; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(0, 0, 0, 0.1);">
                        4. Anda tidak diperkenankan menghentikan atau mengulang tes setelah memulai.
                    </span>
                    <span
                        style="display: block; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(0, 0, 0, 0.1);">
                        5. Dengan melanjutkan tes ini, Anda menyetujui semua syarat dan ketentuan yang berlaku.
                    </span>
                </p>
                <button type="button" class="btn btn-masuk px-5 py-2" data-bs-toggle="modal" style="margin-top: 20px"
                    onclick="window.location.href='/user/soal'">Setuju dan Mulai</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(function(stream) {
                const videoElement = document.getElementById('webcam');
                videoElement.srcObject = stream;
            })
            .catch(function(error) {
                console.error('Error accessing webcam: ', error);
            });
    </script>

</body>

</html>
