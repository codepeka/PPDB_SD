<!-- Header -->
<?php
  $title = "Pengguna"; // Judulnya
  require("../template/header.php"); // include headernya

  if ($_SESSION['hak'] != 'admin') {
    echo "<script>window.location.href = '../../view/home/index.php';</script>";
  }
?>



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
            <a href="tampilData.php" type="button" class="btn btn-primary daterange-btn icon-left btn-icon">
              <i class="fas fa-arrow-left"></i> Kembali 
            </a>
          </div>
          <div class="card-body">
          	
          	<div class="section-title mt-0 ml-4">Tambah Data Pengguna</div>

            <!-- Tambah Data -->
            <form class="needs-validation" novalidate="" action="../../controller/admin/user.php" method="POST">
		      <div class="modal-body">
		        <div class="form-group">
		          <label>Nama Lengkap</label>
		          <input type="text" class="form-control" name="nama" required="" minlength="8">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Minimal 8 kata</div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Username</label>
		          <input type="text" class="form-control" name="username" required="" minlength="8">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Minimal 8 kata</div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Password</label>
		          <input type="password" class="form-control" name="password" required="" minlength="8">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Minimal 8 kata </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group mb-0">
		          <label>Hak</label>
		          <select class="form-control" name="hak" required="">
		            <option value=""> ~~~ PILIH HAK AKSESNYA ~~~ </option>
		            <option value="admin">Admin</option>
		            <option value="pegawai">Pegawai</option>
		          </select>
		          <!-- Validation -->
		          <div class="valid-feedback"> Bagus! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <br>
		        <div class="modal-footer bg-whitesmoke br">
		          <a href="tampilData.php" type="button" class="btn btn-secondary">Batal</a>
		          <button class="btn btn-primary" name="tambahData">Simpan</button>
		        </div>
		      </div>
		    </form>
            <!-- penutup Tambah Data -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Penutup Isinya -->



<!-- Footer -->
<?php require("../template/footer.php");?>