<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Test Papikostik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .radar-chart-container {
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="d-flex" style="min-height: 100vh;">
        <x-sidebar />

        <div class="flex-grow-1 main-content">
            <x-navbar userName="Admin" />

            <div class="container my-4 table-container">
                <a href="javascript:window.history.back();" class="btn custom-link"><i class="bi bi-arrow-left"><span
                            class="ms-2"></i>Kembali</a>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Detail Test Papikostik</h1>
                    <button class="btn btn-masuk" id="exportButton"><i class="bi bi-download"></i><span
                            class="ms-2">Export</span>
                    </button>
                </div>
                <form class="mb-3">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="namaLengkap">Nama Lengkap</label>
                            <input type="text" id="namaLengkap" class="form-control custom-input"
                                value="Budi Kristanto Utomo" readonly>
                        </div>

                        <div class="col">
                            <label for="noRegistrasi">No. Registrasi</label>
                            <input type="text" id="noRegistrasi" class="form-control custom-input" value="MC0987765"
                                readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="keteranganTes">Keterangan Tes</label>
                            <input type="text" id="keteranganTes" class="form-control custom-input"
                                value="Sudah Mengerjakan" readonly>
                        </div>

                        <!-- Input Waktu -->
                        <div class="col">
                            <label for="waktuTes">Waktu</label>
                            <input type="text" id="waktuTes" class="form-control custom-input" value="00:00:00"
                                readonly>
                        </div>
                    </div>
                </form>

                <div class="radar-chart-container">
                    <canvas id="radarChart"></canvas>
                </div>

                <div class="table-container ms-4 mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody id="scoreTableBody">
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Kesimpulan</h2>
                    <button class="btn button-back" data-bs-toggle="modal" data-bs-target="#videoModal"><i
                            class="bi bi-camera-video"></i><span class="ms-2">Tonton
                            Rekaman</button>
                </div>

                <p id="conclusionText" class="text-muted">
                    Berdasarkan hasil chart, kesimpulan akan ditampilkan di sini.
                </p>
            </div>

            <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
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

            <footer class="footer text-center py-3 d-flex justify-content-between align-items-center">
                <p class="mb-0">&copy; 2024 Your Company. All rights reserved.</p>
                <p class="mb-0">Supported By ILC</p>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('radarChart').getContext('2d');
        const radarChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['N', 'G', 'A', 'L', 'P', 'I', 'T', 'V', 'O', 'B', 'S', 'X', 'C', 'D', 'R', 'Z', 'E', 'K',
                    'F', 'W'
                ],
                datasets: [{
                    data: [6, 5, 7, 1, 4, 6, 6, 4, 5, 3, 4, 3, 6, 7, 5, 5, 1, 4, 2, 7],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    label: ''
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        angleLines: {
                            display: true
                        },
                        suggestedMin: 0,
                        suggestedMax: 10,
                        ticks: {
                            stepSize: 1,
                            display: false
                        },
                        grid: {
                            circular: true
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        const descriptions = {
            'N': 'Penyelesaian Pekerjaan',
            'G': 'Kerja Sama Tim',
            'A': 'Kemampuan Beradaptasi',
            'L': 'Kemampuan Komunikasi',
            'P': 'Kepemimpinan',
            'I': 'Pemecahan Masalah',
            'T': 'Teknikal',
            'V': 'Inovasi',
            'O': 'Manajerial',
            'B': 'Kreativitas',
            'S': 'Analisis Data',
            'X': 'Teknologi Digital',
            'C': 'Komitmen Kerja',
            'D': 'Pengambilan Keputusan',
            'R': 'Perencanaan',
            'Z': 'Manajemen Waktu',
            'E': 'Keterampilan Sosial',
            'K': 'Motivasi',
            'F': 'Pengelolaan Emosi',
            'W': 'Etika Kerja'
        };

        function generateTable() {
            const tableBody = document.getElementById('scoreTableBody');
            const data = radarChart.data.datasets[0].data;
            const labels = radarChart.data.labels;

            for (let i = 0; i < data.length; i++) {
                const row = document.createElement('tr');
                const codeCell = document.createElement('td');
                const descriptionCell = document.createElement('td');
                const scoreCell = document.createElement('td');

                const code = labels[i];
                const description = descriptions[code] || 'Deskripsi tidak tersedia';
                const score = data[i];

                codeCell.textContent = code;
                descriptionCell.textContent = description;
                scoreCell.textContent = score;

                row.appendChild(codeCell);
                row.appendChild(descriptionCell);
                row.appendChild(scoreCell);

                tableBody.appendChild(row);
            }
        }

        generateTable();

        function generateConclusion() {
            const data = radarChart.data.datasets[0].data;
            const labels = radarChart.data.labels;
            let highScores = [];
            let lowScores = [];

            for (let i = 0; i < data.length; i++) {
                const score = data[i];
                const label = labels[i];
                const description = descriptions[label] || 'Deskripsi tidak tersedia';

                if (score >= 6) {
                    highScores.push(`${description} (${score})`);
                } else {
                    lowScores.push(`${description} (${score})`);
                }
            }

            let conclusionText =
                "Berdasarkan hasil chart, dapat disimpulkan bahwa Anda memiliki kekuatan yang lebih baik dalam beberapa aspek seperti: ";
            if (highScores.length > 0) {
                conclusionText += highScores.join(', ') + '. ';
            } else {
                conclusionText += 'Tidak ada aspek yang menonjol. ';
            }

            conclusionText += "Sementara aspek seperti: ";
            if (lowScores.length > 0) {
                conclusionText += lowScores.join(', ') + '. ';
            } else {
                conclusionText += 'Tidak ada aspek yang perlu perbaikan.';
            }

            document.getElementById('conclusionText').innerHTML = conclusionText;
        }

        generateConclusion();
    </script>
</body>

</html>
