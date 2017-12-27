<?PHP
	$id = $_GET["id"];
	include("modal/user.php");
		
	$kueri = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$id'");
	$data = mysqli_fetch_array($kueri);
	
?>
<div class="text-center">
	<h2>EDIT PROFIL</h2>
</div>
<div class="text-justify">
	<form method="post" action="index.php?laman=editprofil&id=<?PHP echo $id ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nama_lengkap">Nama Lengkap :</label>
			<input style="color:black;" type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?PHP echo $data["nama_lengkap"] ?>" required>
		</div>
		<div class="form-group">
			<label for="jenkel">Jenis Kelamin :</label>
			<select style="color:black;" class="form-control" id="jenkel" name="jenkel" required>
				<option <?PHP if($data["jenkel"] == "L") echo "selected" ?> value="L">Laki-laki</option>
				<option <?PHP if($data["jenkel"] == "P") echo "selected" ?> value="P">Perempuan</option>
			</select>
		</div>
		<div class="form-group">
			<label for="tgl_lahir">Tanggal Lahir :</label>
			<input style="color:black;" type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?PHP echo $data["tgl_lahir"] ?>" required>
		</div>
		<div class="form-group">
			<label for="alamat">Alamat :</label>
			<input style="color:black;" type="text" class="form-control" id="alamat" name="alamat" value="<?PHP echo $data["alamat"] ?>" required>
		</div>
		<div class="form-group">
			<label for="foto">Foto Profil :</label>
			Ganti Foto ? <input type="checkbox" name="gantifoto">
			<input style="color:black;" type="file" class="form-control" id="foto" name="foto">
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input style="color:black;" type="password" class="form-control" id="password" name="password" value="<?PHP if(isset($_POST["password"])) echo $_POST["password"] ?>" required>
		</div>
		<input type="hidden" name="id" value="<?PHP echo $data["username"]?>">
		<input type="hidden" name="aksi" value="Ubah">
		<button type="submit" class="btn btn-default">Simpan</button>
		<a href = "index.php" class= "btn btn-default"> Batal </button>
	</form>

</div>