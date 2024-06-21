<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}

$allowed_roles = 2;
$role = $_SESSION['role'];

if ($role != $allowed_roles) {
    header('Location: managePeminjaman.php');
    exit;
}

?>