<!-- Header -->
<?php
	$title = "Data Orang Tua"; // Judulnya
	require("../template/header.php"); // include headernya

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

          	<nav aria-label="breadcrumb">
              <ol class="breadcrumb bg-primary text-white-all">
                <li class="breadcrumb-item active" aria-current="page">Ubah Data Orang Tua</li>
              </ol>
            </nav>
          	
          	<?php 
          		include('../../config/connection.php');
                $data = mysqli_query($conn, "SELECT a.*, b.Id_Identitas_Siswa as id_identitas FROM orang_tua_wali a 
                										LEFT JOIN identitas_siswa b ON a.Id_Identitas_Siswa = b.Id_Identitas_Siswa 
                										WHERE Id_Orang_Tua_Wali = '$_GET[id]'
											") or die(mysqli_error($conn));

                if (mysqli_num_rows($data) != 1) {
					echo "<script>window.location.href = 'tampilData.php';</script>";
				}

                foreach ($data as $row) { 
          	?>

            <!-- Ubah Data -->
            <form class="needs-validation" novalidate="" action="../../controller/admin/ortu.php" method="POST">
		      <div class="modal-body">
		      	<!-- Id data -->
		      	<input type="hidden" name="id" value="<?= $row['Id_Orang_Tua_Wali']; ?>">

		      	<!-- Peserta -->
		      	<div class="section-title mt-0 ">Data Peserta</div>
		      	<div class="form-group">
		          <label>Peserta</label>
			      <select class="form-control" name="peserta" required="">
			        <option value=""> ~~~ PILIH PESERTA ~~~ </option>
			        <?php 
			        	include('../../config/connection.php');
			        	$data = mysqli_query($conn, "SELECT Id_Identitas_Siswa, NISN, Nama_Peserta_Didik FROM identitas_siswa WHERE status_ortu = 0");
			        	foreach ($data as $r) {
			        ?>
			        <option value="<?= $r['Id_Identitas_Siswa']; ?>" <?php if ($row['id_identitas'] == $r['Id_Identitas_Siswa']) { echo 'selected'; }?> ><?= $r['NISN'] . " | " . $r['Nama_Peserta_Didik']; ?></option>
			    	<?php } ?>
			    	<!-- identitas diri -->
			    	<?php 
			        	include('../../config/connection.php');
			        	$data = mysqli_query($conn, "SELECT Id_Identitas_Siswa, NISN, Nama_Peserta_Didik FROM identitas_siswa WHERE Id_Identitas_Siswa = '$row[id_identitas]'");
			        	foreach ($data as $s) {
			        ?>
			        <option value="<?= $s['Id_Identitas_Siswa']; ?>" <?php echo 'selected'; ?> ><?= $s['NISN'] . " | " . $s['Nama_Peserta_Didik']; ?></option>
			    	<?php } ?>
			      </select>
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
  </div>
</section>

<!-- Penutup Isinya -->



<!-- Footer -->
<?php require("../template/footer.php");?>