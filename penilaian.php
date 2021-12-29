<?php
session_start();
$title = "Penilaian - InstaCode_WP";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';

if (isset($_POST['simpan'])) {
    $stambuk = $_POST['stambuk'];
    $ipk = $_POST['ipk'];
    $Nama = '';
    $semester = $_POST['semester'];
    $Pendapatan_ortu = substr($_POST['pendapatan_ortu'], 1, 1);
    $Tanggungan_ortu = substr($_POST['tanggungan_ortu'], 1, 1);
    $Pengeluaran_ortu = substr($_POST['pengeluaran_ortu'], 1, 1);
    $Tingkah_laku = substr($_POST['tingkah_laku'], 1, 1);
    $keaktifan_organisasi = substr($_POST['keaktifanorganisasi'], 1, 1);
    if ($ipk == "") {
        echo "<script>
    alert('masih ada data yang kosong !');
    </script>";
    } else {
        $sql = "SELECT*FROM tb_penilaian WHERE stambuk='$stambuk'";
        $hasil = $conn->query($sql);
        if ($hasil->num_rows > 0) {
            $row = $hasil->fetch_row();
            echo "<script>
    alert('id $stambuk sudah ada !');
    </script>";
        } else {
            //get name
            $sql = "SELECT*FROM tb_mahasiswa WHERE stambuk='$stambuk'";
            $hasil = $conn->query($sql);
            $row = $hasil->fetch_row();
            $nama = $row[1];
            //insert name
            $sql = "INSERT INTO tb_penilaian(stambuk,nama,pendapatan_ortu,tanggungan_ortu,pengeluaran_ortu,ipk,semester,
      tingkahlaku,keaktifan_organisasi)
    values ('" . $stambuk . "','" . $nama . "','" . $Pendapatan_ortu . "','" . $Tanggungan_ortu . "','" . $Pengeluaran_ortu . "',
      '" . $ipk . "','" . $semester . "','" . $Tingkah_laku . "','" . $keaktifan_organisasi . "')";
            $hasil = $conn->query($sql);
            echo "<script>
    alert('berhasil di inputkan !');
    </script>";
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
                    <h1 class="m-0">Penilaian</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Penilaian</li>
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
                            <label for="stambuk">Stambuk</label>
                            <select class="form-control" name="stambuk" id="stambuk">
                                <option>--Silahkan Pilih--</option>
                                <?php
                                //load stambuk
                                $id = $_GET['id'];
                                $sql = "SELECT*FROM tb_mahasiswa";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                ?>
                                    <?php while ($row = mysqli_fetch_array($hasil)) :; {
                                        } ?>
                                        <option><?php echo $row[0]; ?></option>
                                    <?php endwhile; ?>
                            </select>
                        <?php } ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="ipk">IPK</label>
                            <input type="text" class="form-control" name="ipk" id="ipk" autocomplete="off" placeholder="Masukkan IPK">
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select class="form-control" name="semester" id="semester">
                                <option>--Silahkan Pilih--</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pendapatan_ortu">Pendapatan Orang Tua</label>
                            <select class="form-control" name="pendapatan_ortu" id="pendapatan_ortu">
                                <option>--Silahkan Pilih--</option>
                                <option>(1) <=500.000< /option>
                                <option>(2) >500.000-600.000</option>
                                <option>(3) >600.000-700.000</option>
                                <option>(4) >700.000-800.000</option>
                                <option>(5) >800.000-1.000.000</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tanggungan_ortu">Tanggungan Orang Tua</label>
                            <select class="form-control" name="tanggungan_ortu" id="tanggungan_ortu">
                                <option>--Silahkan Pilih--</option>
                                <option>(1) 1 Anak</option>
                                <option>(2) 2 Anak</option>
                                <option>(3) 3 Anak</option>
                                <option>(4) 4 Anak</option>
                                <option>(5) >5 Anak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pengeluaran_ortu">Pengeluaran Orang Tua</label>
                            <select class="form-control" name="pengeluaran_ortu" id="pengeluaran_ortu">
                                <option>--Silahkan Pilih--</option>
                                <option>(1) 0 s/d 500 rb</option>
                                <option>(2) > 500rb - 1jt</option>
                                <option>(3) > 1jt - 1,5jt</option>
                                <option>(4) > 1,5 jt - 2jt</option>
                                <option>(5) > 2jt</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tingkah_laku">Tingkah laku</label>
                            <select class="form-control" name="tingkah_laku" id="tingkah_laku">
                                <option>--Silahkan Pilih--</option>
                                <option>(3) Kurang baik</option>
                                <option>(4) Baik</option>
                                <option>(5) Sangat baik</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keaktifanorganisasi">Keaktifan Organisasi</label>
                            <select class="form-control" name="keaktifanorganisasi" id="keaktifanorganisasi">
                                <option>--Silahkan Pilih--</option>
                                <option>(3) Kurang baik</option>
                                <option>(4) Baik</option>
                                <option>(5) Sangat baik</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            </form>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Penilaian</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataMahasiswa" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Stambuk</th>
                                        <th>Nama</th>
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
                                $sql = mysqli_query($conn, "SELECT * FROM tb_penilaian");
                                while ($row = mysqli_fetch_row($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row[0]; ?></td>
                                        <td><?= $row[1]; ?></td>
                                        <td><?= $row[2]; ?></td>
                                        <td><?= $row[3]; ?></td>
                                        <td><?= $row[4]; ?></td>
                                        <td><?= $row[5]; ?></td>
                                        <td><?= $row[6]; ?></td>
                                        <td><?= $row[7]; ?></td>
                                        <td><?= $row[8]; ?></td>
                                        <td>
                                            <a class=" btn btn-danger btn-sm hapus_penilaian" href="hapus_penilaian.php?stambuk=<?= $row[0]; ?>"><i class="fas fa-trash"></i></a>
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