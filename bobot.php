<?php
session_start();
$title = "Bobot/Kriteria - InstaCode_WP";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';

if (isset($_POST['simpan'])) {
    $pendapatan_ortu = $_POST['pendapatan_ortu'];
    $tanggungan_ortu = $_POST['tanggungan_ortu'];
    $pengeluaran_ortu = $_POST['pengeluaran_ortu'];
    $ipk = $_POST['ipk'];
    $semester = $_POST['semester'];
    $tingkah_laku = $_POST['tingkah_laku'];
    $keaktifan_organisasi = $_POST['keaktifanorganisasi'];
    $total = $pendapatan_ortu + $tanggungan_ortu + $pengeluaran_ortu + $ipk + $semester + $tingkah_laku + $keaktifan_organisasi;
    if (($pendapatan_ortu == "") or
        ($tanggungan_ortu == "") or
        ($pengeluaran_ortu == "") or
        ($ipk == "") or
        ($semester == "") or
        ($tingkah_laku == "") or
        ($keaktifan_organisasi == "")
    ) {
        echo "<script>
    alert('data tidak lengkap, ulangi penginputan !');
    </script>";
    } else {
        $sql = "SELECT*FROM tb_bobot";
        $hasil = $conn->query($sql);
        if ($hasil->num_rows > 0) {
            echo "<script>
    alert('bobot sudah ada, ubah atau hapus untuk membuat bobot baru !');
    </script>";
        } else {
            if ($total != 1) {
                echo "<script>
    alert('jumlah bobot tidak sama dengan 1. ulangi penginputan bobot !');
    </script>";
            } else {
                $sql = "INSERT INTO tb_bobot(pendapatan_ortu,tanggungan_ortu,pengeluaran_ortu,ipk,semester,tingkah_laku,keaktifan_organisasi)
      values ('" . $pendapatan_ortu . "',
      '" . $tanggungan_ortu . "',
      '" . $pengeluaran_ortu . "',
      '" . $ipk . "',
      '" . $semester . "',
      '" . $tingkah_laku . "',
      '" . $keaktifan_organisasi . "')";
                $hasil = $conn->query($sql);
                echo "<script>
      alert('berhasil di inputkan !');
      </script>";
            }
        }
    }
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bobot/Kriteria</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Bobot/Kriteria</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="ipk">IPK</label>
                            <input type="text" class="form-control" name="ipk" id="ipk" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input type="text" class="form-control" name="semester" id="semester" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="pendapatan_ortu">Pendapatan Orang Tua</label>
                            <input type="text" class="form-control" name="pendapatan_ortu" id="pendapatan_ortu" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="tanggungan_ortu">Tanggungan Orang Tua</label>
                            <input type="text" class="form-control" name="tanggungan_ortu" id="tanggungan_ortu" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="pengeluaran_ortu">Pengeluaran Orang Tua</label>
                            <input type="text" class="form-control" name="pengeluaran_ortu" id="pengeluaran_ortu" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="tingkah_laku">Tingkah laku</label>
                            <input type="text" class="form-control" name="tingkah_laku" id="tingkah_laku" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="keaktifanorganisasi">Keaktifan Organisasi</label>
                            <input type="text" class="form-control" name="keaktifanorganisasi" id="keaktifanorganisasi" autocomplete="off">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            </form>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Bobot</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataMahasiswa" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pendapatan Ortu</th>
                                        <th>Tanggungan Ortu</th>
                                        <th>Pengeluaran Ortu</th>
                                        <th>IPK</th>
                                        <th>Semester</th>
                                        <th>Tingkah Laku</th>
                                        <th>Keaktifan Organisasi</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM tb_bobot");
                                while ($row = mysqli_fetch_row($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row[1]; ?></td>
                                        <td><?= $row[2]; ?></td>
                                        <td><?= $row[3]; ?></td>
                                        <td><?= $row[4]; ?></td>
                                        <td><?= $row[5]; ?></td>
                                        <td><?= $row[6]; ?></td>
                                        <td><?= $row[7]; ?></td>
                                        <td>
                                            <a class=" btn btn-danger btn-sm hapus_bobot" href="hapus_bobot.php?id=<?= $row[0]; ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>

                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php
require 'layouts/footer.php';
?>