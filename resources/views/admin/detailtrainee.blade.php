<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>

    </style>
</head>

<body>
    <div class="d-flex" style="min-height: 100vh;">
        <x-sidebar />

        <div class="flex-grow-1 main-content">
            <x-navbar userName="Admin" />

            <div class="container my-4 table-container">
                <a href="javascript:window.history.back();" class="btn custom-link"><i
                        class="bi bi-arrow-left m-2"></i>Kembali</a>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Detail Trainee</h1>
                    <button class="btn btn-masuk" id="exportButton"><i class="bi bi-download"></i><span
                            class="ms-2">Export</span>
                    </button>
                </div>
                <form class="mb-3">
                    <div class="mb-3">
                        <label for="noRegistrasi" class="form-label">No Registrasi</label>
                        <div class="input-group">
                            <input type="text" id="noRegistrasi" class="form-control custom-input" value="123456"
                                readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <input type="text" id="namaLengkap" class="form-control custom-input" value="John Doe"
                                readonly>
                            <button class="btn btn-custom" type="button" onclick="toggleEdit('namaLengkap', this)">
                                <i class="bi bi-pencil"></i><span class="ms-2">Edit</span>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <div class="input-group">
                            <input type="date" id="tanggalLahir" class="form-control custom-input" value="2000-01-01"
                                readonly>
                            <button class="btn btn-custom" type="button" onclick="toggleEdit('tanggalLahir', this)"><i
                                    class="bi bi-pencil"></i><span class="ms-2">Edit</span></button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="asalSekolah" class="form-label">Asal Sekolah</label>
                        <div class="input-group">
                            <input type="text" id="asalSekolah" class="form-control custom-input"
                                value="SMK Negeri 1" readonly>
                            <button class="btn btn-custom" type="button" onclick="toggleEdit('asalSekolah', this)"><i
                                    class="bi bi-pencil"></i><span class="ms-2">Edit</span>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <div class="input-group">
                            <select id="kelas" class="form-select " disabled>
                                <option value="Mechanical" selected>Mechanical</option>
                            </select>
                            <button class="btn btn-custom" type="button" onclick="toggleEdit('kelas', this)"><i
                                    class="bi bi-pencil"></i><span class="ms-2">Edit</span></button>
                        </div>
                    </div>
                </form>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Summary Test</h2>
                    <button class="btn btn-masuk" onclick="resetTest()"><i class="bi bi-arrow-repeat"></i><span
                            class="ms-2">Mulai Ulang</span>
                    </button>
                </div>

                <form class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="keteranganTes">Keterangan Tes</label>
                            <input type="text" id="keteranganTes" class="form-control custom-input"
                                value="Sudah Mengerjakan" readonly>
                        </div>

                        <div class="col">
                            <label for="waktuTes">Waktu</label>
                            <input type="text" id="waktuTes" class="form-control custom-input" value="00:00:00"
                                readonly>
                        </div>
                    </div>
                </form>

                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th>Jenis Test</th>
                            <th class="text-center">Jumlah Soal</th>
                            <th class="text-center">Benar</th>
                            <th class="text-center">Salah</th>
                            <th class="text-center">Tak Diisi</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>TKD V</td>
                            <td class="text-center">100</td>
                            <td class="text-center" id="benar-tkdv">85</td>
                            <td class="text-center" id="salah-tkdv">10</td>
                            <td class="text-center" id="takdiisi-tkdv">5</td>
                            <td class="text-center" id="nilai-tkdv">85</td>
                            <td class="text-center"> <a href="/admin/detailtesttkdv" class="custom-link"><i
                                        class="bi bi-three-dots"></i></a>
                        </tr>
                        <tr>
                            <td>IQ Test</td>
                            <td class="text-center">50</td>
                            <td class="text-center" id="benar-iqtest">40</td>
                            <td class="text-center" id="salah-iqtest">5</td>
                            <td class="text-center" id="takdiisi-iqtest">5</td>
                            <td class="text-center" id="nilai-iqtest">80</td>
                            <td class="text-center"> <a href="/admin/detailtestiqtest" class="custom-link"><i
                                        class="bi bi-three-dots"></i></a>
                        </tr>
                        <tr>
                            <td>Papikostik</td>
                            <td class="text-center">60</td>
                            <td class="text-center" id="benar-papikostik">-</td>
                            <td class="text-center" id="salah-papikostik">-</td>
                            <td class="text-center" id="takdiisi-papikostik">-</td>
                            <td class="text-center" id="nilai-papikostik">-</td>
                            <td class="text-center"> <a href="/admin/detailtestpapikostik" class="custom-link"><i
                                        class="bi bi-three-dots"></i></a>
                        </tr>
                        <tr>
                            <td>LoC</td>
                            <td class="text-center">40</td>
                            <td class="text-center" id="benar-loc">-</td>
                            <td class="text-center" id="salah-loc">-</td>
                            <td class="text-center" id="takdiisi-loc">-</td>
                            <td class="text-center" id="nilai-loc">-</td>
                            <td class="text-center"> <a href="/admin/detailtestloc" class="custom-link"><i
                                        class="bi bi-three-dots"></i></a>
                        </tr>
                    </tbody>
                </table>
                <button class="btn button-back btn-lg w-100 mt-3" onclick="hapusTrainee()"><i
                        class="bi bi-trash"></i> Hapus Trainee</button>
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

            if (button.innerText.trim() === "Edit") {
                inputElement.removeAttribute('readonly');
                inputElement.disabled = false;
                inputElement.focus();

                button.innerHTML = `<span>Simpan</span>`;
                button.className = "btn btn-custom save-button";

                const cancelButton = document.createElement('button');
                cancelButton.innerHTML = `<span>Batal</span>`;
                cancelButton.className = "btn btn-custom cancel-button";
                cancelButton.type = "button";
                cancelButton.onclick = function() {
                    cancelEdit(inputElement, button, cancelButton);
                };
                button.parentNode.appendChild(cancelButton);

            } else if (button.innerText.trim() === "Simpan") {
                inputElement.setAttribute('readonly', 'true');
                inputElement.disabled = true;

                button.innerHTML = `<i class="bi bi-pencil"></i><span class="ms-2">Edit</span>`;
                button.className = "btn btn-custom";

                const cancelButton = button.parentNode.querySelector(".cancel-button");
                if (cancelButton) cancelButton.remove();
            }
        }

        function cancelEdit(inputElement, saveButton, cancelButton) {
            inputElement.setAttribute('readonly', 'true');
            inputElement.disabled = true;

            saveButton.innerHTML = `<i class="bi bi-pencil"></i><span class="ms-2">Edit</span>`;
            saveButton.className = "btn btn-custom";

            cancelButton.remove();
        }


        function cancelEdit(inputElement, editButton, cancelButton) {
            inputElement.setAttribute('readonly', 'true');
            inputElement.disabled = true;
            editButton.innerHTML = `<span>Edit</span><i class="bi bi-pencil ms-2"></i>`;
            editButton.className = "btn btn-custom";
            cancelButton.remove();
        }


        function resetTest() {
            document.getElementById('keteranganTes').value = "Belum Mengerjakan";
            document.getElementById('waktuTes').value = "00:00:00";

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
