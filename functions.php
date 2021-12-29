<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "wp");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Hapus Data Mahasiwa
function hapus_mhs($stambuk)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE stambuk = '$stambuk'");
    return mysqli_affected_rows($conn);
}

// Hapus Data Penilaian
function hapus_penilaian($stambuk)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_penilaian WHERE stambuk = '$stambuk'");
    return mysqli_affected_rows($conn);
}

// Hapus Data Kriteria SAW
function hapus_bobot($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_kriteriasaw WHERE no = '$id'");
    return mysqli_affected_rows($conn);
}
