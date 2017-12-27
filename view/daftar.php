<?PHP

include("modal/user.php");

?>
<!-- Page Content -->
<div class="text-center">
	<h2>Daftar</h2>
</div>
<div class="text-justify">
	<form method="post" action="index.php?laman=daftar" enctype="multipart/form-data">
		<div class="form-group">
			<label for="username">Username :</label>
			<input style="color:black;" type="text" class="form-control" id="username" name="username" value="<?PHP if(isset($_POST["username"])) echo $_POST["username"] ?>" required>
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input style="color:black;" type="password" class="form-control" id="password" name="password" value="<?PHP if(isset($_POST["password"])) echo $_POST["password"] ?>" required>
		</div>
		<div class="form-group">
			<label for="nama_lengkap">Nama Lengkap :</label>
			<input style="color:black;" type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?PHP if(isset($_POST["nama_lengkap"])) echo $_POST["nama_lengkap"] ?>" required>
		</div>
		<div class="form-group">
			<label for="jenkel">Jenis Kelamin :</label>
			<select style="color:black;" class="form-control" id="jenkel" name="jenkel" required>
				<option <?PHP if(isset($_POST["jenkel"])) if($_POST["jenkel"] == "L") echo "selected" ?> value="L">Laki-laki</option>
				<option <?PHP if(isset($_POST["jenkel"])) if($_POST["jenkel"] == "P") echo "selected" ?> value="P">Perempuan</option>
			</select>
		</div>
		<div class="form-group">
			<label for="tgl_lahir">Tanggal Lahir :</label>
			<input style="color:black;" type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?PHP if(isset($_POST["tgl_lahir"])) echo $_POST["tgl_lahir"]  ?>" required>
		</div>
		<div class="form-group">
			<label for="alamat">Alamat :</label>
			<input style="color:black;" type="text" class="form-control" id="alamat" name="alamat" value="<?PHP if(isset($_POST["alamat"])) echo $_POST["alamat"] ?>" required>
		</div>
		<div class="form-group">
			<label for="foto">Foto Profil :</label>
			Tambah Foto ? <input type="checkbox" name="gantifoto">
			<input style="color:black;" type="file" class="form-control" id="foto" name="foto">
		</div>
		<input type="hidden" name="aksi" value="Baru">
		<button type="submit" class="btn btn-default">Daftar</button>
	</form>
</div>