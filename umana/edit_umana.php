<?php include "./../inc/koneksi.php"; ?>
<?php include "./../inc/sidebar.php"; ?>
<!-- End Navbar -->
<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
        <div class="row gx-4">
            <div class="col-auto">
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Edit Identitas Umana'
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        PP. Salafiyah Syafi'iyah Sukorejo
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                <i class="ni ni-app"></i>
                                <span class="ms-2">App</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-email-83"></i>
                                <span class="ms-2">Messages</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-settings-gear-65"></i>
                                <span class="ms-2">Settings</span>
                            </a>
                        </li>
                    </ul>
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
                <?php include "./../inc/koneksi.php";
                $tampil = $koneksi->query("SELECT * FROM tb_umana WHERE niu='$_GET[id]'");
                $r = $tampil->fetch_object();
                ?>
                <form class="card-body" method="post" action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor Induk Umana'(NIU)<span class="help"> e.x. "2020503009"</span></label>
                                <input type="text" id="" name="niu" class="form-control" value="<?php echo $r->niu; ?>" placeholder="Nomor Induk Umana'" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Umana'<span class="help"> e.x. "Ahmad Zeinuri"</label>
                                <input type="nama" id="" name="nama" class="form-control" value="<?php echo $r->nama; ?>" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tempat Lahir <span class="help">e.x. "Bondowoso"</span></label>
                                <input type="text" id="" name="tempat" class="form-control" value="<?php echo $r->tmp_lahir; ?>" placeholder="Kabupaten/Kota">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lhr" class="form-control" value="<?php echo $r->tgl_lahir; ?>" placeholder="placeholder">
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
                                    $instansi = $koneksi->query("SELECT * FROM tb_instansi");
                                    while ($a = $instansi->fetch_array()) {
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
                                    $status = $koneksi->query("SELECT * FROM tb_status");
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
                                    $jabatan = $koneksi->query("SELECT * FROM tb_jabatan");
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
                                <textarea class="form-control" name="alamat" rows="5"><?php echo $r->alamat; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary btn-sm ms-auto align-items-center">Simpan</button>
                    <a type="submit" name="simpan" value="simpan" class="btn btn-warning btn-sm ms-auto align-items-center" href="tabel_umana.php">Kembali</a>
                </form>
                <?php
                if (@$_POST['simpan']) {
                    $query = $koneksi->query("UPDATE tb_umana SET nama='$_POST[nama]',
                                                        tmp_lahir= '$_POST[tempat]',
                                                        tgl_lahir='$_POST[tgl_lhr]',
                                                        alamat='$_POST[alamat]',
                                                        kd_instansi='$_POST[instansi]',
                                                        kd_status='$_POST[status]',
                                                        kd_jabatan='$_POST[jabatan]'
                                                        WHERE niu='$_POST[niu]'");

                    if ($query) {
                ?>
                        <script>
                            window.location.href = 'tabel_umana.php';
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
                <img src="../assets/img/kantor pusat.jpg" alt="Image placeholder" class="card-img-top">
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
    <?php include "./../inc/footer.php"; ?>
</div>