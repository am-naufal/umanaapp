<?php include "./../inc/koneksi.php"; ?>
<?php include "./../inc/sidebar.php"; ?>
<?php include "./../inc/header.php"; ?>

<!-- isi tabel -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Data Instansi</p>
                        <a class="btn btn-primary btn-sm ms-auto" href="form_instansi.php">Tambah</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kode Instansi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Instansi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Aksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "./../inc/koneksi.php";
                                $tampil = $koneksi->query("SELECT * FROM tb_instansi");
                                $no = 1;
                                while ($r = $tampil->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><span class="text-xs font-weight-bold" style="margin-left:  20px;"><?php echo $no; ?></span></td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['kd_instansi']; ?></td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['instansi']; ?></td>
                                        <td class="text-xs font-weight-bold opacity-7 ps-1" style="text-align:center;">
                                            <a class="btn btn-link text-dark px-3 mb-0" href="edit_instansi.php?id=<?php echo $r['kd_instansi']; ?>"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Ubah</a>
                                            
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./../inc/footer.php"; ?>
</div>