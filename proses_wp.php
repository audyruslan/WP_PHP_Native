<?php
session_start();
$title = "Proses WP - InstaCode_WP";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Proses WP</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Proses WP</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Matriks X -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Matriks X</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Pendapatan Ortu</th>
                                        <th>Tanggungan Ortu</th>
                                        <th>Pengeluaran Ortu</th>
                                        <th>IPK</th>
                                        <th>Semester</th>
                                        <th>Tingkah Laku</th>
                                        <th>Keaktifan Organisasi</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $sql = "SELECT*FROM tb_penilaian ORDER BY stambuk ASC";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td align="center"><?= $row[2] ?></td>
                                            <td align="center"><?= $row[3] ?></td>
                                            <td align="center"><?= $row[4] ?></td>
                                            <td align="center"><?= $row[5] ?></td>
                                            <td align="center"><?= $row[6] ?></td>
                                            <td align="center"><?= $row[7] ?></td>
                                            <td align="center"><?= $row[8] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Vektor S -->


                <!--PERHITUNGAN VEKTOR S-->
                <?php
                $sql = "truncate table tb_perhitungan";
                $hasil = $conn->query($sql);

                $sql1 = "SELECT*FROM tb_penilaian";
                $hasil1 = $conn->query($sql1);


                ?>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Vektor S</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Stambuk</th>
                                        <th>Nama</th>
                                        <th>Vektor S</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $B1 = '';
                                $B2 = '';
                                $B3 = '';
                                $B4 = '';
                                $B5 = '';
                                $B6 = '';
                                $B7 = '';
                                $nilai = '';
                                $nama = '';
                                $x = 0;

                                $sql = "SELECT*FROM tb_bobot";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    $row = $hasil->fetch_row();
                                    $B1 = $row[1];
                                    $B2 = $row[2];
                                    $B3 = $row[3];
                                    $B4 = $row[4];
                                    $B5 = $row[5];
                                    $B6 = $row[6];
                                    $B7 = $row[7];
                                }

                                $sql = "truncate table tb_perhitungan";
                                $hasil = $conn->query($sql);

                                $sql = "SELECT*FROM tb_penilaian";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                        $nilai = round(pow($row[2], $B1) *
                                            pow($row[3], $B2) *
                                            pow($row[4], $B3) *
                                            pow($row[5], $B4) *
                                            pow($row[6], $B5) *
                                            pow($row[7], $B6) *
                                            pow($row[8], $B7), 2);
                                        $nama = $row[1];
                                        $stambuk = $row[0];
                                        $sql1 = "INSERT INTO tb_perhitungan(stambuk,nama,vektorS) values ('" . $stambuk . "','" . $nama . "','" . $nilai . "')";
                                        $hasil1 = $conn->query($sql1);
                                    }
                                }
                                $sql = "SELECT*FROM tb_perhitungan";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td>&nbsp&nbsp <?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[0] ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Vektor V -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Vektor V</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Stambuk</th>
                                        <th>Nama</th>
                                        <th>Vektor V</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $sql = "SELECT SUM(vektorS) FROM tb_perhitungan";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $total = $row[0];

                                $sql = "truncate table tb_perankingan";
                                $hasil = $conn->query($sql);

                                $sql = "SELECT*FROM tb_perhitungan";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                        $nilai = round($row[2] / $total, 4);
                                        $nama = $row[1];
                                        $stambuk = $row[0];
                                        $sql1 = "INSERT INTO tb_perankingan(stambuk,nama,vektorV) values ('" . $stambuk . "','" . $nama . "','" . $nilai . "')";
                                        $hasil1 = $conn->query($sql1);
                                    }
                                }

                                $sql = "SELECT*FROM tb_perankingan";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td>&nbsp&nbsp <?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[0] ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hasil Perangkingan -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hasil Perangkingan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Stambuk</th>
                                        <th>Nama</th>
                                        <th>Vektor</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $sql = "SELECT*FROM tb_perankingan ORDER BY vektorV DESC";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td>&nbsp&nbsp <?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[0] ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>

<?php
require 'layouts/footer.php';
?>