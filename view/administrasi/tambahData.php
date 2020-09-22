<!-- Header -->
<?php
	$title = "Administrasi"; // Judulnya
	require("../template/header.php"); // include headernya
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
          	
          	<div class="section-title mt-0 ml-4">Tambah Data Administrasi</div>

            <!-- Tambah Data -->
            <form class="needs-validation" novalidate="" action="../../controller/admin/administrasi.php" method="POST">
		      <div class="modal-body">
		      	<!-- Peserta -->
		      	<div class="form-group">
		          <label>Peserta</label>
			      <select class="form-control" name="peserta" required="">
			        <option value=""> ~~~ PILIH PESERTA ~~~ </option>
			        <?php 
			        	include('../../config/connection.php');
			        	$data = mysqli_query($conn, "SELECT Id_Identitas_Siswa, NISN, Nama_Peserta_Didik FROM identitas_siswa 
			        											WHERE status_administrasi = 0");
			        	foreach ($data as $r) {
			        ?>
			        <option value="<?= $r['Id_Identitas_Siswa']; ?>"><?= $r['NISN'] . " | " . $r['Nama_Peserta_Didik']; ?></option>
			    	<?php } ?>
			      </select>
			    </div>

			    <!-- Administrasi -->
		        <div class="form-group">
		          <label>Harga</label>
		          <input type="number" class="form-control" name="harga" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group mb-0">
		          <label>Status Pembayaran</label>
		          <select class="form-control" name="status" required="">
		            <option value=""> ~~~ PILIH STATUS PEMBAYARAN ~~~ </option>
		            <option value="Lunas">Lunas</option>
		            <option value="Belum Lunas">Belum Lunas</option>
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