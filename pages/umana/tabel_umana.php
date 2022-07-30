<?php include "../inc/koneksi.php"; ?>
<?php include "../inc/sidebar.php"; ?>
<?php include "../inc/header.php"; ?>

<!-- isi table -->

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Data Umana</p>
                        <a class="btn btn-primary btn-sm ms-auto" href="form_umana.php">Tambah</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIU</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tempat, Tgl. Lahir</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Instansi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jabatan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Aksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "./../inc/koneksi.php";
                                $tampil = $koneksi->query("SELECT * FROM tb_umana AS a
                                                                    LEFT JOIN tb_instansi AS b ON a.kd_instansi=b.kd_instansi
                                                                    LEFT JOIN tb_status AS c ON a.kd_status=c.kd_status
                                                                    LEFT JOIN tb_jabatan AS d ON a.kd_jabatan=d.kd_jabatan");
                                $no = 1;
                                while ($r = $tampil->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><span class="text-xs font-weight-bold" style="margin-left:  20px;"><?php echo $no; ?></span></td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['niu']; ?></td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['nama']; ?></td>
                                        <td class="text-sm font-weight-bold mb-0"><?php echo $r['tmp_lahir'] . ", " . $r['tgl_lahir']; ?></td>
                                        <td class="text-xs font-weight-bold mb-0 "><?php echo $r['instansi']; ?></td>
                                        <td class="text-xs font-weight-bold mb-0 "><?php echo $r['nama_jabatan']; ?></td>
                                        <td class="align-middle text-sm">
                                            <span class="badge badge-sm bg-gradient-secondary"><?php echo $r['status']; ?></span>
                                        </td>
                                        <td class="text-sm font-weight-bold mb-0 "><?php echo $r['alamat']; ?></td>
                                        <td class="text-xs font-weight-bold opacity-7 ps-1" style="text-align:center;">
                                            <a class="btn btn-link text-dark px-3 mb-0" href="edit_umana.php?id=<?php echo $r['niu']; ?>"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Ubah</a>
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="hapus.php?id=<?php echo $r['niu']; ?>"><i class="far fa-trash-alt me-2"></i>Hapus</a>
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
    <?php include "../inc/footer.php"; ?>
</div>