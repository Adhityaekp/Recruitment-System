<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.css">
</head>

<!-- Sidebar HTML -->

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="p-3 sidebar d-flex flex-column" id="sidebar">
            <div class="logo">
                <img src="/img/logosidebar.png" alt="Logo" style="max-height: 100%;">
            </div>
            <ul class="nav flex-column mt-4">
                <li class="nav-item mb-3">
                    <a class="nav-link menu-nav-link" href="#" id="summaryTest" data-bs-toggle="collapse"
                        data-bs-target="#userMenu" aria-expanded="false" onclick="toggleChevron(this)">
                        <i class="bi bi-file-earmark-text" style="font-size: 12px;"></i> <span class="ms-2">Summary Test <i
                                class="bi bi-chevron-right" style="font-size: 12px;"></i></span>
                    </a>
                    <div class="collapse" id="userMenu">
                        <ul class="nav flex-column ms-2">
                            <li class="nav-item mb-2">
                                <a class="nav-link test-nav-link" href="/admin/dashboard" id="allSummary">
                                    <i class="bi bi-dot"></i> Semua Summary</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link test-nav-link" href="/admin/tkdv" id="tkdV">
                                    <i class="bi bi-dot"></i> TKD V</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link test-nav-link" href="#" id="iqTest">
                                    <i class="bi bi-dot"></i> IQ Test</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link test-nav-link" href="#" id="papikostik">
                                    <i class="bi bi-dot"></i> Papikostik</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link test-nav-link" href="#" id="LoC">
                                    <i class="bi bi-dot"></i> Locus of Control</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link menu-nav-link" href="/admin/trainee" id="trainee">
                        <i class="bi bi-people"></i> <span class="ms-2">Trainee</span>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link menu-nav-link" href="/admin/question" id="trainee">
                        <i class="bi bi-folder-plus"></i> <span class="ms-2">Question</span>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link menu-nav-link" href="/admin/profil" id="profil">
                        <i class="bi bi-person"></i> <span class="ms-2">Profil</span>
                    </a>
                </li>
            </ul>

            <!-- Logout Button -->
            <ul class="nav flex-column mt-auto">
                <li class="nav-item">
                    <a class="nav-link menu-nav-link" href="/admin/login" id="logout">
                        <i class="bi bi-box-arrow-right"></i> <span class="ms-2">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <!-- Sidebar JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarLinks = document.querySelectorAll('.nav-link');

            sidebarLinks.forEach(link => {
                // Menandai link yang sesuai dengan URL saat ini
                if (window.location.pathname === link.getAttribute('href')) {
                    link.classList.add('active');
                }

                link.addEventListener('click', function() {
                    sidebarLinks.forEach(link => link.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });

        function toggleChevron(element) {
            const chevron = element.querySelector('.bi-chevron-right, .bi-chevron-down');
            if (chevron) {
                chevron.classList.toggle('bi-chevron-right');
                chevron.classList.toggle('bi-chevron-down');
            }
        }
    </script>
