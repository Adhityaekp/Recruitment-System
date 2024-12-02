<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                <h1>Summary Test</h1>
                <p>Semua Summary Test</p>

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
                            <div class="form-group" style="margin-right: 15px;">
                                {{-- <label for="startDate">Start Date</label> --}}
                                <input type="date" id="startDate" class="form-control" onchange="filterTable()">
                            </div>
                            <span style="margin-left: 10px; margin-right: 10px;">Sampai</span>
                            <div class="form-group" style="margin-left: 15px;">
                                {{-- <label for="endDate">End Date</label> --}}
                                <input type="date" id="endDate" class="form-control" onchange="filterTable()">
                            </div>
                        </div>

                        <!-- Export Button -->
                        <div>
                            <button class="btn btn-success" onclick="exportTableToCSV('tabel-data.csv')">Export to
                                CSV</button>
                        </div>
                    </div>
                </div>

                <!-- Data Table -->
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">Nama <i class="fa-solid fa-sort"></i></th>
                            <th onclick="sortTable(1)">Tanggal <i class="fa-solid fa-sort"></i></th>
                            <th> Kelas </th>
                            <th onclick="sortTable(3)">Nilai TKD V <i class="fa-solid fa-sort"></i></th>
                            <th onclick="sortTable(4)">Nilai IQ Test <i class="fa-solid fa-sort"></i></th>
                            <th>Nilai Papikostik </th>
                            <th>Nilai LoC </th>
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
                name: "John Doe",
                date: "2024-11-01",
                class: "Mechanical",
                school: "ABC High School", // Add school name here
                tkdValue: 85,
                iqTestValue: 120,
            },
            {
                name: "Jane Smith",
                date: "2024-11-02",
                class: "Operator",
                school: "XYZ Institute", // Add school name here
                tkdValue: 88,
                iqTestValue: 130,
            },
            {
                name: "Alice Brown",
                date: "2024-11-03",
                class: "Mechanical",
                school: "DEF Academy", // Add school name here
                tkdValue: 82,
                iqTestValue: 110,
            },
            {
                name: "Bob Johnson",
                date: "2024-11-04",
                class: "Spesial",
                school: "GHI School", // Add school name here
                tkdValue: 90,
                iqTestValue: 125,
            },
            {
                name: "David Kim",
                date: "2024-11-06",
                class: "Mechanical",
                school: "JKL University", // Add school name here
                tkdValue: 95,
                iqTestValue: 140,
            }
        ];


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
                    <div class="school-name">${item.school}</div>
                </a>
            </td>
            <td>${item.date}</td>
            <td>${item.class}</td>
            <td><a href="details_tkd.html?value=${encodeURIComponent(item.tkdValue)}">${item.tkdValue}</a></td>
            <td><a href="details_iq.html?value=${encodeURIComponent(item.iqTestValue)}">${item.iqTestValue}</a></td>
            <td><a href="/detail/papikostik/${item.papikostikValue}" class="clickable-link">Lihat</a></td>
            <td><a href="/detail/loc/${item.locValue}" class="clickable-link">Lihat</a></td>
<td>
    <a href="/admin/detailtrainee" class="btn btn-primary">Action</a>
</td>        `;
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
        function exportTableToCSV(filename) {
            var table = document.getElementById('dataTable');
            var rows = table.rows;
            var csvContent = '';

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var cols = row.querySelectorAll('td, th');
                var rowContent = [];

                for (var j = 0; j < cols.length; j++) {
                    rowContent.push(cols[j].innerText);
                }

                csvContent += rowContent.join(',') + '\n';
            }

            // Membuat file CSV dan memulai download
            var blob = new Blob([csvContent], {
                type: 'text/csv;charset=utf-8;'
            });
            var link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = filename;
            link.click();
        }

        function filterTable() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            let filteredData = data;

            // Filter by date range
            if (startDate) {
                filteredData = filteredData.filter(item => new Date(item.date) >= new Date(startDate));
            }
            if (endDate) {
                filteredData = filteredData.filter(item => new Date(item.date) <= new Date(endDate));
            }

            // Render filtered data
            renderTable(filteredData);
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
                    return sortDirection ? new Date(cellA) - new Date(cellB) : new Date(cellB) - new Date(cellA);
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
