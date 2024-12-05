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
                <h4 class="title-question">Psikotest - Sub Bab 1</h4>
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
            <p class="question">
                <img src="/img/soal.png" alt="Soal Gambar" style="width: 100%; max-width: 400px;">
            </p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question" id="option1">
                <label class="form-check-label" for="option1">
                    <img src="/img/A.png" alt="Jawaban 1" style="width: 100%; max-width: 200px;">
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question" id="option2">
                <label class="form-check-label" for="option2">
                    <img src="/img/B.png" alt="Jawaban 2" style="width: 100%; max-width: 200px;">
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question" id="option3">
                <label class="form-check-label" for="option3">
                    <img src="/img/C.png" alt="Jawaban 3" style="width: 100%; max-width: 200px;">
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question" id="option4">
                <label class="form-check-label" for="option4">
                    <img src="/img/D.png" alt="Jawaban 4" style="width: 100%; max-width: 200px;">
                </label>
            </div>
        </form>

        <div class="nav-buttons">
            <button class="btn btn-back"><i class="bi bi-chevron-left"></i> Sebelumnya</button>
            <button class="btn btn-next" onclick="window.location.href='/user/subtest4'">
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
