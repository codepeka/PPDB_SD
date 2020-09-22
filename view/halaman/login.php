<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Stisla</title>
  <link rel="icon" href="../../assets/img/avatar/icone.png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../../assets/bootstrap-4/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../../assets/dataTables/css/dataTables.bootstrap4.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/components.css">

  <!-- General JS Scripts -->
  <script src="../../assets/bootstrap-4/js/jquery-3.3.1.min.js"></script>
  <!-- <script src="../../assets/bootstrap-4/js/popper.min.js"></script> -->
  <script src="../../assets/bootstrap-4/js/bootstrap.min.js"></script>
  <!-- <script src="../../assets/bootstrap-4/js/jquery.nicescroll.min.js"></script> -->
  <!-- <script src="../../assets/bootstrap-4/js/moment.min.js"></script> -->
  <script src="../../assets/js/stisla.js"></script>
  <script src="../../assets/dataTables/js/jquery.dataTables.js"></script>
  <script src="../../assets/dataTables/js/dataTables.bootstrap4.min.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../../assets/js/scripts.js"></script>
  <script src="../../assets/js/custom.js"></script>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="../../assets/img/avatar/icone.png" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Selamat datang di <span class="font-weight-bold">PPDB</span></h4>
            <p class="text-muted">Sebelum Anda memulai, Anda harus masuk atau mendaftar jika Anda belum memiliki akun.</p>
            <?php
              if (isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
              }
            ?>
            <form method="POST" action="../../controller/admin/daftar.php" class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="nisn">NISN</label>
                <input id="nisn" type="number" class="form-control" name="nisn" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Masukkan NISN anda!
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="tanggal_lahir" class="control-label">Password</label>
                </div>
                <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" tabindex="2" required>
                <div class="invalid-feedback">
                  Masukkan Tanggal Lahir anda!
                </div>
              </div>

              <div class="form-group text-right">
                <a href="index.php" class="float-left mt-3">
                  <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" name="loginDataPeserta" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

               <div class="mt-5 text-center">
                Belum punya akun? <a href="daftarSiswa.php">Daftar</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Developer : <a href="//linkedin.com/in/bejosuseno" target="blank">Code Peka</a> 
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../../assets/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

</body>
</html>
