<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Menambahkan gaya untuk foto profil dan tombol edit */
        .profile-container {
            position: relative;
            display: inline-block;
            width: 150px;
            height: 150px;
        }

        .profile-container img {
            border-radius: 50%;
            /* Membuat gambar menjadi bentuk oval */
        }

        .profile-container button {
            position: absolute;
            bottom: 0;
            right: 0;
            transform: translate(50%, 50%);
            padding: 5px;
            background-color: #fff;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 14px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .profile-container button i {
            color: #007bff;
            /* Menentukan warna ikon */
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <div class="d-flex" style="min-height: 100vh;">
        <x-sidebar /> <!-- Sidebar component -->

        <!-- Main Content -->
        <div class="flex-grow-1 main-content">
            <x-navbar userName="Admin" />

            <div class="container my-4 table-container">
                <h1>Detail Profil</h1>

                <form>
                    <div class="mb-3 text-center">
                        <div class="profile-container position-relative d-inline-block">
                            <img src="/img/admin.jpg" alt="Foto Profil" class="rounded-circle" id="profileImage"
                                style="width: 150px; height: 150px; object-fit: cover;">
                            <button type="button"
                                class="btn btn-outline-secondary position-absolute bottom-0 end-0 rounded-circle"
                                style="width: 30px; height: 30px; padding: 0; margin: 20px;"
                                onclick="openProfileEditModal()">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
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
                        <label for="posisi" class="form-label">Posisi</label>
                        <div class="input-group">
                            <select id="posisi" class="form-select" disabled>
                                <option value="Admin" selected>Admin</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="toggleEdit('kelas', this)">Edit</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <div class="input-group">
                            <input type="text" id="Username" class="form-control" value="Admin" readonly>
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="toggleEdit('Username', this)">Edit</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" value="Admin" readonly>
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="openPasswordModal()">Edit</button>
                        </div>
                    </div>
                </form>

                <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="passwordModalLabel">Ubah Kata Sandi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="oldPassword" class="form-label">Sandi Sebelumnya</label>
                                    <input type="password" id="oldPassword" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">Sandi Baru</label>
                                    <input type="password" id="newPassword" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Konfirmasi Sandi Baru</label>
                                    <input type="password" id="confirmPassword" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="savePasswordChange()">Simpan</button>
                            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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

        // Fungsi untuk membuka modal
        function openPasswordModal() {
            // Reset modal input
            document.getElementById('oldPassword').value = '';
            document.getElementById('newPassword').value = '';
            document.getElementById('confirmPassword').value = '';

            // Tampilkan modal
            var passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'));
            passwordModal.show();
        }

        // Fungsi untuk menyimpan perubahan kata sandi
        function savePasswordChange() {
            const oldPassword = document.getElementById('oldPassword').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (!oldPassword || !newPassword || !confirmPassword) {
                alert('Harap lengkapi semua kolom password.');
                return;
            }

            if (newPassword !== confirmPassword) {
                alert('Sandi baru dan konfirmasi sandi tidak cocok.');
                return;
            }

            // Proses simpan password baru (misalnya kirim ke server)
            alert('Password berhasil diubah.');

            // Tutup modal setelah simpan
            var passwordModal = bootstrap.Modal.getInstance(document.getElementById('passwordModal'));
            passwordModal.hide();
        }
    </script>

</body>

</html>
