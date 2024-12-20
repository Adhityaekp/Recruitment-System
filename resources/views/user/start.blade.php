<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light">

    <div class="position-absolute top-0 start-0 m-3">
        <img src="/img/logologin.png" alt="Logo" width="100%">
    </div>

    <div class="text-center">
        <h3 class="mb-2">Halo, Budi!</h3>
        <h1 class="mb-4" style="font-size: 48px;">Selamat Datang di Psikotes-ILC</h1>
        <div style="max-width: 650px;">
            <p class="mb-2" style="text-align: center; font-size: 24px; font-weight: 500; color:rgba(0, 0, 0, 0.5)">
                Sebelum memulai, mari kita berikan sedikit informasi mengenai psikotest ini.</p>
            <p class="mb-4" style="color:rgba(0, 0, 0, 0.5)">Psikotest ini dirancang khusus untuk mengukur beberapa
                aspek kepribadian dan keterampilan kognitif Anda, yang akan menjadi bagian dari syarat kelulusan dalam
                seleksi Mechanical Class. Hasil dari psikotest ini akan membantu kami memastikan kesiapan Anda untuk
                mengikuti pelatihan dan memaksimalkan potensi yang dimiliki.</p>
            <button type="button" class="btn btn-masuk px-5 py-2" data-bs-toggle="modal" style="margin-top: 20px"
                data-bs-target="#termsModal">Mulai</button>
        </div>

        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termsModalLabel">Ketentuan Tes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: left;">
                        <p>Harap membaca ketentuan tes berikut:</p>
                        <ul>
                            <li>Pastikan koneksi internet Anda stabil selama pelaksanaan tes.</li>
                            <li>Peserta wajib menggunakan perangkat dengan kamera aktif. Kamera harus tetap menyala
                                selama tes berlangsung.</li>
                            <li>Pastikan lingkungan Anda tenang dan bebas gangguan agar dapat berkonsentrasi dengan
                                baik.</li>
                            <li>Tidak diperbolehkan membuka tab baru, aplikasi lain, atau menggunakan perangkat tambahan
                                selama tes berlangsung.</li>
                            <li>Tes ini bersifat individual. Bantuan dari pihak lain dilarang keras.</li>
                            <li>Periksa kembali jadwal tes Anda. Peserta yang terlambat tidak diperkenankan mengikuti
                                tes.</li>
                        </ul>
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="acceptTerms"
                                onchange="toggleCameraButton()">
                            <label class="form-check-label" for="acceptTerms">
                                Saya telah membaca dan menyetujui ketentuan di atas.
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="backButton" type="button" class="btn button-back" data-bs-dismiss="modal"
                            aria-label="Close">Kembali</button>
                        <button id="cameraButton" type="button" class="btn btn-masuk" onclick="goToCameraPage()"
                            disabled>Cek
                            Kamera</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function goToCameraPage() {
            window.location.href = '/user/checkcam';
        }

        function toggleCameraButton() {
            const checkbox = document.getElementById('acceptTerms');
            const cameraButton = document.getElementById('cameraButton');
            cameraButton.disabled = !checkbox.checked;
        }
    </script>
</body>

</html>
