<?php
session_start();

// Cek apakah session 'loggedin' sudah ada dan bernilai true
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Jika belum login, arahkan pengguna kembali ke halaman login atau halaman index
    header('Location: index.php');
    exit;
}

else{
    // Memeriksa role pengguna yang diperbolehkan
    $allowed_roles = [2]; // Misalnya, role 1 adalah admin, role 2 adalah pengguna biasa
    $role = $_SESSION['role'];
    
    if ($role == $allowed_roles) {
        // Jika role pengguna tidak termasuk dalam allowed_roles, arahkan kembali ke halaman yang sesuai
        header('Location: index.php'); // Halaman untuk akses tidak diizinkan
        exit;
    }
}
?>