<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Main Content -->
    <div class="d-flex" style="min-height: 100vh;">
        <x-sidebar /> <!-- Sidebar component -->

        <!-- Main Content -->
        <div class="flex-grow-1 main-content">
            <x-navbar userName="Admin" />

            <div class="container my-4 table-container">
                <h1>Trainee</h1>
                <p>Trainee List</p>

                <!-- Class Filter Menu (like navbar) -->
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

                <!-- Filter Date Range -->
                <div class="filter-container">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <!-- Button to trigger "Tambah Trainee" modal -->
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addTraineeModal">Tambah Trainee</button>

                            <!-- Button to Export Table to CSV -->
                            <button class="btn btn-success ms-2" onclick="exportTableToCSV('tabel-data.csv')">Export to
                                CSV</button>
                        </div>

                        <!-- Filter Search -->
                        <div>
                            <input type="text" id="searchInput" class="form-control" placeholder="Search Trainee"
                                onkeyup="filterTable()">
                        </div>
                    </div>
                </div>

                <!-- Modal to Add Trainee -->
                <div class="modal fade" id="addTraineeModal" tabindex="-1" aria-labelledby="addTraineeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTraineeModalLabel">Tambah Trainee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addTraineeForm">
                                    <div class="mb-3">
                                        <label for="noRegistrasi" class="form-label">No Registrasi</label>
                                        <input type="text" class="form-control" id="noRegistrasi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="traineeName" class="form-label">Nama Trainee</label>
                                        <input type="text" class="form-control" id="traineeName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="traineeDate" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="traineeDate" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="traineeSchool" class="form-label">Asal Sekolah</label>
                                        <input type="text" class="form-control" id="traineeSchool" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="traineeClass" class="form-label">Kelas</label>
                                        <select class="form-select" id="traineeClass" required>
                                            <option value="Mechanical">Mechanical</option>
                                            <option value="Electrical">Electrical</option>
                                            <option value="Software">Software</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="addTrainee()">Add
                                    Trainee</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Table -->
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">Nama <i class="fa-solid fa-sort"></i></th>
                            <th>No. Registrasi</th>
                            <th onclick="sortTable(1)">Tanggal Lahir <i class="fa-solid fa-sort"></i></th>
                            <th>Asal Sekolah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamic rows will be inserted here -->
                    </tbody>
                </table>


                <nav aria-label="Page navigation">
                    <ul class="pagination" id="pagination"></ul>
                </nav>
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
        let data = [{
            noregistrasi: "MC08911123",
            name: "John Doe",
            dateOfBirth: "2024-11-01",
            class: "Mechanical",
            school: "ABC High School", // Add school name here
        }];


        let currentPage = 1; // Initial page
        const rowsPerPage = 10; // Number of rows per page

        function renderTable(filteredData) {
            const tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            tableBody.innerHTML = ''; // Clear previous rows

            // Calculate start and end index for pagination
            const startIndex = (currentPage - 1) * rowsPerPage;
            const endIndex = startIndex + rowsPerPage;
            const currentPageData = filteredData.slice(startIndex, endIndex);

            // Render the filtered data for the current page
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
            <td>
                <a href="/admin/detailtrainee" class="btn btn-primary">Action</a>
            </td>
        `;
            });
            // Update pagination
            updatePagination(filteredData);
        }

        function updatePagination(filteredData) {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = ''; // Clear previous pagination

            const totalPages = Math.ceil(filteredData.length / rowsPerPage); // Calculate total pages

            // Create previous page button
            if (currentPage > 1) {
                const prevButton = createPaginationButton('Previous', () => changePage(currentPage - 1));
                pagination.appendChild(prevButton);
            }

            // Create page number buttons
            for (let i = 1; i <= totalPages; i++) {
                const pageButton = createPaginationButton(i, () => changePage(i));
                if (i === currentPage) {
                    pageButton.classList.add('active'); // Highlight the current page
                }
                pagination.appendChild(pageButton);
            }

            // Create next page button
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
                e.preventDefault(); // Prevent default anchor behavior
                onClick();
            });
            button.appendChild(link);
            return button;
        }

        // Function to change the current page and re-render the table
        function changePage(page) {
            currentPage = page;
            renderTable(data); // Re-render the table with the current page data
        }


        function filterClass(className) {
            const buttons = document.querySelectorAll('.btn-filter');

            // Hapus kelas 'active' dari semua tombol
            buttons.forEach(button => {
                button.classList.remove('active');
            });

            // Menambahkan kelas 'active' pada tombol yang dipilih
            if (className !== 'all') {
                const selectedButton = Array.from(buttons).find(button => button.textContent === className);
                if (selectedButton) {
                    selectedButton.classList.add('active');
                }
            } else {
                // Jika 'All Classes' dipilih, tambahkan aktif pada tombol 'All Classes'
                const selectedButton = Array.from(buttons).find(button => button.textContent === 'All Classes');
                if (selectedButton) {
                    selectedButton.classList.add('active');
                }
            }

            // Lakukan penyaringan data berdasarkan kelas
            const filteredData = className === 'all' ? data : data.filter(item => item.class === className);
            renderTable(filteredData);
        }

        // Initially render table with all data
        renderTable(data);

        // Fungsi untuk mengekspor tabel ke CSV
        function addTrainee() {
            // Get form values
            const noRegistrasi = document.getElementById('noRegistrasi').value;
            const name = document.getElementById('traineeName').value;
            const date = document.getElementById('traineeDate').value;
            const school = document.getElementById('traineeSchool').value;
            const traineeClass = document.getElementById('traineeClass').value;

            // Create a new row in the table
            const table = document.getElementById('traineeTable').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();

            newRow.innerHTML = `
            <td>${noRegistrasi}</td>
            <td>${name}</td>
            <td>${date}</td>
            <td>${school}</td>
            <td>${traineeClass}</td>
        `;

            // Clear form inputs and close modal
            document.getElementById('addTraineeForm').reset();
            const modal = new bootstrap.Modal(document.getElementById('addTraineeModal'));
            modal.hide();
        }

        // Function to export table to CSV
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

        // Function to filter table based on search input
        function filterTable() {
            const filter = document.getElementById('searchInput').value.toLowerCase();
            const table = document.getElementById('traineeTable');
            const rows = table.getElementsByTagName('tr');

            Array.from(rows).forEach(row => {
                const cells = row.getElementsByTagName('td');
                if (cells.length > 0) {
                    const noRegistrasi = cells[0].textContent.toLowerCase();
                    const name = cells[1].textContent.toLowerCase();
                    const school = cells[3].textContent.toLowerCase();

                    if (noRegistrasi.includes(filter) || name.includes(filter) || school.includes(filter)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        }

        let sortDirection = true;

        function sortTable(columnIndex) {
            const table = document.getElementById('dataTable');
            const rows = Array.from(table.rows).slice(1); // Lewati baris header
            const isDateColumn = columnIndex === 1; // Kolom tanggal

            // Abaikan kolom tanpa dukungan pengurutan
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

            // Perbarui arah pengurutan
            sortDirection = !sortDirection;

            // Tambahkan ulang baris dalam urutan baru
            const tbody = table.tBodies[0];
            rows.forEach(row => tbody.appendChild(row));

            // Perbarui ikon
            updateSortIcons(columnIndex);
        }

        function updateSortIcons(columnIndex) {
            const headers = document.querySelectorAll('#dataTable th');
            headers.forEach((header, index) => {
                const icon = header.querySelector('i'); // Cari elemen ikon dalam header

                if (icon) { // Pastikan hanya header dengan ikon yang diperbarui
                    if (index === columnIndex) {
                        // Ubah ikon pada kolom yang sedang diurutkan
                        icon.classList.remove('fa-sort');
                        if (sortDirection) {
                            icon.classList.remove('fa-caret-down');
                            icon.classList.add('fa-caret-up'); // Urutan ascending
                        } else {
                            icon.classList.remove('fa-caret-up');
                            icon.classList.add('fa-caret-down'); // Urutan descending
                        }
                    } else {
                        // Reset ikon pada kolom lain
                        icon.classList.remove('fa-caret-up', 'fa-caret-down');
                        icon.classList.add('fa-sort');
                    }
                }
            });
        }
    </script>

</body>

</html>