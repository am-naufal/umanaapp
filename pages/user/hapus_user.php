<?php
include "../inc/koneksi.php";

$koneksi->query("DELETE FROM tb_user WHERE id_user='$_GET[id]'");

header('location:tabel_user.php');
