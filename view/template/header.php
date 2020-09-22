<?php 
  session_start(); 
  if (!isset($title)) { $title = ""; } 

  if (!isset($_SESSION['idne'])) {
    // echo "string"; die();
    echo "<script>window.location.href = '../../view/login/index.php';</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?> | PPDB</title>
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
  <script src="../../assets/bootstrap-4/js/popper.min.js"></script>
  <script src="../../assets/bootstrap-4/js/bootstrap.min.js"></script>
  <script src="../../assets/bootstrap-4/js/jquery.nicescroll.min.js"></script>
  <script src="../../assets/bootstrap-4/js/moment.min.js"></script>
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
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <!-- klo mau nambah menu notifikasi langsung ke websitenya aja (https://getstisla.com/) -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $_SESSION['nama']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
              <a href="../../controller/admin/login.php?logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href=""><img src="../../assets/img/avatar/icone.png" alt="LP" width="30px"> PPDB</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href=""><img src="../../assets/img/avatar/icone.png" alt="LP" width="47px"></a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Menu</li>
              <li <?php if ($title == "Dashboard") { echo 'class="active"'; } ?>><a class="nav-link" href="../home"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class="nav-item dropdown <?php if ($title == "Data Siswa" || $title == "Data Orang Tua") { echo 'active'; } ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Pendatar</span></a>
                <ul class="dropdown-menu">
                  <li <?php if ($title == "Data Siswa") { echo 'class="active"'; } ?>><a class="nav-link" href="../siswa/tampilData.php">Data Siswa</a></li>
                  <li <?php if ($title == "Data Orang Tua") { echo 'class="active"'; } ?>><a class="nav-link" href="../ortu/tampilData.php">Data Orang Tua</a></li>
                </ul>
              </li>
              <li <?php if ($title == "Administrasi") { echo 'class="active"'; } ?>><a class="nav-link" href="../administrasi/tampilData.php"><i class="fas fa-money-bill-alt"></i> <span>Administrasi</span></a></li>
              <li <?php if ($title == "Cetak Kartu") { echo 'class="active"'; } ?>><a class="nav-link" href="../cetak/tampilData.php"><i class="fas fa-file-alt"></i> <span>Cetak Kartu</span></a></li>

              <?php if ($_SESSION['hak'] == 'admin') : ?>
              <li <?php if ($title == "Pengguna") { echo 'class="active"'; } ?>><a class="nav-link" href="../user/tampilData.php"><i class="fas fa-users"></i> <span>Pengguna</span></a></li>
              <?php endif; ?>
            </ul>

            <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div> -->
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
          