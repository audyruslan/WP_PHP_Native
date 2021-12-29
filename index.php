<?php
$title = "Administrator - WP Dashboard";
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
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Mahasiswa</span>
              <span class="info-box-number">
                <?php
                $mhs = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_mahasiswa"));
                ?>
                <?= $mhs; ?>
                <small>Orang</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-table"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Penilaian</span>
              <span class="info-box-number">
                <?php
                $mhs = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_penilaian"));
                ?>
                <?= $mhs; ?>
                <small>Data</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-pie"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Bobot</span>
              <span class="info-box-number">
                <?php
                $mhs = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_bobot"));
                ?>
                <?= $mhs; ?>
                <small>Data</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="callout callout-danger">
            <h5>
              <i class="fas fa-bullhorn"></i> Sistem Pendukung Keputusan dengan Metode WP!
            </h5>

            <p>Sistem ini dapat membantu dalam menyeleksi dan memberikan pendukung terhadap suatu keputusan yang akan diambil, sistem ini juga bertujuan untuk menyediakan informasi, membimbing, memberikan prediksi serta mengarahkan kepada pengguna informasi agar dapat melakukan pengambilan keputusan dengan lebih baik..</p>
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