<?php include_once 'head.php'  ?>

<body class="g-sidenav-show   bg-gray-100">
    <?php session_start(); ?>
    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://images.pexels.com/photos/12952000/pexels-photo-12952000.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); background-position-y: 30%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="../home/home.php" target="_blank">
                <img src="../../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">SIKENA'</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../home/home.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../dataabsen/dataAbsen.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-check-bold text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Absensi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../umana/tabel_umana.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-books text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Umana'</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../instansi/tabel_instansi.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-building text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Instansi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../jabatan/tabel_jabatan.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-badge text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Jabatan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../user/tabel_user.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 ps ps--active-y">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>