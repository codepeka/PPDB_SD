<?php 
	
	session_start();
	include("../../config/connection.php");

	// Tambah Data
	if (isset($_POST['tambahData'])) {
		//Peserta
		$peserta 					= mysqli_real_escape_string($conn, $_POST['peserta']); 
		// Data Ayah
		$nama_ayah 					= mysqli_real_escape_string($conn, $_POST['nama_ayah']); 
		$status_ayah 				= mysqli_real_escape_string($conn, $_POST['status_ayah']); 
		$tanggal_lahir_ayah 		= mysqli_real_escape_string($conn, $_POST['tanggal_lahir_ayah']); 
		$telepon_ayah				= mysqli_real_escape_string($conn, $_POST['telepon_ayah']); 
		$pendidikan_terakhir_ayah	= mysqli_real_escape_string($conn, $_POST['pendidikan_terakhir_ayah']); 
		$pekerjaan_ayah				= mysqli_real_escape_string($conn, $_POST['pekerjaan_ayah']); 
		$penghasilan_ayah			= mysqli_real_escape_string($conn, $_POST['penghasilan_ayah']); 
		$alamat_ayah				= mysqli_real_escape_string($conn, $_POST['alamat_ayah']); 
		// Data Ibu
		$nama_ibu 					= mysqli_real_escape_string($conn, $_POST['nama_ibu']); 
		$status_ibu 				= mysqli_real_escape_string($conn, $_POST['status_ibu']); 
		$tanggal_lahir_ibu 			= mysqli_real_escape_string($conn, $_POST['tanggal_lahir_ibu']); 
		$telepon_ibu				= mysqli_real_escape_string($conn, $_POST['telepon_ibu']); 
		$pendidikan_terakhir_ibu	= mysqli_real_escape_string($conn, $_POST['pendidikan_terakhir_ibu']); 
		$pekerjaan_ibu				= mysqli_real_escape_string($conn, $_POST['pekerjaan_ibu']); 
		$penghasilan_ibu			= mysqli_real_escape_string($conn, $_POST['penghasilan_ibu']); 
		$alamat_ibu					= mysqli_real_escape_string($conn, $_POST['alamat_ibu']); 
		// Data Wali
		$nama_wali 					= mysqli_real_escape_string($conn, $_POST['nama_wali']); 
		$status_wali 				= mysqli_real_escape_string($conn, $_POST['status_wali']); 
		$tanggal_lahir_wali 		= mysqli_real_escape_string($conn, $_POST['tanggal_lahir_wali']); 
		$telepon_wali				= mysqli_real_escape_string($conn, $_POST['telepon_wali']); 
		$pendidikan_terakhir_wali	= mysqli_real_escape_string($conn, $_POST['pendidikan_terakhir_wali']); 
		$pekerjaan_wali				= mysqli_real_escape_string($conn, $_POST['pekerjaan_wali']); 
		$penghasilan_wali			= mysqli_real_escape_string($conn, $_POST['penghasilan_wali']); 
		$alamat_wali				= mysqli_real_escape_string($conn, $_POST['alamat_wali']); 
		
		$tgl_buat 					= date('Y-m-d H:i:s');

		$query = mysqli_query($conn, "INSERT INTO orang_tua_wali SET Id_Identitas_Siswa = '$peserta',
																	  Nama_Ayah = '$nama_ayah',
																	  Status_Ayah = '$status_ayah',
																	  Tgl_Lahir_Ayah = '$tanggal_lahir_ayah',
																	  Telepon_Ayah = '$telepon_ayah',
																	  Pendidikan_Terakhir_Ayah = '$pendidikan_terakhir_ayah',
																	  Pekerjaan_Ayah = '$pekerjaan_ayah',
																	  Penghasilan_Ayah = '$penghasilan_ayah',
																	  Alamat_Ayah = '$alamat_ayah',
																	  Nama_Ibu = '$nama_ibu',
																	  Status_Ibu = '$status_ibu',
																	  Tgl_Lahir_Ibu = '$tanggal_lahir_ibu',
																	  Telepon_Ibu = '$telepon_ibu',
																	  Pendidikan_Terakhir_Ibu = '$pendidikan_terakhir_ibu',
																	  Pekerjaan_Ibu = '$pekerjaan_ibu',
																	  Penghasilan_Ibu = '$penghasilan_ibu',
																	  Alamat_Ibu = '$alamat_ibu',
																	  Nama_Wali = '$nama_wali',
																	  Status_Wali = '$status_wali',
																	  Tgl_Lahir_Wali = '$tanggal_lahir_wali',
																	  Telepon_Wali = '$telepon_wali',
																	  Pendidikan_Terakhir_Wali = '$pendidikan_terakhir_wali',
																	  Pekerjaan_Wali = '$pekerjaan_wali',
																	  Penghasilan_Wali = '$penghasilan_wali',
																	  Alamat_Wali = '$alamat_wali',
																	  tgl_buat = '$tgl_buat' ");

		if($query) {
			$_SESSION['alert'] = '<div class="alert alert-success alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Berhasil</div>
			                          Data berhasil ditambahkan.
			                        </div>
			                      </div>';
			header('Location: ../../view/ortu/tampilData.php');
		} else {
			$_SESSION['alert'] = '<div class="alert alert-danger alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Gagal</div>
			                          Data gagal ditambahkan.
			                        </div>
			                      </div>';
			header('Location: ../../view/ortu/tampilData.php'); 
		}
	}

	// Ubah Data
	if (isset($_POST['ubahData'])) {
		$id = $_POST['id'];
		//Peserta
		$peserta 					= mysqli_real_escape_string($conn, $_POST['peserta']); 
		// Data Ayah
		$nama_ayah 					= mysqli_real_escape_string($conn, $_POST['nama_ayah']); 
		$status_ayah 				= mysqli_real_escape_string($conn, $_POST['status_ayah']); 
		$tanggal_lahir_ayah 		= mysqli_real_escape_string($conn, $_POST['tanggal_lahir_ayah']); 
		$telepon_ayah				= mysqli_real_escape_string($conn, $_POST['telepon_ayah']); 
		$pendidikan_terakhir_ayah	= mysqli_real_escape_string($conn, $_POST['pendidikan_terakhir_ayah']); 
		$pekerjaan_ayah				= mysqli_real_escape_string($conn, $_POST['pekerjaan_ayah']); 
		$penghasilan_ayah			= mysqli_real_escape_string($conn, $_POST['penghasilan_ayah']); 
		$alamat_ayah				= mysqli_real_escape_string($conn, $_POST['alamat_ayah']); 
		// Data Ibu
		$nama_ibu 					= mysqli_real_escape_string($conn, $_POST['nama_ibu']); 
		$status_ibu 				= mysqli_real_escape_string($conn, $_POST['status_ibu']); 
		$tanggal_lahir_ibu 			= mysqli_real_escape_string($conn, $_POST['tanggal_lahir_ibu']); 
		$telepon_ibu				= mysqli_real_escape_string($conn, $_POST['telepon_ibu']); 
		$pendidikan_terakhir_ibu	= mysqli_real_escape_string($conn, $_POST['pendidikan_terakhir_ibu']); 
		$pekerjaan_ibu				= mysqli_real_escape_string($conn, $_POST['pekerjaan_ibu']); 
		$penghasilan_ibu			= mysqli_real_escape_string($conn, $_POST['penghasilan_ibu']); 
		$alamat_ibu					= mysqli_real_escape_string($conn, $_POST['alamat_ibu']); 
		// Data Wali
		$nama_wali 					= mysqli_real_escape_string($conn, $_POST['nama_wali']); 
		$status_wali 				= mysqli_real_escape_string($conn, $_POST['status_wali']); 
		$tanggal_lahir_wali 		= mysqli_real_escape_string($conn, $_POST['tanggal_lahir_wali']); 
		$telepon_wali				= mysqli_real_escape_string($conn, $_POST['telepon_wali']); 
		$pendidikan_terakhir_wali	= mysqli_real_escape_string($conn, $_POST['pendidikan_terakhir_wali']); 
		$pekerjaan_wali				= mysqli_real_escape_string($conn, $_POST['pekerjaan_wali']); 
		$penghasilan_wali			= mysqli_real_escape_string($conn, $_POST['penghasilan_wali']); 
		$alamat_wali				= mysqli_real_escape_string($conn, $_POST['alamat_wali']); 

		$query = mysqli_query($conn, "UPDATE orang_tua_wali SET Id_Identitas_Siswa = '$peserta',
																Nama_Ayah = '$nama_ayah',
																Status_Ayah = '$status_ayah',
																Tgl_Lahir_Ayah = '$tanggal_lahir_ayah',
																Telepon_Ayah = '$telepon_ayah',
																Pendidikan_Terakhir_Ayah = '$pendidikan_terakhir_ayah',
																Pekerjaan_Ayah = '$pekerjaan_ayah',
																Penghasilan_Ayah = '$penghasilan_ayah',
																Alamat_Ayah = '$alamat_ayah',
																Nama_Ibu = '$nama_ibu',
																Status_Ibu = '$status_ibu',
																Tgl_Lahir_Ibu = '$tanggal_lahir_ibu',
																Telepon_Ibu = '$telepon_ibu',
																Pendidikan_Terakhir_Ibu = '$pendidikan_terakhir_ibu',
																Pekerjaan_Ibu = '$pekerjaan_ibu',
																Penghasilan_Ibu = '$penghasilan_ibu',
																Alamat_Ibu = '$alamat_ibu',
																Nama_Wali = '$nama_wali',
																Status_Wali = '$status_wali',
																Tgl_Lahir_Wali = '$tanggal_lahir_wali',
																Telepon_Wali = '$telepon_wali',
																Pendidikan_Terakhir_Wali = '$pendidikan_terakhir_wali',
																Pekerjaan_Wali = '$pekerjaan_wali',
																Penghasilan_Wali = '$penghasilan_wali',
																Alamat_Wali = '$alamat_wali',
																tgl_buat = '$tgl_buat'  
									  					WHERE Id_Orang_Tua_Wali = '$id' ") or die(mysqli_error($conn));

		if($query) {
			$_SESSION['alert'] = '<div class="alert alert-success alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Berhasil</div>
			                          Data berhasil diubah.
			                        </div>
			                      </div>';
			header('Location: ../../view/ortu/tampilData.php');
		} else {
			$_SESSION['alert'] = '<div class="alert alert-danger alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Gagal</div>
			                          Data gagal diubah.
			                        </div>
			                      </div>';
			header('Location: ../../view/ortu/tampilData.php');
		}
	}

	// Hapus Data
	if (isset($_GET['hapusData'])) {
		$id = $_GET['hapusData'];

		$query = mysqli_query($conn, "DELETE FROM orang_tua_wali WHERE Id_Orang_Tua_Wali = $id");

		if($query) {
			$_SESSION['alert'] = '<div class="alert alert-success alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Berhasil</div>
			                          Data berhasil dihapus.
			                        </div>
			                      </div>';
			header('Location: ../../view/ortu/tampilData.php');
		} else {
			$_SESSION['alert'] = '<div class="alert alert-danger alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Gagal</div>
			                          Data gagal dihapus.
			                        </div>
			                      </div>';
			header('Location: ../../view/ortu/tampilData.php');
		}
	}

?>