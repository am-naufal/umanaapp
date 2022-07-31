<?php
session_start();
$host = $_SERVER['HTTP_HOST'];
$host .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
if ($_SESSION['status_login'] == 'true') {
    if ($_SESSION['level'] == 'admin') {
        // buka dashboard admin

        header('location: http://' . $host . 'pages/home/home.php');
    } else if ($_SESSION['level'] == 'umana') {
        // buka acsess umana 
        header('location: http://' . $host . 'pages/login/absen.php');
    } else {
        header('location: http://' . $host . 'pages/login/sign-in.php');
    }
} else {
    //buka page login / sing-up

    header('location: http://' . $host . 'pages/login/sign-in.php');
}
