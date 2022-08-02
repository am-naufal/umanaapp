<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <title>
        SIKENA' | Sistem Kehadiran Umana'
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

    <!-- sweetalert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">

</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../home/home.php">
                            SIKENA'
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center me-2 active font-weight-bold " aria-current="page" href="../home/home.php">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-2"></i> <b>
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            echo $jam = "<span id='jam' style='font-size:24'></span> WIB."; ?>
                                        </b>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="#">
                                        <i class="fa fa-user opacity-6 text-dark me-1"></i>
                                        <?php
                                        include '../inc/_day.php';
                                        $hari = __day();
                                        $tanggal = date('d F Y');
                                        echo $hari . "," . $tanggal; ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="profileUmana.php">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        <?php
                                        session_start();
                                        echo $_SESSION['id_user']; ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="../login/logout.php">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Absen</h4>
                                    <p class="mb-0">Barokah Sudah menanti Anda</p>
                                </div>
                                <!-- <div class="alert alert-success hidden" id="sukses" role="alert">
                                    <strong>Berhasil!</strong> Anda sudah terAbsen
                                </div> -->
                                <!-- <div class="alert alert-warning alert-dismissible fade hidden" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Warning!</strong> This is a warning alert—check it out!</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> -->
                                <div class="card-body">
                                    <?php
                                    include_once '../inc/_database.php';
                                    $db = __database();
                                    $where = [
                                        'niu' => $_SESSION['id_user']
                                    ];
                                    $query = __ambil($db, "tb_umana", "*", $where);
                                    $r = $query->fetch_object();
                                    ?>
                                    <form role="form" method="POST" action="">
                                        <div class="mb-1">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <input type="text" class="form-control form-control-lg" value="<?php echo $r->nama; ?>" readonly>
                                        </div>
                                        <div class="mb-1">
                                            <?php
                                            $whereinst = ['kd_instansi' => $r->kd_instansi];
                                            $query = __ambil($db, "tb_instansi", "*", $whereinst);
                                            $q = $query->fetch_object();
                                            ?>
                                            <label class="col-form-label">Instansi</label>
                                            <input type="text" name="instansi" class="form-control form-control-lg" value="<?php echo $q->kd_instansi; ?>" readonly>
                                        </div>
                                        <div class="mb-1">
                                            <?php
                                            $wherejbtn = ['kd_jabatan' => $r->kd_jabatan];
                                            $query = __ambil($db, "tb_jabatan", "*", $wherejbtn);
                                            $q = $query->fetch_object();
                                            ?>
                                            <label class="col-form-label">Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control form-control-lg" value="<?php echo $q->kd_jabatan; ?>" readonly>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="simpan" value="Simpan" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Absen</button>
                                        </div>
                                    </form>

                                    <?php
                                    $db = __database();
                                    $tgl = date('j/n/Y');
                                    $jamcvk = date('H:i');
                                    $niu = $_SESSION['id_user'];

                                    if (isset($_POST['simpan'])) {
                                        # code...

                                        $cekabs = $db->query("SELECT * FROM tb_absen WHERE niu='$niu' AND tanggal='$tgl'");
                                        $adyata = $cekabs->num_rows;
                                        if ($adyata > 0) {
                                            $abspulang = $db->query("SELECT * FROM tb_absen WHERE niu='$niu' AND tanggal='$tgl'");
                                            $r = $abspulang->fetch_array();
                                            if (empty($r['jam_pulang'])) {
                                                $pulang = $db->query("UPDATE tb_absen SET jam_pulang='$jamcvk' WHERE niu='$niu' AND tanggal='$tgl'");
                                                if ($pulang) {
                                    ?>
                                                    <script>
                                                        setTimeout(sweetal, 10)

                                                        function sweetal() {
                                                            Swal.fire({
                                                                position: 'center',
                                                                icon: 'success',
                                                                title: 'Absen pulang Berhasil',
                                                                showConfirmButton: false,
                                                                timer: 3000
                                                            })
                                                        }
                                                    </script>
                                                <?php
                                                } else {
                                                ?>
                                                    <script>
                                                        setTimeout(sweetal, 10)

                                                        function sweetal() {
                                                            Swal.fire({
                                                                position: 'center',
                                                                icon: 'error',
                                                                title: 'Gagal Absen',
                                                                showConfirmButton: false,
                                                                timer: 3000
                                                            })
                                                        }
                                                    </script>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <script>
                                                    setTimeout(sweetal, 10)

                                                    function sweetal() {
                                                        Swal.fire({
                                                            position: 'center',
                                                            icon: 'warning',
                                                            title: 'Mohon Maaf',
                                                            html: 'Anda sudah mengisi Absen pulang',
                                                            showConfirmButton: false,
                                                            timer: 3000
                                                        })
                                                    }
                                                </script>
                                            <?php
                                            }
                                        } else {
                                            $query = $db->query(" INSERT INTO tb_absen (id, tanggal, niu, kd_instansi, kd_jabatan, jam_masuk) VALUES (NULL, '$tgl', '$niu', '$_POST[instansi]', '$_POST[jabatan]','$jamcvk')");
                                            if ($query) {
                                            ?>
                                                <script>
                                                    setTimeout(sweetal, 10)

                                                    function sweetal() {
                                                        Swal.fire({
                                                            position: 'center',
                                                            icon: 'success',
                                                            title: 'Absen Hadir Berhasil',
                                                            showConfirmButton: false,
                                                            timer: 3000
                                                        })
                                                    }
                                                </script>
                                            <?php
                                            } else {
                                            ?>
                                                <script>
                                                    setTimeout(sweetal, 10)

                                                    function sweetal() {
                                                        Swal.fire({
                                                            position: 'center',
                                                            icon: 'error',
                                                            title: 'Gagal Absen',
                                                            showConfirmButton: false,
                                                            timer: 3000
                                                        })
                                                    }
                                                </script>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>


                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Login Admin?
                                        <a href="sign-in.php" class="text-primary text-gradient font-weight-bold">Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://images.pexels.com/photos/12952000/pexels-photo-12952000.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
          background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Kalau tidak mau repot jangan berjuang, karena perjuangan selalu membutuhkan pengorbanan"</h4>
                                <p class="text-white position-relative">KHR. As'ad Syamsul Arifin.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../assets/js/jam.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>