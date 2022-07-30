<?php
include "../inc/koneksi.php";

$koneksi->query("DELETE FROM tb_umana WHERE niu='$_GET[id]'");

header('location:tabel_umana.php');
