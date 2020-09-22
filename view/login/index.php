<?php 
  session_start(); 
  if (isset($_SESSION['idne'])) {
    header('Location: ../../view/home/index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; PPDB</title>

  <!-- General CSS Files -->
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
  <style type="text/css"> body { background-color: #fff; } </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <a href="../halaman"><img src="../../assets/img/avatar/icone.png" alt="logo" width="100" class="shadow-light rounded-circle"></a>
            </div>

            <?php
              if (isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
              }
            ?>

            <div class="card card-primary">
              <div class="card-header"><h4>Login Pegawai</h4></div>

              <div class="card-body">
                <form method="POST" action="../../controller/admin/login.php" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Silahkan isi Username Anda!
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Silahkan isi Password Anda!
                    </div>
                  </div>

                  <div class="form-group text-right">
                    <a href="../halaman" class="float-left mt-3">
                      <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" name="loginData" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Developer : <a href="//linkedin.com/in/bejosuseno" target="blank">Code Peka</a> 
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Page Specific JS File -->
</body>
</html>
