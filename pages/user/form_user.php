<?php include_once "../inc/_database.php";
include_once "../inc/sidebar.php";
$db = __database();
?>
<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
        <div class="row gx-4">
            <div class="col-auto">
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Edit User
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        PP. Salafiyah Syafi'iyah Sukorejo
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form umana -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                </div>
                <form class="card-body" method="post" action="">
                    <div class="row">
                        <input type="hidden" id="" name="id_user" class="form-control" placeholder=" ID'" readonly>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Admin'<span class="help"> e.x. "Ahmad Zeinuri"</label>
                                <input type="text" id="" name="username" class="form-control" placeholder="Nama Admin">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Password</label>
                                <input type="password" id="" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Level</label>
                                <input type="text" id="" name="level" value="admin" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary btn-sm ms-auto align-items-center">Simpan</button>
                    <a type="submit" name="kembali" value="kembali" class="btn btn-warning btn-sm ms-auto align-items-center" href="tabel_user.php">Kembali</a>
                </form>
                <?php
                if (@$_POST['simpan']) {
                    $data = [
                        'id_user' => null,
                        'username' => $_POST['username'],
                        'level' => $_POST['level'],
                        'password' => sha1($_POST['password'])
                    ];
                    $save = __simpan($db, "tb_user", $data);

                    if ($save) {

                ?>
                        <script>
                            window.location.href = 'tabel_user.php';
                        </script>
                <?php
                    } else {
                        echo "Data gagal disimpan";
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                <img src="../../assets/img/kantor pusat.jpg" alt="Image placeholder" class="card-img-top">
                <div class="card-body pt-0">
                    <div class="text-center mt-4">
                        <h5>
                            <span class="font-weight-light">Alamat </span>Sekretariat
                        </h5>
                        <div class="h6 font-weight-300">
                            <i class="ni location_pin mr-2"></i>Kantor Pusat PP. Salafiyah Syafi'iyah Sukorejo
                        </div>
                        <div class="h6 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>Jl. KHR. Syamsul Arifin, Sukorejo, Sumberejo, Kec. Banyuputih
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>Kabupaten Situbondo, Jawa Timur 68374
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../inc/footer.php"; ?>
</div>