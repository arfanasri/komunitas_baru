<?PHP
	if(isset($_POST["username"])){
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		
		$kueri = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");
		if(mysqli_num_rows($kueri) > 0){
			 $data = mysqli_fetch_array($kueri);
			 if($password == $data["password"]){
				 $_SESSION["user"] = $data["username"];
				 $_SESSION["level"] = $data["level_user"];
				 echo "<script>alert('Selamat Anda Berhasil Login');window.location.href='index.php'</script>";
			 } else {
				 echo "<script>alert('Maaf Username Atau Password Salah')</script>";
			 }
		} else {
			echo "<script>alert('Maaf Username Atau Password Salah')</script>";
		}
	}
?>
<!-- Page Content -->
<section id="postingan">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				
				<img class="img-responsive displayed" src="images/short.png" alt="Company about"/>
				<div class="text-justify">
					<form method="post" action="index.php?laman=login">
						<div class="form-group">
							<label for="username">Username :</label>
							<input style="color:black;" type="text" class="form-control" id="username" name="username" value="<?PHP if(isset($_POST["username"])) echo $_POST["username"] ?>" required>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input style="color:black;" type="password" class="form-control" id="password" name="password" value="<?PHP if(isset($_POST["password"])) echo $_POST["password"] ?>" required>
						</div>
						<button type="submit" class="btn btn-default">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>