<?php include "../inc/sidebar.php"; ?>
<?php include "../inc/header.php"; ?>

<!-- isi table -->

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Data Absensi</p>
                        <a class="btn btn-primary btn-sm ms-auto" href="form_umana.php">Tambah</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIU</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Instansi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jabatan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jam Masuk</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jam Pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../inc/_database.php";
                                $db = __database();
                                $join = [
                                    "LEFT JOIN tb_umana AS u ON a.niu=u.niu",
                                    "LEFT JOIN tb_instansi AS i ON a.kd_instansi=i.kd_instansi",
                                    "LEFT JOIN tb_jabatan AS j ON a.kd_jabatan=j.kd_jabatan"
                                ];
                                $show = __ambil($db, "tb_absen AS a", null, null, $join);
                                $no = 1;
                                while ($r = $show->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><span class="text-xs font-weight-bold" style="margin-left:  20px;"><?php echo $no; ?></span></td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['tanggal']; ?></td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['niu']; ?></td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['nama']; ?></td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['instansi']; ?></td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['nama_jabatan']; ?></td>
                                        <td class="align-middle text-sm">
                                            <?php if (empty($r['jam_pulang'])) {

                                                echo '<span class="badge badge-sm bg-gradient-success">Hadir</span>';
                                            } else {
                                                echo '<span class="badge badge-sm bg-gradient-warning">Pulang</span>';
                                            } ?>
                                        </td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['jam_masuk']; ?></td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['jam_pulang']; ?></td>
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
    <?php include "../inc/footer.php"; ?>
</div>