<?php

if (@$_POST['masuk'] && @$_POST['pulang'] == null) {
    $date_ = date("d/n/Y");
    $jamcvk = date("H:i");
    $query = $db->query(" INSERT INTO tb_absen (id, tanggal, niu, kd_instansi, kd_jabatan, jam_masuk) VALUES (NULL, '$date_', '$_SESSION[id_user]', '$_POST[instansi]', '$_POST[jabatan]','$jamcvk')");
    if ($query) {
        echo "berhasil MASUK";
    } else {
        echo " GAGAL MASUK";
    }
} elseif (@$_POST['pulang'] == null) {
    $data = [
        'jam_pulang' => date("H:i")
    ];
    $wherepulang = [
        'tanggal' => date("d/n/Y"),
        'niu' =>  $_SESSION['id_user']
    ];
    $query = __update($db, "tb_absen", $data, $wherepulang);
    if ($query) {
        echo "berhasil pulang";
    } else {
        echo " GAGAL PULANG";
    }
} else {
?>
    <script>
        alert("Hari ini sudah Absen");
        window.location.href = 'absen.php'
    </script>
<?php
}


?>