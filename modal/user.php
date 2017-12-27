<?PHP
	if(isset($_POST["aksi"]) or isset($_GET["aksi"])) {
		
		if(isset($_POST["aksi"])){
			$aksi = $_POST["aksi"];
		} else {
			$aksi = $_GET["aksi"];
		}
		
		if($aksi == "Baru") {
			$username = $_POST["username"];
			$kuericek = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
			if(mysqli_num_rows($kuericek) > 0){
				$kueri = false;
				$error = "Maaf Username Sudah Ada";
			} else {
				$password = md5($_POST["password"]);
				$nama_lengkap = $_POST["nama_lengkap"];
				$jenkel = $_POST["jenkel"];
				$tgl_lahir = $_POST["tgl_lahir"];
				$alamat = $_POST["alamat"];
				if(isset($_POST["gantifoto"])){
					include("script/uploadprofil.php");
					$namafoto = $_FILES["foto"]["name"];				
				} else {
					$namafoto = "default.jpg";
				}
				
				echo "<script>alert('Anda sudah berhasi mendaftar');window.location.href='index.php?laman=daftar'</script>";
				
				$kueri = mysqli_query($koneksi,"INSERT INTO user(username,password,nama_lengkap,jenkel,tgl_lahir,alamat,foto,level_user) VALUES ('$username','$password','$nama_lengkap','$jenkel','$tgl_lahir','$alamat','$namafoto','user')");	
			}
			
		}
		
		if($aksi == "Ubah") {
			$id = $_POST["id"];
			$password = md5($_POST["password"]);
			$nama_lengkap = $_POST["nama_lengkap"];
			$jenkel = $_POST["jenkel"];
			$tgl_lahir = $_POST["tgl_lahir"];
			$alamat = $_POST["alamat"];

			$kueri2 = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$id'");
			$data2 = mysqli_fetch_array($kueri2);
			if(isset($_POST["gantifoto"])){
				include("script/uploadprofil.php");
				$namafoto = $_FILES["foto"]["name"];				
				if($data2["foto"] != "default.jpg") {
					unlink("upload/profil/".$data2["foto"]);
				}
			} else {
				$namafoto = $data2["foto"];
			}
			$_SESSION["foto"] = $namafoto;
			
			$kueri = mysqli_query($koneksi,"UPDATE user SET password='$password', nama_lengkap='$nama_lengkap', jenkel='$jenkel', tgl_lahir='$tgl_lahir', alamat='$alamat', foto='$namafoto' WHERE username='$id'");
			
			echo "<script>";
			echo "window.location.href='index.php?laman=editprofil&id=".$id."'";
			echo "</script>";
		}
		
		if($aksi == "Promosi") {
			$id = $_GET["id"];
			
			$kueri = mysqli_query($koneksi,"UPDATE user SET level_user='admin' WHERE username='$id'");
		}
		
		if($aksi == "Demosi") {
			$id = $_GET["id"];
			
			$kueri = mysqli_query($koneksi,"UPDATE user SET level_user='user' WHERE username='$id'");
		}
		
		if($aksi == "Hapus") {
			$id = $_GET["id"];
			$kueri2 = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$id'");
			$data2 = mysqli_fetch_array($kueri2);
			if($data2["foto"] != "default.jpg") {
				unlink("upload/profil/".$data2["foto"]);
			}
			
			$kueri = mysqli_query($koneksi,"DELETE FROM user WHERE username='$id'");
		}
		
		if($kueri) {
			echo '
					<script>
						alert("Berhasil");
					</script>
				';
		} else {
			if(isset($error)){
				echo '
					<script>
						alert("'.$error.'");
					</script>
				';
			} else {				
				echo '
						<script>
							alert("Maaf terjadi kesalahan");
						</script>
					';
			}
		}
	}
?>