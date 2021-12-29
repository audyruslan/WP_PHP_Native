<?php
session_start();
require 'functions.php';

$stambuk = $_GET["stambuk"];

if (hapus_mhs($stambuk) > 0) {
    $_SESSION['status'] = "Data Mahasiswa";
    $_SESSION['status_icon'] = "success";
    $_SESSION['status_info'] = "Berhasil Dihapus";
    header("Location: alternatif.php");
} else {
    $_SESSION['status'] = "Data Mahasiswa";
    $_SESSION['status_icon'] = "error";
    $_SESSION['status_info'] = "Gagal Dihapus";
    header("Location: alternatif.php");
}
