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
                        Edit Instansi
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
                <?php include "./../inc/koneksi.php";
                $tampil = $koneksi->query("SELECT * FROM tb_instansi WHERE kd_instansi='$_GET[id]'");
                $r = $tampil->fetch_object();
                ?>
                <form class="card-body" method="post" action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kode Instansi<span class="help"> e.x. "12345678"</span></label>
                                <input type="text" id="" name="kd_instansi" class="form-control" value="<?php echo $r->kd_instansi; ?>" placeholder="Kode Instansi" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Instansi<span class="help"> e.x. "Madrasah Aliyah"</label>
                                <input type="text" id="" name="instansi" class="form-control" value="<?php echo $r->instansi; ?>" placeholder="Instansi">
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary btn-sm ms-auto align-items-center">Simpan</button>
                    <a type="submit" name="simpan" value="simpan" class="btn btn-warning btn-sm ms-auto align-items-center" href="tabel_instansi.php">Kembali</a>
                </form>
                <?php
                if (@$_POST['simpan']) {
                    $query = $koneksi->query("UPDATE tb_instansi SET instansi='$_POST[instansi]' 
                                                        WHERE kd_instansi='$_POST[kd_instansi]'");
                    if ($query) {
                ?>
                        <script>
                            setTimeout(sweetal, 10)

                            function sweetal() {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Berhasil Simpan',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            }
                            window.location.href = 'tabel_instansi.php';
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
    <?php include "./../inc/footer.php"; ?>
</div>