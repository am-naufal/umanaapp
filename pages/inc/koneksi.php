<?php
$koneksi = new mysqli("localhost", "root", "", "absensi");

if (mysqli_connect_errno()) {
    trigger_error("tidak terhubung");
}
