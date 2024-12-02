<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Test</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>

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
                    <h1>Detail Trainee</h1>
                    <button id="exportButton">Export</button>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="noRegistrasi" class="form-label">No Registrasi</label>
                        <div class="input-group">
                            <input type="text" id="noRegistrasi" class="form-control" value="123456" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <input type="text" id="namaLengkap" class="form-control" value="John Doe" readonly>
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="toggleEdit('namaLengkap', this)">Edit</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <div class="input-group">
                            <input type="date" id="tanggalLahir" class="form-control" value="2000-01-01" readonly>
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="toggleEdit('tanggalLahir', this)">Edit</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="asalSekolah" class="form-label">Asal Sekolah</label>
                        <div class="input-group">
                            <input type="text" id="asalSekolah" class="form-control" value="SMK Negeri 1" readonly>
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="toggleEdit('asalSekolah', this)">Edit</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <div class="input-group">
                            <select id="kelas" class="form-select" disabled>
                                <option value="Mechanical" selected>Mechanical</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="toggleEdit('kelas', this)">Edit</button>
                        </div>
                    </div>
                </form>

                <!-- Tabel -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Summary Test</h2>
                    <button class="btn btn-warning" onclick="resetTest()">Mulai Ulang</button>
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
                </form>

                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th>Jenis Test</th>
                            <th>Jumlah Soal</th>
                            <th>Benar</th>
                            <th>Salah</th>
                            <th>Tak Diisi</th>
                            <th>Nilai</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>TKD V</td>
                            <td>100</td>
                            <td id="benar-tkdv">85</td>
                            <td id="salah-tkdv">10</td>
                            <td id="takdiisi-tkdv">5</td>
                            <td id="nilai-tkdv">85</td>
                            <td><a href="/admin/detailtesttkdv" class="btn btn-primary btn-sm">Detail</a></td>
                        </tr>
                        <tr>
                            <td>IQ Test</td>
                            <td>50</td>
                            <td id="benar-iqtest">40</td>
                            <td id="salah-iqtest">5</td>
                            <td id="takdiisi-iqtest">5</td>
                            <td id="nilai-iqtest">80</td>
                            <td><a href="/admin/detailtest/iqtest" class="btn btn-primary btn-sm">Detail</a></td>
                        </tr>
                        <tr>
                            <td>Papikostik</td>
                            <td>60</td>
                            <td id="benar-papikostik">50</td>
                            <td id="salah-papikostik">8</td>
                            <td id="takdiisi-papikostik">2</td>
                            <td id="nilai-papikostik">83</td>
                            <td><a href="/admin/detailtestpapikostik" class="btn btn-primary btn-sm">Detail</a></td>
                        </tr>
                        <tr>
                            <td>LoC</td>
                            <td>40</td>
                            <td id="benar-loc">35</td>
                            <td id="salah-loc">4</td>
                            <td id="takdiisi-loc">1</td>
                            <td id="nilai-loc">88</td>
                            <td><a href="/admin/detailtest/loc" class="btn btn-primary btn-sm">Detail</a></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-danger btn-lg w-100 mt-3" onclick="hapusTrainee()">Hapus Trainee</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    <script>
        function toggleEdit(inputId, button) {
            const inputElement = document.getElementById(inputId);

            if (button.innerText === "Edit") {
                // Mode Edit
                inputElement.removeAttribute('readonly');
                inputElement.disabled = false;
                inputElement.focus(); // Fokus pada input
                button.innerText = "Simpan";

                // Tambahkan tombol Batal
                const cancelButton = document.createElement('button');
                cancelButton.innerText = "Batal";
                cancelButton.className = "btn btn-outline-danger ms-2";
                cancelButton.type = "button";
                cancelButton.onclick = function() {
                    cancelEdit(inputElement, button, cancelButton);
                };
                button.parentNode.appendChild(cancelButton);

            } else if (button.innerText === "Simpan") {
                // Mode Simpan
                inputElement.setAttribute('readonly', 'true');
                inputElement.disabled = true;
                button.innerText = "Edit";

                // Hapus tombol Batal
                const cancelButton = button.parentNode.querySelector(".btn-outline-danger");
                if (cancelButton) cancelButton.remove();
            }
        }

        function cancelEdit(inputElement, editButton, cancelButton) {
            // Batalkan mode edit
            inputElement.setAttribute('readonly', 'true');
            inputElement.disabled = true;
            editButton.innerText = "Edit";
            cancelButton.remove(); // Hapus tombol Batal
        }

        function resetTest() {
            // Reset Keterangan Tes dan Waktu
            document.getElementById('keteranganTes').value = "Belum Mengerjakan";
            document.getElementById('waktuTes').value = "00:00:00";

            // Reset Nilai Tabel
            const tests = ['tkdv', 'iqtest', 'papikostik', 'loc'];
            tests.forEach(test => {
                document.getElementById(`benar-${test}`).textContent = "-";
                document.getElementById(`salah-${test}`).textContent = "-";
                document.getElementById(`takdiisi-${test}`).textContent = "-";
                document.getElementById(`nilai-${test}`).textContent = "-";
            });

            alert('Data telah direset!');
        }

        function hapusTrainee() {
            alert('Trainee berhasil dihapus.');
        }

        document.getElementById("exportButton").addEventListener("click", exportToPDF);

        function exportToPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            doc.text("Trainee Details", 10, 10);
            doc.autoTable({
                html: '#dataTable'
            });

            doc.save("trainee-details.pdf");
        }
    </script>
</body>

</html>
