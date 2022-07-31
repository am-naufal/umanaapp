<?php
include "./../inc/koneksi.php";

$koneksi->query("DELETE FROM tb_instansi WHERE kd_instansi='$_GET[id]'");

header('location:tabel_instansi.php');