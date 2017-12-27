<div class="text-center">
	<h2>Baru</h2>
</div>
<div class="text-justify">
	<form method="post" action="index.php?laman=listkategori" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nama_kategori">Nama Kategori :</label>
			<input style="color:black;" type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?PHP if(isset($_POST["nama_kategori"])) echo $_POST["nama_kategori"] ?>" required>
		</div>
		<input type="hidden" name="aksi" value="Baru">
		<button type="submit" class="btn btn-default">Buat</button>
	</form>
</div>