  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <strong>Copyright &copy; <?= date("Y"); ?> <a href="https://instacode.epizy.com">InstaCode.epizy.com</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 0.1
      </div>
  </footer>


  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/adminlte.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script>
      // DataTable
      $(function() {
          $("#dataMahasiswa").DataTable();
      });

      // Hapus Mahasiswa
      $(document).on('click', '.hapus_mhs', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Mahasiswa!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });

      // Hapus Penilaian
      $(document).on('click', '.hapus_penilaian', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Penilaian!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });

      // Hapus Bobot
      $(document).on('click', '.hapus_bobot', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Bobot/Kriteria!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });
  </script>
  <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
      <script>
          Swal.fire({
              title: '<?= $_SESSION['status'];  ?>',
              icon: '<?= $_SESSION['status_icon'];  ?>',
              text: '<?= $_SESSION['status_info'];  ?>'
          });
      </script>
  <?php
        unset($_SESSION['status']);
    }
    ?>
  </body>

  </html>