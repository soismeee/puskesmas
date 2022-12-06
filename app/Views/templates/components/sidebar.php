<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <img src="<?= base_url() ?>/img/logo.PNG" alt="Logo" width="50">
        </div>
        <div class="sidebar-brand-text mx-3">Klinik Dharma Mulia</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- HAK AKSES ADMIN / PETUGAS -->
    <?php if (session()->get('hak_akses') == 'admin') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Menu Utama
        </div>

        <!-- Nav Item - Pemeriksaan Menu -->
        <li class="nav-item">
            <a class="nav-link" href="/pasien">
                <i class="fas fa-fw fa-users"></i>
                <span>Pasien</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/dokter">
                <i class="fas fa-fw fa-user"></i>
                <span>Dokter</span></a>
        </li>

        <!-- Nav Item - Periksa Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Periksa</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Sub menu periksa:</h6>
                    <a class="collapse-item" href="/periksa">Proses</a>
                    <a class="collapse-item" href="/periksa/selesai">Selesai</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pemeriksaan Menu -->
        <li class="nav-item">
            <a class="nav-link" href="/datarm">
                <i class="fas fa-fw fa-stethoscope"></i>
                <span>Rekam Medis</span></a>
        </li>

        <!-- Nav Item - Resep Menu -->
        <li class="nav-item">
            <a class="nav-link" href="/resep">
                <i class="fas fa-fw fa-book"></i>
                <span>Resep & Pembayaran</span></a>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu Tambahan
        </div>

        <!-- Nav Item - Kelola Akun Menu -->
        <li class="nav-item">
            <a class="nav-link" href="/datapengguna">
                <i class="fas fa-fw fa-calendar-week"></i>
                <span>Pengguna</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="/laporan">
                <i class="fas fa-fw fa-table"></i>
                <span>Laporan</span></a>
        </li>
    <?php endif; ?>
    <?php if (session()->get('hak_akses') == 'pasien') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Menu Utama
        </div>

        <!-- Nav Item - Periksa Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Periksa</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Sub menu periksa:</h6>
                    <a class="collapse-item" href="/periksa">Proses</a>
                    <a class="collapse-item" href="/periksa/selesai">Selesai</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pemeriksaan Menu -->
        <li class="nav-item">
            <a class="nav-link" href="/datarm">
                <i class="fas fa-fw fa-stethoscope"></i>
                <span>Rekam Medis</span></a>
        </li>
    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>