<?php

include_once '../inc/_database.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
$db = __database();
$tgl = date('j/n/Y');
$jamcvk = date('H:i');
$niu = $_SESSION['id_user'];


$cekabs = $db->query("SELECT * FROM tb_absen WHERE niu='$niu' AND tanggal='$tgl'");
$adyata = $cekabs->num_rows;
if ($adyata > 0) {
    $abspulang = $db->query("SELECT * FROM tb_absen WHERE niu='$niu' AND tanggal='$tgl'");
    $r = $abspulang->fetch_array();
    if (empty($r['jam_pulang'])) {
        $pulang = $db->query("UPDATE tb_absen SET jam_pulang='$jamcvk' WHERE niu='$niu' AND tanggal='$tgl'");
?>
        <script>
            window.location.href = 'absen.php'
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Pulang',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            window.location.href = 'absen.php'
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work ',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
    }
} else {
    $query = $db->query(" INSERT INTO tb_absen (id, tanggal, niu, kd_instansi, kd_jabatan, jam_masuk) VALUES (NULL, '$tgl', '$niu', '$_POST[instansi]', '$_POST[jabatan]','$jamcvk')");
    ?>
    <script>
        window.location.href = 'absen.php'
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Terimakasih Masuk',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php
}
