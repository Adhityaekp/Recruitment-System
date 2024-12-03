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
        /* .radar-chart-container {
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        } */
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

                <div>
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
                            <!-- Rows will be inserted here dynamically -->
                        </tbody>
                    </table>
                </div>

                <!-- Tabel -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Kesimpulan</h2>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#videoModal">Tonton
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
                labels: ['N', 'G', 'A', 'L', 'P', 'I', 'T', 'V', 'O', 'B', 'S', 'X', 'C', 'D', 'R', 'Z', 'E', 'K',
                    'F', 'W'
                ],
                datasets: [{
                    data: [6, 5, 7, 1, 4, 6, 6, 4, 5, 3, 4, 3, 6, 7, 5, 5, 1, 4, 2, 7],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    label: '' // Remove label from dataset
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Allow resizing and maintaining circular shape
                scales: {
                    r: {
                        angleLines: {
                            display: true
                        },
                        suggestedMin: 0,
                        suggestedMax: 10,
                        ticks: {
                            stepSize: 1,
                            display: false // Hides the radial ticks
                        },
                        grid: {
                            circular: true // Make the grid circular
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Hide the legend entirely
                    }
                }
            }
        });

        // Data for the table (this can be expanded with descriptions)
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

        // Function to generate table rows dynamically
        function generateTable() {
            const tableBody = document.getElementById('scoreTableBody');
            const data = radarChart.data.datasets[0].data;
            const labels = radarChart.data.labels;

            // Loop through each item in the chart data and add a row to the table
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

        // Call the function to generate the table once the chart is initialized
        generateTable();

        function generateConclusion() {
            const data = radarChart.data.datasets[0].data; // Data chart
            const labels = radarChart.data.labels; // Labels chart
            let highScores = [];
            let lowScores = [];

            // Iterate over data to categorize high and low scores
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

            // Build conclusion text
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

            // Update the conclusion text in the HTML
            document.getElementById('conclusionText').innerHTML = conclusionText;
        }

        // Call the function to generate conclusion once the chart is initialized
        generateConclusion();
    </script>
</body>

</html>
