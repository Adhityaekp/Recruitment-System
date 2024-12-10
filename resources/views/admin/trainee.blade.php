<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .search-container {
            position: relative;
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            color: #6c757d;
            ] pointer-events: none;
            ]
        }

        #searchInput {
            padding-left: 2.5rem;
        }
    </style>
</head>

<body>
    <div class="d-flex" style="min-height: 100vh;">
        <x-sidebar />

        <div class="flex-grow-1 main-content">
            <x-navbar userName="Admin" />

            <div class="container my-4 table-container">
                <h1>Trainee</h1>
                <p>Trainee List</p>

                <div class="d-flex justify-content-between mb-3">
                    <div class="btn-group" role="group" aria-label="Class Filter">
                        <button type="button" class="btn btn-filter" onclick="filterClass('all')">All Classes</button>
                        <button type="button" class="btn btn-filter"
                            onclick="filterClass('Mechanical')">Mechanical</button>
                        <button type="button" class="btn btn-filter"
                            onclick="filterClass('Operator')">Operator</button>
                        <button type="button" class="btn btn-filter" onclick="filterClass('Spesial')">Spesial</button>
                    </div>
                </div>

                <div class="filter-container">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-masuk" data-bs-toggle="modal" data-bs-target="#addTraineeModal">
                                <i class="bi bi-person-plus"></i><span class="ms-2">Tambah Trainee</span>
                            </button>

                            <button class="btn btn-masuk ms-2" onclick="exportTableToCSV('tabel-data.csv')">
                                <i class="bi bi-download"></i><span class="ms-2">Export</span>
                            </button>

                            <button class="btn btn-masuk ms-2"
                                onclick="document.getElementById('importFileInput').click()">
                                <i class="bi bi-upload"></i><span class="ms-2">Import</span>
                            </button>

                            <input type="file" id="importFileInput" accept=".csv" style="display: none;"
                                onchange="importCSVFile(this)">
                        </div>

                        <div class="search-container position-relative">
                            <i class="bi bi-search search-icon"></i>
                            <input type="text" id="searchInput" class="form-control ps-5" placeholder="Cari ..."
                                onkeyup="filterTable()">
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addTraineeModal" tabindex="-1" aria-labelledby="addTraineeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" style="max-width: 800px;">
                        <div class="modal-content" style="width: 100%;">
                            <div class="modal-header" style="justify-content: center;">
                                <h5 class="modal-title" id="addTraineeModalLabel">Tambah Trainee</h5>
                            </div>
                            <div class="modal-body">
                                <form id="addTraineeForm">
                                    <div class="mb-3">
                                        <label for="traineeClass" class="form-label">Kelas</label>
                                        <select class="form-select" id="traineeClass" required
                                            onchange="generateNoRegistrasi()">
                                            <option value="" selected disabled>Pilih Kelas</option>
                                            <option value="MC">Mechanical</option>
                                            <option value="OP">Operator</option>
                                            <option value="SP">Spesialis</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="noRegistrasi" class="form-label">No Registrasi</label>
                                        <input type="text" class="form-control custom-input" id="noRegistrasi"
                                            readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="traineeName" class="form-label">Nama Trainee</label>
                                        <input type="text" class="form-control custom-input" id="traineeName"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="traineeDate" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control custom-input" id="traineeDate"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="traineeSchool" class="form-label">Asal Sekolah</label>
                                        <input type="text" class="form-control custom-input" id="traineeSchool"
                                            required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer" style="justify-content: center;">
                                <button type="button" class="btn button-back" style="width: 150px;"
                                    data-bs-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-masuk" style="width: 150px;"
                                    onclick="addTrainee()">Tambah
                                    Trainee</button>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">Nama <span class="sort-icon"><i
                                        class="fa-solid fa-sort"></i></span></th>
                            <th>No. Registrasi</th>
                            <th onclick="sortTable(1)">Tanggal Lahir <span class="sort-icon"><i
                                        class="fa-solid fa-sort"></i></span></th>
                            <th>Asal Sekolah</th>
                            <th class="text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end" id="pagination"></ul>
                </nav>
            </div>

            <footer class="footer text-center py-3 d-flex justify-content-between align-items-center">
                <p class="mb-0">&copy; 2024 Your Company. All rights reserved.</p>
                <p class="mb-0">Supported By ILC</p>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let data = [{
            noregistrasi: "MC08911123",
            name: "John Doe",
            dateOfBirth: "2024-11-01",
            class: "Mechanical",
            school: "ABC High School",
        }];


        let currentPage = 1;
        const rowsPerPage = 10;

        function renderTable(filteredData) {
            const tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            tableBody.innerHTML = '';

            const startIndex = (currentPage - 1) * rowsPerPage;
            const endIndex = startIndex + rowsPerPage;
            const currentPageData = filteredData.slice(startIndex, endIndex);

            currentPageData.forEach(item => {
                const row = tableBody.insertRow();
                row.innerHTML = `
            <td>
                <a href="details_trainee.html?name=${encodeURIComponent(item.name)}" class="name-link">
                    <span class="name">${item.name}</span>
                </a>
            </td>
            <td>${item.noregistrasi}</td>
            <td>${item.dateOfBirth}</td>
            <td>${item.school}</td>
            <td class="text-center">
                <a href="/admin/detailtrainee" class="custom-link"><i class="bi bi-three-dots"></i></a>
            </td>
        `;
            });
            updatePagination(filteredData);
        }

        function updatePagination(filteredData) {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            const totalPages = Math.ceil(filteredData.length / rowsPerPage);

            if (currentPage > 1) {
                const prevButton = createPaginationButton('Previous', () => changePage(currentPage - 1));
                pagination.appendChild(prevButton);
            }

            for (let i = 1; i <= totalPages; i++) {
                const pageButton = createPaginationButton(i, () => changePage(i));
                if (i === currentPage) {
                    pageButton.classList.add('active');
                }
                pagination.appendChild(pageButton);
            }

            if (currentPage < totalPages) {
                const nextButton = createPaginationButton('Next', () => changePage(currentPage + 1));
                pagination.appendChild(nextButton);
            }
        }

        function createPaginationButton(text, onClick) {
            const button = document.createElement('li');
            button.classList.add('page-item');
            const link = document.createElement('a');
            link.classList.add('page-link');
            link.href = '#';
            link.textContent = text;
            link.addEventListener('click', (e) => {
                e.preventDefault();
                onClick();
            });
            button.appendChild(link);
            return button;
        }

        function changePage(page) {
            currentPage = page;
            renderTable(data);
        }


        function filterClass(className) {
            const buttons = document.querySelectorAll('.btn-filter');

            buttons.forEach(button => {
                button.classList.remove('active');
            });

            if (className !== 'all') {
                const selectedButton = Array.from(buttons).find(button => button.textContent === className);
                if (selectedButton) {
                    selectedButton.classList.add('active');
                }
            } else {
                const selectedButton = Array.from(buttons).find(button => button.textContent === 'All Classes');
                if (selectedButton) {
                    selectedButton.classList.add('active');
                }
            }

            const filteredData = className === 'all' ? data : data.filter(item => item.class === className);
            renderTable(filteredData);
        }

        renderTable(data);

        function generateNoRegistrasi() {
            const traineeClass = document.getElementById('traineeClass').value;
            if (traineeClass) {
                const randomNumber = Math.floor(1000000 + Math.random() * 9000000);
                const noRegistrasi = `${traineeClass}${randomNumber}`;
                document.getElementById('noRegistrasi').value = noRegistrasi;
            } else {
                document.getElementById('noRegistrasi').value = '';
            }
        }

        function addTrainee() {
            const noRegistrasi = document.getElementById('noRegistrasi').value.trim();
            const traineeName = document.getElementById('traineeName').value.trim();
            const traineeDate = document.getElementById('traineeDate').value;
            const traineeSchool = document.getElementById('traineeSchool').value.trim();
            const traineeClass = document.getElementById('traineeClass').value;

            if (!traineeClass || !noRegistrasi || !traineeName || !traineeDate || !traineeSchool) {
                alert('Harap isi semua field!');
                return;
            }

            const tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            const row = tableBody.insertRow();

            row.innerHTML = `
        <td>${traineeName}</td>
        <td>${noRegistrasi}</td>
        <td>${traineeDate}</td>
        <td>${traineeSchool}</td>
        <td>
            <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Delete</button>
        </td>
    `;

            document.getElementById('addTraineeForm').reset();
            const modal = bootstrap.Modal.getInstance(document.getElementById('addTraineeModal'));
            modal.hide();
        }

        function deleteRow(button) {
            const row = button.parentElement.parentElement;
            row.remove();
        }

        function deleteRow(button) {
            const row = button.parentElement.parentElement;
            row.remove();
        }

        function exportTableToCSV(filename) {
            const table = document.getElementById("traineeTable");
            const rows = Array.from(table.rows);
            let csvContent = "";

            rows.forEach(row => {
                const rowData = Array.from(row.cells).map(cell => cell.textContent).join(",");
                csvContent += rowData + "\n";
            });

            const hiddenElement = document.createElement('a');
            hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csvContent);
            hiddenElement.target = '_blank';
            hiddenElement.download = filename;
            hiddenElement.click();
        }

        function filterTable() {
            const filter = document.getElementById('searchInput').value.toLowerCase();

            const filteredData = data.filter(item =>
                item.name.toLowerCase().includes(filter) ||
                item.noregistrasi.toLowerCase().includes(filter) ||
                item.school.toLowerCase().includes(filter)
            );

            renderTable(filteredData);
        }


        let sortDirection = true;

        function sortTable(columnIndex) {
            const table = document.getElementById('dataTable');
            const rows = Array.from(table.rows).slice(1);
            const isDateColumn = columnIndex === 1;

            const header = table.rows[0].cells[columnIndex];
            if (!header.querySelector('i')) return;

            rows.sort((a, b) => {
                const cellA = a.cells[columnIndex].innerText;
                const cellB = b.cells[columnIndex].innerText;

                if (isDateColumn) {
                    return sortDirection ? new Date(cellA) - new Date(cellB) : new Date(cellB) - new Date(
                        cellA);
                }

                return sortDirection ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
            });

            sortDirection = !sortDirection;

            const tbody = table.tBodies[0];
            rows.forEach(row => tbody.appendChild(row));

            updateSortIcons(columnIndex);
        }

        function updateSortIcons(columnIndex) {
            const headers = document.querySelectorAll('#dataTable th');
            headers.forEach((header, index) => {
                const icon = header.querySelector('i');

                if (icon) {
                    if (index === columnIndex) {
                        icon.classList.remove('fa-sort');
                        if (sortDirection) {
                            icon.classList.remove('fa-caret-down');
                            icon.classList.add('fa-caret-up');
                        } else {
                            icon.classList.remove('fa-caret-up');
                            icon.classList.add('fa-caret-down');
                        }
                    } else {
                        icon.classList.remove('fa-caret-up', 'fa-caret-down');
                        icon.classList.add('fa-sort');
                    }
                }
            });
        }

        function importCSVFile(input) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const csvData = e.target.result;
                    // Logika untuk memproses data CSV
                    console.log(csvData); // Ganti dengan logika parsing atau upload data
                    alert('Data CSV berhasil diunggah!');
                };
                reader.readAsText(file);
            } else {
                alert('Tidak ada file yang dipilih!');
            }
        }
    </script>

</body>

</html>
