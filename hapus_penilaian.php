<?php
session_start();
require 'functions.php';

$stambuk = $_GET["stambuk"];

if (hapus_penilaian($stambuk) > 0) {
    $_SESSION['status'] = "Data Penilaian";
    $_SESSION['status_icon'] = "success";
    $_SESSION['status_info'] = "Berhasil Dihapus";
    header("Location: penilaian.php");
} else {
    $_SESSION['status'] = "Data Penilaian";
    $_SESSION['status_icon'] = "error";
    $_SESSION['status_info'] = "Gagal Dihapus";
    header("Location: penilaian.php");
}
