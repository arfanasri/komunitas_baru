<?PHP
	session_start();
	include("script/koneksi.php");
	if(isset($_POST["username"])){
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		
		$kueri = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");
		if(mysqli_num_rows($kueri) > 0){
			 $data = mysqli_fetch_array($kueri);
			 if($password == $data["password"]){
				 $_SESSION["user"] = $data["username"];
				 $_SESSION["level"] = $data["level_user"];
				 $_SESSION["foto"] = $data["foto"];
				 echo "<script>alert('Selamat Anda Berhasil Login');window.location.href='index.php'</script>";
			 } else {
				 echo "<script>alert('Maaf Username Atau Password Salah');window.location.href='index.php'</script>";
			 }
		} else {
			echo "<script>alert('Maaf Username Atau Password Salah');window.location.href='index.php'</script>";
		}
	}
?>








