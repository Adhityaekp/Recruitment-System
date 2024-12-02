    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="btn" id="sidebarToggle">
                <i class="bi bi-filter-left"></i>
            </button>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link d-flex align-items-center" href="#" id="profileDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/img/admin.jpg" alt="Profile Picture" class="rounded-circle me-2"
                                style="width: 40px; height: 40px;">
                            <div class="text-start">
                                <span class="d-block fw-bold">{{ $userName }}</span>
                                <small class="text-muted">Administrator</small>
                            </div>
                            <i class="bi bi-chevron-down ms-3"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="/admin/profil">Profile</a></li>
                            <li><a class="dropdown-item" href="/admin/login">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            var mainContent = document.querySelector('.main-content');
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');

            // Menutup semua collapse yang terbuka
            var openCollapses = document.querySelectorAll('.collapse.show');
            openCollapses.forEach(function(collapse) {
                var bootstrapCollapse = new bootstrap.Collapse(collapse, {
                    toggle: false
                });
                bootstrapCollapse.hide();
            });
        });

        // document.querySelectorAll('.nav-link[data-bs-toggle="collapse"]').forEach(function(link) {
        //     link.addEventListener('click', function() {
        //         var target = document.querySelector(this.dataset.bsTarget);
        //         var bootstrapCollapse = new bootstrap.Collapse(target, {
        //             toggle: false
        //         });
        //         if (target.classList.contains('show')) {
        //             bootstrapCollapse.hide();
        //         } else {
        //             bootstrapCollapse.show();
        //         }
        //     });
        // });
    </script>
