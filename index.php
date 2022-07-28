<?php
// include_once('pages/login/sign-in.php');

include "./inc/koneksi.php";
session_start();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'pages/login/sing-in.php';
header("Location: http://$host$uri/$extra");
// if (!empty($_SESSION['id_user'])) {

// } else {
//     if (file_exists('./aksi/login.php')) {
//         include "./aksi/absen.php";
//     } else {
//         echo "Konfigurasi tidak berhasil";
//     }
// }
