<?php 
	
	session_start();
	include("../../config/connection.php");

	// Login Admin
	if (isset($_POST['loginData'])) {
		$username 	= mysqli_real_escape_string($conn, $_POST['username']); 
		$password 	= mysqli_real_escape_string($conn, $_POST['password']);

		$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'") or die(mysqli_error($conn));

		if(mysqli_num_rows($query) > 0) {
			foreach ($query as $row) {
				$_SESSION['idne'] = $row['id'];
				$_SESSION['nama'] = $row['nama'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['hak'] = $row['hak'];
				header('Location: ../../view/home/index.php');
			}
		} else {
			$_SESSION['alert'] = '<div class="alert alert-danger alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Login Gagal</div>
			                          Username dan Password anda tidak cocok.
			                        </div>
			                      </div>';
			header('Location: ../../view/login/index.php');
		}
	}

	// Logout
	if (isset($_GET['logout'])) {
		unset($_SESSION['idne'], $_SESSION['nama'], $_SESSION['username'], $_SESSION['hak']);
		header('Location: ../../view/login/index.php');
	}
?>