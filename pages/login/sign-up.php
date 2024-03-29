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
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="sign-in.php">
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
            <a class="nav-link me-2" href="sign-up.php">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="sign-in.php">
              <i class="fas fa-key opacity-6  me-1"></i>
              Sign In
            </a>
          </li>
        </ul>
        <ul class="navbar-nav d-lg-block d-none">
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Selamat Mengabdi</h1>
            <p class="text-lead text-white">Isikan formulir identitas anda sebagai calon Umana'</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-7 col-lg-6 col-md-8 mx-auto">
          <div class="card z-index-0x">
            <div class="card-header pb-0">
            </div>
            <?php include "../inc/_database.php"; ?>
            <form class="card-body" method="post" action="">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nomor Induk Umana'(NIU)<span class="help"> e.x. "2020503009"</span></label>
                    <input type="text" id="" name="niu" class="form-control" placeholder="Nomor Induk Umana'">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Umana'<span class="help"> e.x. "Ahmad Zeinuri"</label>
                    <input type="nama" id="" name="nama" class="form-control" placeholder="Nama">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tempat Lahir <span class="help">e.x. "Bondowoso"</span></label>
                    <input type="text" id="" name="tempat" class="form-control" placeholder="Kabupaten/Kota">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lhr" class="form-control" placeholder="">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Instansi</label>
                    <select class="form-control" name="instansi">
                      <option class="form-control">Pilih Instansi</option>
                      <?php
                      $db = __database();
                      $i = __ambil($db, "tb_instansi");
                      while ($a = $i->fetch_array()) {
                        echo "<option value= '$a[kd_instansi]'>$a[instansi]</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Status</label>
                    <select class="form-control" name="status">
                      <option class="form-control">Pilih Status</option>
                      <?php
                      $status = __ambil($db, "tb_status");
                      while ($b = $status->fetch_array()) {
                        echo "<option value= '$b[kd_status]'>$b[status]</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Jabatan</label>
                    <select class="form-control" name="jabatan">
                      <option class="form-control">Pilih Jabatan</option>
                      <?php
                      $jabatan = __ambil($db, "tb_jabatan");
                      while ($c = $jabatan->fetch_array()) {
                        echo "<option value= '$c[kd_jabatan]'>$c[nama_jabatan]</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat</label>
                    <textarea class="form-control" type="text" name="alamat" rows="5"></textarea>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Password</label>
                    <input type="password" id="" name="password" class="form-control" placeholder="Password">
                  </div>
                </div>
              </div>
              <button type="submit" name="simpan" value="simpan" class="btn btn-primary btn-sm ms-auto align-items-center">Simpan</button>
              <a type="submit" class="btn btn-warning btn-sm ms-auto align-items-center" href="sign-in.php">Kembali</a>
            </form>
            <?php
            if (@$_POST['simpan']) {
              $data = [
                'niu' => $_POST['niu'],
                'nama' => $_POST['nama'],
                'tmp_lahir' => $_POST['tempat'],
                'tgl_lahir' => $_POST['tgl_lhr'],
                'alamat' => $_POST['alamat'],
                'kd_instansi' => $_POST['instansi'],
                'kd_status' => $_POST['status'],
                'kd_jabatan' => $_POST['jabatan'],
                'password' => sha1($_POST['password'])


              ];
              $query = __simpan($db, "tb_umana", $data);
              if ($query) {

            ?>
                <script>
                  alert("Berhasil, Anda sudah terdaftar")
                  window.location.href = 'sign-in.php';
                </script>
            <?php
              } else {
                echo "Data gagal disimpan";
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            <?php include "../inc/footer.php"; ?>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>