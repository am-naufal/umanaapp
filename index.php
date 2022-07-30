<?php
include_once "../../inc/koneksi.php";
session_start();
$host = $_SERVER['HTTP_HOST'];
$host .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
if ($_SESSION['status_login'] == 'true') {
    if ($_SESSION['level'] == 'admin') {
        // buka dashboard admin
        header('location: http://' . $host . 'home/home.php');
    } elseif ($_SESSION['level'] == 'umana') {
        // buka acsess umana 
        header('location: http://' . $host . 'pages/login/absen.php');
    }
} else {
    //buka page login / sing-up
    header('location: http://' . $host . 'pages/login/sign-in.php');
}

?>

<!-- // if (!empty($_SESSION['id_user'])) {

// } else {
// if (file_exists('./aksi/login.php')) {
// include "./aksi/absen.php";
// } else {
// echo "Konfigurasi tidak berhasil";
// }
// } -->