<?php
include "./../inc/koneksi.php";

$koneksi->query("DELETE FROM tb_jabatan WHERE kd_jabatan='$_GET[id]'");

header('location:tabel_jabatan.php');
