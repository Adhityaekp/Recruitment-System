<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Test TKD V</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .value {
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 0.5rem;
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

        .question-btn {
            background-color: transparent;
            color: #000;
            border: 2px solid transparent;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .question-btn:hover {
            background-color: #801114;
            color: #fafafa;
            cursor: pointer;
        }

        .question-btn.active {
            background-color: #801114;
            color: #fafafa;
            border: 2px solid #801114;
        }

        .separator {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 1rem;
            margin-top: 1rem;
            border-radius: 0.25rem;
            color: #fafafa;
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
                    <h1>Detail Test TKD V</h1>
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

                <div class="row text-center" style="margin: 10px 0;">
                    <div class="col"
                        style="border: 2px solid #ddd; padding: 10px; margin: 5px; border-radius: 10px;">
                        <label>Jumlah Soal</label>
                        <div class="value">10</div>
                    </div>
                    <div class="col"
                        style="border: 2px solid #ddd; padding: 10px; margin: 5px; border-radius: 10px;">
                        <label>Benar</label>
                        <div class="value">8</div>
                    </div>
                    <div class="col"
                        style="border: 2px solid #ddd; padding: 10px; margin: 5px; border-radius: 10px;">
                        <label>Salah</label>
                        <div class="value">1</div>
                    </div>
                    <div class="col" style="border: 2px solid #ddd; padding: 10px; margin: 5px; border-radius: 10px">
                        <label>Tidak Diisi</label>
                        <div class="value">1</div>
                    </div>
                    <div class="col"
                        style="background-color:#801114; color:#fafafa; padding: 10px; margin: 5px; border-radius: 10px">
                        <label>Nilai</label>
                        <div class="value">80</div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Jawaban</h2>
                    <button class="btn button-back" data-bs-toggle="modal" data-bs-target="#videoModal"><i
                            class="bi bi-camera-video"></i><span class="ms-2">Tonton
                            Rekaman</button>
                </div>
                <div id="question-navigation" class="d-flex justify-content-left mb-3 overflow-auto">
                    <div class="d-flex" style="gap: 0.5rem;">
                        <button class="btn btn-outline-secondary question-btn active" data-question="1">1</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="2">2</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="3">3</button>
                        <button class="btn btn-outline-secondary question-btn" data-question="4">4</button>
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
                    <hr class="divider">
                    <div class="separator" style="background-color: #801114;">
                        <p class="text-white m-0"> <i class="bi bi-x"></i>
                            Jawaban Anda Salah</p>
                    </div>

                    <div class="separator" style="background-color: #C18134;">
                        <p class="text-white m-0"> <i class="bi bi-check2"></i>
                            Jawaban Anda Benar</p>
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
                            <iframe width="100%" height="315"
                                src="https://www.youtube.com/embed/linlz7-Pnvw?si=Jz-3OSLnR1zlhY4Z"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                            </iframe>
                        </div>

                        {{-- <div class="modal-body">
                            <video controls width="100%">
                                <source src="your-video-file.mp4" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                        </div> --}}
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
    <script>
        document.querySelectorAll('.question-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                document.querySelectorAll('.question-btn').forEach(b => b.classList.remove('active'));
                e.target.classList.add('active');
            });
        });
    </script>
</body>

</html>
