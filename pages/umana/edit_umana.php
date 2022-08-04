<?php include "../inc/koneksi.php"; ?>
<?php include "../inc/sidebar.php"; ?>
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
                <?php include "../inc/koneksi.php";
                $niu = $_GET['id'];
                $tampil = $koneksi->query("SELECT * FROM tb_umana AS u LEFT JOIN tb_instansi AS i ON u.kd_instansi=i.kd_instansi
                LEFT JOIN tb_status AS s ON u.kd_status=s.kd_status 
                LEFT JOIN tb_jabatan AS j ON u.kd_jabatan=j.kd_jabatan WHERE u.niu='$niu'");
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
                                    <option class="form-control" value="<?php echo $r->kd_instansi; ?>"><?php echo $r->instansi; ?> </option>";
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
                                    <option class="form-control" value="<?php echo $r->kd_status; ?>"><?php echo $r->status; ?> </option>";
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
                                    <option class="form-control" value="<?php echo $r->kd_jabatan; ?>"><?php echo $r->nama_jabatan; ?> </option>";
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Password</label>
                                <input type="password" id="" name="password" class="form-control" placeholder="Password Baru">
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
                                                        'password'='$_POST[password]'
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