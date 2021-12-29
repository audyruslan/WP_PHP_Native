<?php
session_start();
$title = "Alternatif - Data Mahasiswa";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';


if (isset($_POST['simpan'])) {
    $stambuk = $_POST['stambuk'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    if (($stambuk == "") or ($nama == "")) {
        echo "<script>
    alert('masih ada data yang kosong !');
    </script>";
    } else {
        $sql = "SELECT*FROM tb_mahasiswa WHERE stambuk='$stambuk'";
        $hasil = $conn->query($sql);
        if ($hasil->num_rows > 0) {
            $row = $hasil->fetch_row();
            echo "<script>
    alert('id $stambuk sudah ada !');
    </script>";
        } else {
            $sql = "INSERT INTO tb_mahasiswa(stambuk,nama,jenis_kelamin,jurusan)
    values ('" . $stambuk . "','" . $nama . "','" . $jk . "','" . $jurusan . "')";
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
                    <h1 class="m-0">Data Mahasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Alternatif</a></li>
                        <li class="breadcrumb-item active">Data Mahasiswa</li>
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
                <div class="form-group row">
                    <label for="stambuk" class="col-2 col-form-label">Stambuk</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="stambuk" id="stambuk" autocomplete="off" placeholder="Masukkan Stambuk">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-2 col-form-label">Nama</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" placeholder="Masukkan Nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-3">
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option>--Silahkan Pilih--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jurusan" class="col-2 col-form-label">Jurusan</label>
                    <div class="col-3">
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option>--Silahkan Pilih--</option>
                            <option value="Sipil">Sipil</optionX>
                            <option value="Arsitek">Arsitek</optionX>
                            <option value="Elektro">Elektro</optionX>
                            <option value="Mesin">Mesin</optionX>
                            <option value="Teknologi Informasi">Teknologi Informasi</optionX>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            </form>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataMahasiswa" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Stambuk</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM tb_mahasiswa");
                                while ($row = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['stambuk']; ?></td>
                                        <td><?= $row['jenis_kelamin']; ?></td>
                                        <td><?= $row['jurusan']; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-sm ubah" data-toggle="modal" data-target="#EditModalLayanan<?= $row["stambuk"]; ?>"><i class="fas fa-edit"></i></a>
                                            <a class=" btn btn-danger btn-sm hapus_mhs" href="hapus_mhs.php?stambuk=<?= $row["stambuk"]; ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr> <!-- Edit Modal -->
                                    <div class="modal fade" id="EditModalLayanan<?= $row["stambuk"]; ?>" tabindex="-1" role="dialog" aria-labelledby="#EditModalLayananLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="EditModalLayananLabel">Ubah Data Mahasiswa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="ubah_mhs.php" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="stambuk" value="<?= $row["stambuk"]; ?>">
                                                        <div class="form-group">
                                                            <label for="nama">Masukkan Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" autocomplete="off" value="<?= $row["nama"]; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                                <option>--Silahkan Pilih--</option>
                                                                <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == "Laki-laki") echo 'selected="selected"'; ?>>Laki-laki</option>
                                                                <option value="Perempuan" <?php if ($row['jenis_kelamin'] == "Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jurusan">Jurusan</label>
                                                            <select class="form-control" name="jurusan" id="jurusan">
                                                                <option>--Silahkan Pilih--</option>
                                                                <option value="Sipil" <?php if ($row['jurusan'] == "Sipil") echo 'selected="selected"'; ?>>Sipil</option>
                                                                <option value="Arsitek" <?php if ($row['jurusan'] == "Arsitek") echo 'selected="selected"'; ?>>Arsitek</option>
                                                                <option value="Elektro" <?php if ($row['jurusan'] == "Elektro") echo 'selected="selected"'; ?>>Elektro</option>
                                                                <option value="Mesin" <?php if ($row['jurusan'] == "Mesin") echo 'selected="selected"'; ?>>Mesin</option>
                                                                <option value="Teknologi Informasi" <?php if ($row['jurusan'] == "Teknologi Informasi") echo 'selected="selected"'; ?>>Teknologi Informasi</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                        <button type="submit" name="ubah" class="btn btn-success">Ubah!</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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