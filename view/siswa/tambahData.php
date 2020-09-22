<!-- Header -->
<?php
	$title = "Data Siswa"; // Judulnya
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
          	
          	<div class="section-title mt-0 ml-4">Tambah Data Siswa</div>

            <!-- Tambah Data -->
            <form class="needs-validation" novalidate="" action="../../controller/admin/siswa.php" method="POST">
		      <div class="modal-body">
		        <div class="form-group">
		          <label>NISN</label>
		          <input type="number" class="form-control" name="nisn" required="" minlength="10">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Minimal 10 kata</div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>No. KK</label>
		          <input type="text" class="form-control" name="no_kk" required="" minlength="16">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Minimal 16 kata</div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>NIK</label>
		          <input type="text" class="form-control" name="nik" required="" minlength="16">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Minimal 8 kata </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Nama Panggilan</label>
		          <input type="text" class="form-control" name="nama_panggilan" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Nama Lengkap Peserta Didik</label>
		          <input type="text" class="form-control" name="nama_lengkap" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Tempat Lahir</label>
		          <input type="text" class="form-control" name="tempat_lahir" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Tanggal Lahir</label>
		          <input type="date" class="form-control" name="tanggal_lahir" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Jenis Kelamin</label>
		          <select class="form-control" name="jenis_kelamin" required="">
		            <option value=""> ~~~ PILIH JENIS KELAMIN ~~~ </option>
		            <option value="Laki-Laki">Laki-Laki</option>
		            <option value="Perempuan">Perempuan</option>
		          </select>
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Agama</label>
		          <input type="text" class="form-control" name="agama" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Gol Darah</label>
		          <input type="text" class="form-control" name="gol_darah" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Tinggi Badan</label>
		          <input type="number" class="form-control" name="tinggi_badan" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Berat Badan</label>
		          <input type="number" class="form-control" name="berat_badan" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Suku</label>
		          <input type="text" class="form-control" name="suku" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Bahasa</label>
		          <input type="text" class="form-control" name="bahasa" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Kewarganegaraan</label>
		          <input type="text" class="form-control" name="kewarganegaraan" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Status Anak</label>
		          <input type="text" class="form-control" name="status_anak" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Anak Ke</label>
		          <input type="number" class="form-control" name="anak_ke" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Jumlah Saudara</label>
		          <input type="number" class="form-control" name="jumlah_saudara" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Jenis Tinggal</label>
		          <input type="text" class="form-control" name="jenis_tinggal" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Alamat Tinggal</label>
		          <textarea type="text" class="form-control" name="alamat_tinggal" required="" style="height:80px"></textarea>
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Provinsi Tinggal</label>
		          <input type="text" class="form-control" name="provinsi_tinggal" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Kabupaten / Kota Tinggal</label>
		          <input type="text" class="form-control" name="kab_kota_tinggal" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Kecamatan Tinggal</label>
		          <input type="text" class="form-control" name="kecamatan_tinggal" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Kelurahan Tinggal</label>
		          <input type="text" class="form-control" name="kelurahan_tinggal" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Kode POS</label>
		          <input type="number" class="form-control" name="kode_pos" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Jarak Ke Sekolah (Meter)</label>
		          <input type="number" class="form-control" name="jarak_ke_sekolah" required="">
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
		          <div class="invalid-feedback"> Wajib Diisi! </div>
		          <!-- End Validation -->
		        </div>
		        <div class="form-group">
		          <label>Riwayat Penyakit</label>
		          <textarea type="text" class="form-control" name="riwayat_penyakit" required="" style="height:80px"></textarea>
		          <!-- Validation -->
		          <div class="valid-feedback"> Baguss! </div>
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