<?php
session_start();
include "../inc/_database.php";
$db = __database();
$username = $_POST['user'];
$password = sha1($_POST['password']);
$password1 = $_POST['password'];
// cek apakah user login admin
$where = ['username' => $username, 'password' => $password];
$cekUsers = __ambil($db, "tb_user", "*", $where);
if ($cekUsers->num_rows > 0) {
    $r = $cekUsers->fetch_object();
    $_SESSION['id_user'] = $r->id_user;
    $_SESSION['username'] = $r->username;
    $_SESSION['level'] = 'admin';
    $_SESSION['status_login'] = true;
    echo " 
    <script> window.location.href='../home/home.php'</script>
    ";
} else {
    $where = ['nama' => $username, 'password' => $password];
    $cekUmanaa = __ambil($db, "tb_umana", "*", $where);
    if ($cekUmanaa->num_rows > 0) {
        $p = $cekUmanaa->fetch_object();
        $_SESSION['id_user'] = $p->niu;
        $_SESSION['nama'] = $p->nama;
        $_SESSION['level'] = 'umana';
        $_SESSION['status_login'] = true;
        echo " <script> window.location.href='../dataabsen/absen.php'
        </script>";
    } else {
        $whereumana = [
            'nama' => $username,
            'tgl_lahir' => $password1
        ];
        $cekumana = __ambil($db, "tb_umana", "*", $whereumana);
        if ($cekumana->num_rows > 0) {
            $p = $cekumana->fetch_object();
            $_SESSION['id_user'] = $p->niu;
            $_SESSION['nama'] = $p->nama;
            $_SESSION['level'] = 'umana';
            $_SESSION['status_login'] = true;
            echo " <script> window.location.href='../dataabsen/absen.php'
             </script>";
        } else {
            echo " 
                    <script>
                    alert('Maaf, Anda tidak memiliki akses ke sistem');
                    window.location.href='sign-in.php';
                    </script>";
        }
    }
}
