<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>

    </style>
</head>

<body>
    <div class="d-flex" style="min-height: 100vh;">
        <x-sidebar />

        <div class="flex-grow-1 main-content">
            <x-navbar userName="Admin" />

            <div class="container my-3 table-container">
                <h1>Summary Test</h1>
                <p>Semua Summary Test</p>

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

                        <div>
                            <button class="btn btn-masuk" onclick="exportTableToCSV('tabel-data.csv')"><i
                                class="bi bi-download"></i><span class="ms-2">Export</button>
                        </div>
                    </div>
                </div>

                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">
                                Nama <span class="sort-icon"><i class="fa-solid fa-sort"></i></span>
                            </th>
                            <th onclick="sortTable(1)">
                                Tanggal <span class="sort-icon"><i class="fa-solid fa-sort"></i></span>
                            </th>
                            <th>Kelas</th>
                            <th class="text-center" onclick="sortTable(3)">
                                Nilai TKD V <span class="sort-icon"><i class="fa-solid fa-sort"></i></span>
                            </th>
                            <th class="text-center" onclick="sortTable(4)">
                                Nilai IQ Test <span class="sort-icon"><i class="fa-solid fa-sort"></i></span>
                            </th>
                            <th class="text-center">Nilai Papikostik</th>
                            <th class="text-center">Nilai LoC</th>
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
                name: "John Doe",
                date: "2024-11-01",
                class: "Mechanical",
                school: "ABC High School",
                tkdValue: 85,
                iqTestValue: 120,
            },
            {
                name: "Jane Smith",
                date: "2024-11-02",
                class: "Operator",
                school: "XYZ Institute",
                tkdValue: 88,
                iqTestValue: 130,
            },
            {
                name: "Alice Brown",
                date: "2024-11-03",
                class: "Mechanical",
                school: "DEF Academy",
                tkdValue: 82,
                iqTestValue: 110,
            },
            {
                name: "Bob Johnson",
                date: "2024-11-04",
                class: "Spesial",
                school: "GHI School",
                tkdValue: 90,
                iqTestValue: 125,
            },
            {
                name: "David Kim",
                date: "2024-11-06",
                class: "Mechanical",
                school: "JKL University",
                tkdValue: 95,
                iqTestValue: 140,
            }
        ];


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
                <a href="details_trainee.html?name=${encodeURIComponent(item.name)}" class="custom-link name-link">
                    <span class="name">${item.name}</span>
                    <div class="school-name">${item.school}</div>
                </a>
            </td>
            <td>${item.date}</td>
            <td>${item.class}</td>
            <td class="text-center"><a href="details_tkd.html?value=${encodeURIComponent(item.tkdValue)}" class="custom-link">${item.tkdValue}</a></td>
            <td class="text-center"><a href="details_iq.html?value=${encodeURIComponent(item.iqTestValue)}" class="custom-link">${item.iqTestValue}</a></td>
            <td class="text-center"><a href="/detail/papikostik/${item.papikostikValue}" class="custom-link clickable-link">Lihat</a></td>
            <td class="text-center"><a href="/detail/loc/${item.locValue}" class="custom-link clickable-link">Lihat</a></td>
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

            if (startDate) {
                filteredData = filteredData.filter(item => new Date(item.date) >= new Date(startDate));
            }
            if (endDate) {
                filteredData = filteredData.filter(item => new Date(item.date) <= new Date(endDate));
            }

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
                    return sortDirection ? new Date(cellA) - new Date(cellB) : new Date(cellB) - new Date(cellA);
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
    </script>

</body>

</html>
