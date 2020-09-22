<!-- Header -->
<?php
  $title = "Pengguna"; // Judulnya
  require("../template/header.php"); // include headernya

  // Jika bukan admin
  if ($_SESSION['hak'] != 'admin') {
    echo "<script>window.location.href = '../../view/home/index.php';</script>";
  }

  if (!isset($_GET['id'])) {
  	echo "<script>window.location.href = 'tampilData.php';</script>";
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
          	
          	<div class="section-title mt-0 ml-4">Ubah Data Pengguna</div>

          	<?php 
          		include('../../config/connection.php');
                $data = mysqli_query($conn, "SELECT * FROM user WHERE id = '$_GET[id]'") or die(mysqli_error($conn));

                if (mysqli_num_rows($data) != 1) {
					echo "<script>window.location.href = 'tampilData.php';</script>";
				}

                foreach ($data as $row) { 
          	?>

            <!-- Ubah Data -->
            <form class="needs-validation" novalidate="" action="../../controller/admin/user.php" method="POST">
		      <div class="modal-body">
		      	<!-- Id data -->
		      	<input type="hidden" name="id" value="<?= $row['id']; ?>">

		        <div class="form-group">
		          <label>Nama Lengkap</label>
		          <input type="text" class="form-control" name="nama" required="" minlength="8" value="<?= $row['nama']; ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Minimal 8 kata</div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Username</label>
		          <input type="text" class="form-control" name="username" required="" minlength="8" value="<?= $row['username']; ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Minimal 8 kata</div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Password</label>
		          <input type="password" class="form-control" name="password" required="" minlength="8" value="<?= $row['password']; ?>">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Minimal 8 kata </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group mb-0">
		          <label>Hak</label>
		          <select class="form-control" name="hak" required="">
		            <option value=""> ~~~ PILIH HAK AKSESNYA ~~~ </option>
		            <option value="admin" <?php if ($row['hak'] == 'admin') { echo 'selected'; } ?>>Admin</option>
		            <option value="pegawai" <?php if ($row['hak'] == 'pegawai') { echo 'selected'; } ?>>Pegawai</option>
		          </select>
		          <!-- Validation -->
		          <div class="valid-feedback"> Bagus! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <br>
		        <div class="modal-footer bg-whitesmoke br">
		          <a href="tampilData.php" type="button" class="btn btn-secondary">Batal</a>
		          <button class="btn btn-primary" name="ubahData">Simpan</button>
		        </div>
		      </div>
		    </form>
            <!-- penutup Tambah Data -->

        	<?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- hmm -->
  </div>
</section>

<!-- Penutup Isinya -->



<!-- Footer -->
<?php require("../template/footer.php");?>