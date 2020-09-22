<?php 
	
	session_start();
	include("../../config/connection.php");

	// Tambah Data
	if (isset($_POST['tambahDataSiswa'])) {
		$nisn 				= mysqli_real_escape_string($conn, $_POST['nisn']); 
		$no_kk 				= mysqli_real_escape_string($conn, $_POST['no_kk']); 
		$nik 				= mysqli_real_escape_string($conn, $_POST['nik']); 
		$nama_panggilan		= mysqli_real_escape_string($conn, $_POST['nama_panggilan']); 
		$nama_lengkap		= mysqli_real_escape_string($conn, $_POST['nama_lengkap']); 
		$tempat_lahir		= mysqli_real_escape_string($conn, $_POST['tempat_lahir']); 
		$tanggal_lahir		= mysqli_real_escape_string($conn, $_POST['tanggal_lahir']); 
		$jenis_kelamin		= mysqli_real_escape_string($conn, $_POST['jenis_kelamin']); 
		$agama				= mysqli_real_escape_string($conn, $_POST['agama']); 
		$gol_darah			= mysqli_real_escape_string($conn, $_POST['gol_darah']); 
		$tinggi_badan		= mysqli_real_escape_string($conn, $_POST['tinggi_badan']);
		$berat_badan		= mysqli_real_escape_string($conn, $_POST['berat_badan']); 
		$suku				= mysqli_real_escape_string($conn, $_POST['suku']);
		$bahasa				= mysqli_real_escape_string($conn, $_POST['bahasa']);
		$kewarganegaraan	= mysqli_real_escape_string($conn, $_POST['kewarganegaraan']);
		$status_anak		= mysqli_real_escape_string($conn, $_POST['suku']);
		$anak_ke			= mysqli_real_escape_string($conn, $_POST['anak_ke']);
		$jumlah_saudara		= mysqli_real_escape_string($conn, $_POST['jumlah_saudara']);
		$jenis_tinggal		= mysqli_real_escape_string($conn, $_POST['jenis_tinggal']);
		$alamat_tinggal		= mysqli_real_escape_string($conn, $_POST['alamat_tinggal']);
		$provinsi_tinggal	= mysqli_real_escape_string($conn, $_POST['provinsi_tinggal']);
		$kab_kota_tinggal	= mysqli_real_escape_string($conn, $_POST['kab_kota_tinggal']);
		$kecamatan_tinggal	= mysqli_real_escape_string($conn, $_POST['kecamatan_tinggal']);
		$kelurahan_tinggal	= mysqli_real_escape_string($conn, $_POST['kelurahan_tinggal']);
		$kode_pos			= mysqli_real_escape_string($conn, $_POST['kode_pos']);
		$jarak_ke_sekolah	= mysqli_real_escape_string($conn, $_POST['jarak_ke_sekolah']);
		$riwayat_penyakit	= mysqli_real_escape_string($conn, $_POST['riwayat_penyakit']);
		$tgl_buat 			= date('Y-m-d H:i:s');

		$query = mysqli_query($conn, "INSERT INTO identitas_siswa SET NISN = '$nisn',
																	  No_KK = '$no_kk',
																	  NIK = '$nik',
																	  Nama_Panggilan = '$nama_panggilan',
																	  Nama_Peserta_Didik = '$nama_lengkap',
																	  Tempat_Lahir = '$tempat_lahir',
																	  Tanggal_Lahir = '$tanggal_lahir',
																	  Jenis_Kelamin = '$jenis_kelamin',
																	  Agama = '$agama',
																	  Gol_Darah = '$gol_darah',
																	  Tinggi_Badan = '$tinggi_badan',
																	  Berat_Badan = '$berat_badan',
																	  Suku = '$suku',
																	  Bahasa = '$bahasa',
																	  Kewarganegaraan = '$kewarganegaraan',
																	  Status_Anak = '$status_anak',
																	  Anak_Ke = '$anak_ke',
																	  Jml_Saudara = '$jumlah_saudara',
																	  Jenis_Tinggal = '$jenis_tinggal',
																	  Alamat_Tinggal = '$alamat_tinggal',
																	  Provinsi_Tinggal = '$provinsi_tinggal',
																	  Kab_Kota_Tinggal = '$kab_kota_tinggal',
																	  Kec_Tinggal = '$kecamatan_tinggal',
																	  Kelurahan_Tinggal = '$kelurahan_tinggal',
																	  Kode_POS = '$kode_pos',
																	  Jarak_ke_Sekolah = '$jarak_ke_sekolah',
																	  Riwayat_Penyakit = '$riwayat_penyakit',
																	  tgl_buat = '$tgl_buat' ");

		if($query) {
			// session login
			$_SESSION['nisnPeserta'] = $nisn; 
			$_SESSION['namaPeserta'] = $nama_lengkap; 
			$_SESSION['tlPeserta'] = $tanggal_lahir; 
			
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
			header('Location: ../../view/halaman/daftarSiswa.php');
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
			header('Location: ../../view/halaman/daftarSiswa.php');
		}
	}

	// Ubah Data
	if (isset($_POST['ubahDataSiswa'])) {
		$id 				= $_POST['id'];
		$nisn 				= mysqli_real_escape_string($conn, $_POST['nisn']); 
		$no_kk 				= mysqli_real_escape_string($conn, $_POST['no_kk']); 
		$nik 				= mysqli_real_escape_string($conn, $_POST['nik']); 
		$nama_panggilan		= mysqli_real_escape_string($conn, $_POST['nama_panggilan']); 
		$nama_lengkap		= mysqli_real_escape_string($conn, $_POST['nama_lengkap']); 
		$tempat_lahir		= mysqli_real_escape_string($conn, $_POST['tempat_lahir']); 
		$tanggal_lahir		= mysqli_real_escape_string($conn, $_POST['tanggal_lahir']); 
		$jenis_kelamin		= mysqli_real_escape_string($conn, $_POST['jenis_kelamin']); 
		$agama				= mysqli_real_escape_string($conn, $_POST['agama']); 
		$gol_darah			= mysqli_real_escape_string($conn, $_POST['gol_darah']); 
		$tinggi_badan		= mysqli_real_escape_string($conn, $_POST['tinggi_badan']);
		$berat_badan		= mysqli_real_escape_string($conn, $_POST['berat_badan']); 
		$suku				= mysqli_real_escape_string($conn, $_POST['suku']);
		$bahasa				= mysqli_real_escape_string($conn, $_POST['bahasa']);
		$kewarganegaraan	= mysqli_real_escape_string($conn, $_POST['kewarganegaraan']);
		$status_anak		= mysqli_real_escape_string($conn, $_POST['suku']);
		$anak_ke			= mysqli_real_escape_string($conn, $_POST['anak_ke']);
		$jumlah_saudara		= mysqli_real_escape_string($conn, $_POST['jumlah_saudara']);
		$jenis_tinggal		= mysqli_real_escape_string($conn, $_POST['jenis_tinggal']);
		$alamat_tinggal		= mysqli_real_escape_string($conn, $_POST['alamat_tinggal']);
		$provinsi_tinggal	= mysqli_real_escape_string($conn, $_POST['provinsi_tinggal']);
		$kab_kota_tinggal	= mysqli_real_escape_string($conn, $_POST['kab_kota_tinggal']);
		$kecamatan_tinggal	= mysqli_real_escape_string($conn, $_POST['kecamatan_tinggal']);
		$kelurahan_tinggal	= mysqli_real_escape_string($conn, $_POST['kelurahan_tinggal']);
		$kode_pos			= mysqli_real_escape_string($conn, $_POST['kode_pos']);
		$jarak_ke_sekolah	= mysqli_real_escape_string($conn, $_POST['jarak_ke_sekolah']);
		$riwayat_penyakit	= mysqli_real_escape_string($conn, $_POST['riwayat_penyakit']);

		$query = mysqli_query($conn, "UPDATE identitas_siswa SET NISN = '$nisn',
																 No_KK = '$no_kk',
																 NIK = '$nik',
																 Nama_Panggilan = '$nama_panggilan',
																 Nama_Peserta_Didik = '$nama_lengkap',
																 Tempat_Lahir = '$tempat_lahir',
																 Tanggal_Lahir = '$tanggal_lahir',
																 Jenis_Kelamin = '$jenis_kelamin',
																 Agama = '$agama',
																 Gol_Darah = '$gol_darah',
																 Tinggi_Badan = '$tinggi_badan',
																 Berat_Badan = '$berat_badan',
																 Suku = '$suku',
																 Bahasa = '$bahasa',
																 Kewarganegaraan = '$kewarganegaraan',
																 Status_Anak = '$status_anak',
																 Anak_Ke = '$anak_ke',
																 Jml_Saudara = '$jumlah_saudara',
																 Jenis_Tinggal = '$jenis_tinggal',
																 Alamat_Tinggal = '$alamat_tinggal',
																 Provinsi_Tinggal = '$provinsi_tinggal',
																 Kab_Kota_Tinggal = '$kab_kota_tinggal',
																 Kec_Tinggal = '$kecamatan_tinggal',
																 Kelurahan_Tinggal = '$kelurahan_tinggal',
																 Kode_POS = '$kode_pos',
																 Jarak_ke_Sekolah = '$jarak_ke_sekolah',
																 Riwayat_Penyakit = '$riwayat_penyakit',
																 tgl_buat = '$tgl_buat'  
									  					WHERE Id_Identitas_Siswa = '$id' ") or die(mysqli_error($conn));

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
			header('Location: ../../view/halaman/daftarSiswa.php');
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
			header('Location: ../../view/halaman/daftarSiswa.php');
		}
	}

	// Tambah Data Ortu
	if (isset($_POST['tambahDataOrtu'])) {
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
			$_SESSION['status_ortu'] = 1; 
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
			header('Location: ../../view/halaman/daftarOrtu.php');
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
			header('Location: ../../view/halaman/daftarOrtu.php'); 
		}
	}

	// Ubah Data Ortu
	if (isset($_POST['ubahDataOrtu'])) {
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
			header('Location: ../../view/halaman/daftarOrtu.php');
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
			header('Location: ../../view/halaman/daftarOrtu.php');
		}
	}

	// Login Peserta
	if (isset($_POST['loginDataPeserta'])) {
		$nisn 			= mysqli_real_escape_string($conn, $_POST['nisn']); 
		$tanggal_lahir 	= mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);

		$query = mysqli_query($conn, "SELECT * FROM identitas_siswa WHERE NISN = '$nisn' AND Tanggal_Lahir = '$tanggal_lahir'") or die(mysqli_error($conn));

		if(mysqli_num_rows($query) > 0) {
			foreach ($query as $row) {
				$_SESSION['nisnPeserta'] = $nisn; 
				$_SESSION['namaPeserta'] = $row['Nama_Peserta_Didik']; 
				$_SESSION['tlPeserta'] = $tanggal_lahir; 
				$_SESSION['status_ortu'] = $row['status_ortu']; 
				header('Location: ../../view/halaman/daftarSiswa.php');
			}
		} else {
			$_SESSION['alert'] = '<div class="alert alert-danger alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Login Gagal</div>
			                          NISN dan Tanggal Lahir anda tidak cocok.
			                        </div>
			                      </div>';
			header('Location: ../../view/halaman/login.php');
		}
	}


	// Logout
	if (isset($_GET['logout'])) {
		unset($_SESSION['nisnPeserta'], $_SESSION['namaPeserta'], $_SESSION['tlPeserta'], $_SESSION['status_ortu']);
		header('Location: ../../view/halaman');
	}
?>