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
        .question-container {
            margin-top: 80px;
            width: 100%;
            height: calc(100vh - 80px);
            padding: 50px;
        }

        .question-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .left-header {
            text-align: left;
        }

        .title-question {
            font-size: 36px;
        }

        .title-time {
            font-size: 20px;
            margin-bottom: 0;
        }

        .right-header {
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .title-timer {
            font-size: 20px;
            background-color: #7C0000;
            padding: 0 10px;
            border-radius: 8px;
            color: #FAFAFA;
            margin-bottom: 0;
        }

        .timer-display {
            font-size: 32px;
            margin-bottom: 0;
        }

        .webcam-video {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 324px;
            height: 159px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 10;
        }

        .progress-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .progress {
            flex-grow: 1;
            height: 15px;
            border-radius: 10px;
        }

        .progress-bar {
            height: 100%;
        }

        .progress-percent {
            font-size: 20px;
            color: #000;
            margin-left: 33px;
        }

        form {
            font-size: 24px;
        }

        .question-options {
            list-style-type: none;
            padding: 0;
        }

        .question-options li {
            margin-bottom: 10px;
        }

        .nav-buttons {
            position: fixed;
            bottom: 20px;
            left: 0;
            right: 0;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            z-index: 100;
        }

        .btn-back,
        .btn-next {
            padding: 10px 20px;
            font-size: 24px;
            border-radius: 10px;
        }

        .btn-next {
            background-color: #C18134;
            color: #fff;
            border: none;
        }

        .btn-back {
            background-color: #b0b0b096;
            color: #000;
            border: none;
        }
    </style>
</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light">
    <x-header name="Nama Trainee" class="Kelas Trainee" profileImage="/path/to/image.jpg" />


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
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question" id="option1">
                <label class="form-check-label" for="option1">
                    Boolean, Numeric, String.
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question" id="option2">
                <label class="form-check-label" for="option2">
                    Init, condition, post.
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question" id="option3">
                <label class="form-check-label" for="option3">
                    Init, looping, post.
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question" id="option4">
                <label class="form-check-label" for="option4">
                    Truthy, falsy, init.
                </label>
            </div>
        </form>

        <div class="nav-buttons">
            <button class="btn btn-light btn-back"><i class="bi bi-chevron-left"></i> Sebelumnya</button>
            <button class="btn btn-warning btn-next" onclick="window.location.href='/user/soal2'">
                Selanjutnya <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        function startTimer(duration, display) {
            let timer = duration,
                hours, minutes, seconds;
            setInterval(function() {
                hours = parseInt(timer / 3600, 10); // Jam
                minutes = parseInt((timer % 3600) / 60, 10); // Menit
                seconds = parseInt(timer % 60, 10); // Detik

                display.textContent =
                    (hours < 10 ? "0" : "") + hours + ":" +
                    (minutes < 10 ? "0" : "") + minutes + ":" +
                    (seconds < 10 ? "0" : "") + seconds;

                if (--timer < 0) {
                    timer = 0; // Timer berhenti di 0
                }
            }, 1000);
        }

        window.onload = function() {
            let oneHour = 60 * 60, // 1 jam dalam detik
                display = document.querySelector('#timer'); // Menentukan elemen untuk timer
            startTimer(oneHour, display); // Memulai timer saat halaman dimuat
        };

        // Menangani akses ke kamera
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
