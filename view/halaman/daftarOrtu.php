<!-- Header -->
<?php
	session_start();
	$title = "Pendaftaran Peserta Didik Baru"; // Judulnya
	// require("../template/header.php"); // include headernya
	if (!isset($_SESSION['namaPeserta'])) {
		echo "<script>window.location.href = 'daftarSiswa.php';</script>";
		die();
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
      <?php if (isset($_SESSION['namaPeserta'])) { ?>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <!-- klo mau nambah menu notifikasi langsung ke websitenya aja (https://getstisla.com/) -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $_SESSION['namaPeserta']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
              <a href="../../controller/admin/daftar.php?logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>
            </div>
          </li>
        </ul>
      </nav>
      	
      <!-- SIDEBAR -->
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
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Pendatar</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="daftarSiswa.php">Data Siswa</a></li>
                  <li class="active"><a class="nav-link" href="daftarOrtu.php">Data Orang Tua</a></li>
                </ul>
              </li>
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <button class="btn btn-primary btn-lg btn-block btn-icon-split" onclick="cetak(<?= $_SESSION['nisnPeserta']; ?>)">
                <i class="fas fa-sign-out-alt"></i> Cetak Kartu Peserta
              </button>
            </div>
        </aside>
      </div>
      <?php } else { echo '<style>.main-content { padding-left: 30px; } .navbar { left: 30px; }</style>'; } ?>

      <!-- Main Content -->
      <div class="main-content">
          


<!-- Isinya -->

<section class="section">
  <div class="section-header">
    <h1><?= $title; ?></h1>
  </div>

  <?php
  	if (isset($_SESSION['alert'])) {
  		echo $_SESSION['alert'];
  		unset($_SESSION['alert']);
  	}
  ?>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- <h4>Basic DataTables</h4> -->
            <a href="index.php" type="button" class="btn btn-primary daterange-btn icon-left btn-icon">
              <i class="fas fa-arrow-left"></i> Halaman Utama 
            </a>
          </div>
          <div class="card-body">
          	
          	<!-- Jika ada session daftar -->
          	<?php if ($_SESSION['status_ortu'] == 0) { ?> 

          	<nav aria-label="breadcrumb">
              <ol class="breadcrumb bg-primary text-white-all">
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Orang Tua</li>
              </ol>
            </nav>

            <!-- Form Tambah Data Ortu -->
            <form class="needs-validation" novalidate="" action="../../controller/admin/daftar.php" method="POST">
		      <div class="modal-body">
		      	<!-- Peserta -->
		      	<div class="section-title mt-0 ">Data Peserta</div>
		      	<div class="form-group">
		          <label>Peserta</label>
			      <?php 
	          		include('../../config/connection.php');
	                $data = mysqli_query($conn, "SELECT Id_Identitas_Siswa FROM identitas_siswa WHERE NISN = '$_SESSION[nisnPeserta]'") or die(mysqli_error($conn));

	                if (mysqli_num_rows($data) != 1) { echo "<script>window.location.href = 'daftarSiswa.php';</script>"; }
	                
	                foreach ($data as $hmm) { 
	          	  ?>
			      <input type="text" class="form-control" required="" value="<?= $_SESSION['nisnPeserta'] ?> | <?= $_SESSION['namaPeserta'] ?>" disabled>
			      <input type="hidden" name="peserta" value="<?= $hmm['Id_Identitas_Siswa']; ?>">
			  	  <?php } ?>
			    </div>

		      	<!-- Ayah -->
		      	<div class="section-title mt-0 ">Data Ayah</div>
		        <div class="form-group">
		          <label>Nama Ayah</label>
		          <input type="text" class="form-control" name="nama_ayah" required="" >
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Status Ayah</label>
		          <input type="text" class="form-control" name="status_ayah" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Tanggal Lahir Ayah</label>
		          <input type="date" class="form-control" name="tanggal_lahir_ayah" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Telepon Ayah</label>
		          <input type="number" class="form-control" name="telepon_ayah" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pendidikan Terakhir Ayah</label>
		          <input type="text" class="form-control" name="pendidikan_terakhir_ayah" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pekerjaan Ayah</label>
		          <input type="text" class="form-control" name="pekerjaan_ayah" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Penghasilan Ayah</label>
		          <input type="number" class="form-control" name="penghasilan_ayah" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Alamat Ayah</label>
		          <textarea type="text" class="form-control" name="alamat_ayah" required="" style="height:80px"></textarea>
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>

		        <!-- Ibu -->
		        <div class="section-title mt-0 ">Data Ibu</div>
		        <div class="form-group">
		          <label>Nama Ibu</label>
		          <input type="text" class="form-control" name="nama_ibu" required="" >
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Status Ibu</label>
		          <input type="text" class="form-control" name="status_ibu" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Tanggal Lahir Ibu</label>
		          <input type="date" class="form-control" name="tanggal_lahir_ibu" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Telepon Ibu</label>
		          <input type="number" class="form-control" name="telepon_ibu" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pendidikan Terakhir Ibu</label>
		          <input type="text" class="form-control" name="pendidikan_terakhir_ibu" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pekerjaan Ibu</label>
		          <input type="text" class="form-control" name="pekerjaan_ibu" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Penghasilan Ibu</label>
		          <input type="number" class="form-control" name="penghasilan_ibu" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Alamat Ibu</label>
		          <textarea type="text" class="form-control" name="alamat_ibu" required="" style="height:80px"></textarea>
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>

		        <!-- Wali -->
		        <div class="section-title mt-0 ">Data Wali</div>
		        <div class="form-group">
		          <label>Nama Wali</label>
		          <input type="text" class="form-control" name="nama_wali" required="" >
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Status Wali</label>
		          <input type="text" class="form-control" name="status_wali" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Tanggal Lahir Wali</label>
		          <input type="date" class="form-control" name="tanggal_lahir_wali" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Telepon Wali</label>
		          <input type="number" class="form-control" name="telepon_wali" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pendidikan Terakhir Wali</label>
		          <input type="text" class="form-control" name="pendidikan_terakhir_wali" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pekerjaan Wali</label>
		          <input type="text" class="form-control" name="pekerjaan_wali" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Penghasilan Wali</label>
		          <input type="number" class="form-control" name="penghasilan_wali" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Alamat Wali</label>
		          <textarea type="text" class="form-control" name="alamat_wali" required="" style="height:80px"></textarea>
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <br>
		        <div class="modal-footer bg-whitesmoke br">
		          <button class="btn btn-primary" name="tambahDataOrtu">Simpan</button>
		        </div>
		      </div>
		    </form>
            <!-- penutup Form Tambah Data Ortu -->

            <!-- jika tidak ada session data peserta -->
        	<?php } else { ?>
          	
          	<?php 
          		$idne = $_SESSION['nisnPeserta'];
          		
          		include('../../config/connection.php');
                $data = mysqli_query($conn, "SELECT a.*, b.NISN, b.Id_Identitas_Siswa as id_identitas FROM orang_tua_wali a 
                										LEFT JOIN identitas_siswa b ON a.Id_Identitas_Siswa = b.Id_Identitas_Siswa 
                										WHERE b.NISN = '$idne'
											") or die(mysqli_error($conn));

                if (mysqli_num_rows($data) != 1) {
					// echo "<script>window.location.href = 'daftarOrtu.php';</script>";
				}

                foreach ($data as $row) { 
          	?>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb bg-primary text-white-all">
                <li class="breadcrumb-item active" aria-current="page">Ubah Data Orang Tua</li>
              </ol>
            </nav>

            <!-- Ubah Data -->
            <form class="needs-validation" novalidate="" action="../../controller/admin/daftar.php" method="POST">
		      <div class="modal-body">
		      	<!-- Id data -->
		      	<input type="hidden" name="id" value="<?= $row['Id_Orang_Tua_Wali']; ?>">

		      	<!-- Peserta -->
		      	<div class="section-title mt-0 ">Data Peserta</div>
		      	<div class="form-group">
		          <label>Peserta</label>
			      <?php 
	          		include('../../config/connection.php');
	                $data = mysqli_query($conn, "SELECT Id_Identitas_Siswa FROM identitas_siswa WHERE NISN = '$_SESSION[nisnPeserta]'") or die(mysqli_error($conn));

	                if (mysqli_num_rows($data) != 1) { echo "<script>window.location.href = 'daftarSiswa.php';</script>"; }
	                
	                foreach ($data as $hmm) { 
	          	  ?>
			      <input type="text" class="form-control" required="" value="<?= $_SESSION['nisnPeserta'] ?> | <?= $_SESSION['namaPeserta'] ?>" disabled>
			      <input type="hidden" name="peserta" value="<?= $hmm['Id_Identitas_Siswa']; ?>">
			  	  <?php } ?>
			    </div>

		      	<!-- Ayah -->
		      	<div class="section-title mt-0 ">Data Ayah</div>
		        <div class="form-group">
		          <label>Nama Ayah</label>
		          <input type="text" class="form-control" name="nama_ayah" required="" value="<?= $row['Nama_Ayah'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Status Ayah</label>
		          <input type="text" class="form-control" name="status_ayah" required="" value="<?= $row['Status_Ayah'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Tanggal Lahir Ayah</label>
		          <input type="date" class="form-control" name="tanggal_lahir_ayah" required="" value="<?= $row['Tgl_Lahir_Ayah'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Telepon Ayah</label>
		          <input type="number" class="form-control" name="telepon_ayah" required="" value="<?= $row['Telepon_Ayah'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pendidikan Terakhir Ayah</label>
		          <input type="text" class="form-control" name="pendidikan_terakhir_ayah" required="" value="<?= $row['Pendidikan_Terakhir_Ayah'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pekerjaan Ayah</label>
		          <input type="text" class="form-control" name="pekerjaan_ayah" required="" value="<?= $row['Pekerjaan_Ayah'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Penghasilan Ayah</label>
		          <input type="text" class="form-control" name="penghasilan_ayah" required="" value="<?= $row['Penghasilan_Ayah'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Alamat Ayah</label>
		          <textarea type="text" class="form-control" name="alamat_ayah" required="" style="height:80px"><?= $row['Alamat_Ayah'] ?></textarea>
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>

		        <!-- Ibu -->
		        <div class="section-title mt-0 ">Data Ibu</div>
		        <div class="form-group">
		          <label>Nama Ibu</label>
		          <input type="text" class="form-control" name="nama_ibu" required="" value="<?= $row['Nama_Ibu'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Status Ibu</label>
		          <input type="text" class="form-control" name="status_ibu" required="" value="<?= $row['Status_Ibu'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Tanggal Lahir Ibu</label>
		          <input type="date" class="form-control" name="tanggal_lahir_ibu" required="" value="<?= $row['Tgl_Lahir_Ibu'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Telepon Ibu</label>
		          <input type="number" class="form-control" name="telepon_ibu" required="" value="<?= $row['Telepon_Ibu'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pendidikan Terakhir Ibu</label>
		          <input type="text" class="form-control" name="pendidikan_terakhir_ibu" required="" value="<?= $row['Pendidikan_Terakhir_Ibu'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pekerjaan Ibu</label>
		          <input type="text" class="form-control" name="pekerjaan_ibu" required="" value="<?= $row['Pekerjaan_Ibu'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Penghasilan Ibu</label>
		          <input type="text" class="form-control" name="penghasilan_ibu" required="" value="<?= $row['Penghasilan_Ibu'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Alamat Ibu</label>
		          <textarea type="text" class="form-control" name="alamat_ibu" required="" style="height:80px"><?= $row['Alamat_Ibu'] ?></textarea>
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>

		        <!-- Wali -->
		        <div class="section-title mt-0 ">Data Wali</div>
		        <div class="form-group">
		          <label>Nama Wali</label>
		          <input type="text" class="form-control" name="nama_wali" required="" value="<?= $row['Nama_Wali'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Status Wali</label>
		          <input type="text" class="form-control" name="status_wali" required="" value="<?= $row['Status_Wali'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Tanggal Lahir Wali</label>
		          <input type="date" class="form-control" name="tanggal_lahir_wali" required="" value="<?= $row['Tgl_Lahir_Wali'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Telepon Wali</label>
		          <input type="number" class="form-control" name="telepon_wali" required="" value="<?= $row['Telepon_Wali'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pendidikan Terakhir Wali</label>
		          <input type="text" class="form-control" name="pendidikan_terakhir_wali" required="" value="<?= $row['Pendidikan_Terakhir_Wali'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Pekerjaan Wali</label>
		          <input type="text" class="form-control" name="pekerjaan_wali" required="" value="<?= $row['Pekerjaan_Wali'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Penghasilan Wali</label>
		          <input type="text" class="form-control" name="penghasilan_wali" required="" value="<?= $row['Penghasilan_Wali'] ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Alamat Wali</label>
		          <textarea type="text" class="form-control" name="alamat_wali" required="" style="height:80px"><?= $row['Alamat_Wali'] ?></textarea>
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <br>
		        <div class="modal-footer bg-whitesmoke br">
		          <button class="btn btn-primary" name="ubahDataOrtu">Simpan</button>
		        </div>
		      </div>
		    </form>
            <!-- penutup Ubah Data -->
        	<?php } ?>
        	<!-- Penutup Data peserta -->
        	<?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Penutup Isinya -->


<!-- Fungsi untuk cetak -->
<script type="text/javascript">
  function cetak(id) {
    window.open("../cetak/index.php?id=" + id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=100,width=900,height=460");
  }
</script>


<!-- Footer -->
          
      </div>
      <footer class="main-footer">
        <div class="footer-left">
        	Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
        	Developer : <a href="//linkedin.com/in/bejosuseno" target="blank">Code Peka</a> 
        </div>
      </footer>
    </div>
  </div>

</body>
</html>
