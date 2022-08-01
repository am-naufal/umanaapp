<?php

include_once '../inc/_database.php';
session_start();
$db = __database();
$tgl = date('j/n/Y');
$niu = $_SESSION['id_user'];


$cekabs = $db->query("SELECT * FROM tb_absen WHERE niu='$niu' AND tanggal='$tgl'");
$adyata = $cekabs->num_rows;
if ($adyata > 0) {
    $abspulang = $db->query("SELECT * FROM tb_absen WHERE niu='$niu' AND tanggal='$tgl'");
    $r = $abspulang->fetch_array();
    if (empty($r['jam_pulang'])) {
        $pulang = $db->query("UPDATE tb_absen SET jam_pulang='date(H:i)' WHERE niu='$niu' AND tanggal='$tgl'");
    } else {
?>
        <script>
            alert("Hari ini sudah Absen pulang");
            window.location.href = 'absen.php'
        </script>
    <?php
    }
} else {
    $query = $db->query(" INSERT INTO tb_absen (id, tanggal, niu, kd_instansi, kd_jabatan, jam_masuk) VALUES (NULL, '$tgl', '$niu', '$_POST[instansi]', '$_POST[jabatan]','date(H:i)')");
    ?>
    <script>
        alert("Hari ini sudah Absen masuk");
        window.location.href = 'absen.php'
    </script>
<?php
}
