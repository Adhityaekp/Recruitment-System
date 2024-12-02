<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Test Papikostik</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .radar-chart-container {
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        #question-navigation {
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 0.5rem;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        #question-navigation::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <div class="d-flex" style="min-height: 100vh;">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-grow-1 main-content">
            <x-navbar userName="Admin" />

            <!-- Page Content -->
            <div class="container my-4 table-container">
                <a href="javascript:window.history.back();" class="btn btn-link">Kembali</a>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Detail Test Papikostik</h1>
                    <button onclick="exportToPDF()">Export</button>
                </div>
                <form class="mb-3">
                    <div class="row">
                        <!-- Input Keterangan Tes -->
                        <div class="col">
                            <label for="keteranganTes">Keterangan Tes</label>
                            <input type="text" id="keteranganTes" class="form-control" value="Sudah Mengerjakan"
                                readonly>
                        </div>

                        <!-- Input Waktu -->
                        <div class="col">
                            <label for="waktuTes">Waktu</label>
                            <input type="text" id="waktuTes" class="form-control" value="00:00:00" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Input Keterangan Tes -->
                        <div class="col">
                            <label for="keteranganTes">Keterangan Tes</label>
                            <input type="text" id="keteranganTes" class="form-control" value="Sudah Mengerjakan"
                                readonly>
                        </div>

                        <!-- Input Waktu -->
                        <div class="col">
                            <label for="waktuTes">Waktu</label>
                            <input type="text" id="waktuTes" class="form-control" value="00:00:00" readonly>
                        </div>
                    </div>
                </form>

                <div class="radar-chart-container">
                    <canvas id="radarChart"></canvas>
                </div>

                <!-- Tabel -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Jawaban</h2>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#videoModal">Tonton
                        Rekaman</button>
                </div>
                <div id="question-navigation" class="d-flex justify-content-left mb-3 overflow-auto">
                    <div class="d-flex" style="gap: 0.5rem;">
                        <button class="btn btn-outline-secondary question-btn active" data-question="1">1</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="2">2</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="3">3</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="4">4</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="5">5</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="6">6</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="7">7</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="8">8</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="9">9</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="10">10</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="2">2</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="3">3</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="4">4</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="5">5</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="6">6</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="7">7</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="8">8</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="9">9</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="10">10</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="2">2</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="3">3</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="4">4</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="5">5</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="6">6</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="7">7</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="8">8</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="9">9</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="10">10</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="2">2</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="3">3</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="4">4</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="5">5</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="6">6</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="7">7</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="8">8</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="9">9</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="10">10</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="2">2</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="3">3</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="4">4</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="5">5</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="6">6</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="7">7</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="8">8</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="9">9</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="10">10</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="2">2</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="3">3</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="4">4</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="5">5</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="6">6</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="7">7</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="8">8</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="9">9</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="10">10</button>
                    </div>
                </div>
                <div id="report">
                    <p class="question">Untuk membuat sebuah looping di Golang, maka ada 3 statement penting yaitu</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question" id="option1"
                            value="Boolean, Numeric, String" disabled>
                        <label class="form-check-label" for="option1">
                            Boolean, Numeric, String.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question" id="option2"
                            value="Init, condition, post" disabled checked>
                        <label class="form-check-label" for="option2">
                            Init, condition, post.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question" id="option3"
                            value="Init, looping, post" disabled>
                        <label class="form-check-label" for="option3">
                            Init, looping, post.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question" id="option4"
                            value="Truthy, falsy, init" disabled>
                        <label class="form-check-label" for="option4">
                            Truthy, falsy, init.
                        </label>
                    </div>
                    <div id="result" class="mt-3">
                        <p class="text-success">Jawaban Anda benar</p>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel">Rekaman Video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <video controls width="100%">
                                <source src="your-video-file.mp4" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer text-center py-3 d-flex justify-content-between align-items-center">
                <p class="mb-0">&copy; 2024 Your Company. All rights reserved.</p>
                <p class="mb-0">Supported By ILC</p>
            </footer>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('radarChart').getContext('2d');
        const radarChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Leadership', 'Teamwork', 'Problem Solving', 'Adaptability', 'Communication'],
                datasets: [{
                    label: 'Papikostik Results',
                    data: [75, 85, 70, 90, 80],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    r: {
                        angleLines: {
                            display: true
                        },
                        suggestedMin: 0,
                        suggestedMax: 100
                    }
                }
            }
        });
        document.querySelectorAll('.question-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                document.querySelectorAll('.question-btn').forEach(b => b.classList.remove('active'));
                e.target.classList.add('active');
                // Logic for showing the corresponding question can be added here.
            });
        });
    </script>
</body>

</html>
