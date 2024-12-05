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


    <div class="question-container mt-4">
        <div class="question-header d-flex justify-content-between align-items-center mb-4">
            <div class="left-header">
                <h4 class="title-question">Psikotest - IQ Test</h4>
                <p class="title-time text-muted">Rabu, 10 November 2024</p>
            </div>
            <div class="right-header">
                <p class="title-timer">Waktu Tersisa</p>
                <p id="timer" class="timer-display">00:00:00</p>
            </div>
        </div>

        <div class="progress-container my-3">
            <div class="progress">
                <div class="progress-bar bg-danger" style="width: 10%;"></div>
            </div>
            <span class="progress-percent">10%</span>
        </div>

        <video id="webcam" autoplay muted playsinline class="webcam-video"></video>

        <form>
            <p class="question">Untuk membuat sebuah looping di Golang, maka ada 3 statement penting yaitu</p>
            <div class="form-group">
                <textarea class="form-control input-answer" placeholder="Ketikan jawaban anda disini..."></textarea>
            </div>
        </form>

        <div class="nav-buttons">
            <button class="btn btn-back" onclick="window.location.href='/user/soal'"><i class="bi bi-chevron-left"></i>
                Sebelumnya</button>
            <button class="btn btn-next" id="btnFinish">
                Selesai <i class="bi bi-cursor-fill"></i>
            </button>
        </div>

        <div class="nav-buttons">
            <button class="btn btn-back"><i class="bi bi-chevron-left"></i> Sebelumnya</button>
            <button class="btn btn-next" onclick="window.location.href='/user/subtest3'">
                Selanjutnya <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="/js/soal.js"></script>

</body>

</html>
