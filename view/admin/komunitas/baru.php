<script src="script/ckeditor/ckeditor.js"></script>
<div class="text-center">
	<h2>Baru</h2>
</div>
<div class="text-justify">
	<form method="post" action="index.php?laman=listkomunitas" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nama_komunitas">Nama Komunitas :</label>
			<input style="color:black;" type="text" class="form-control" id="nama_komunitas" name="nama_komunitas" value="<?PHP if(isset($_POST["nama_komunitas"])) echo $_POST["nama_komunitas"] ?>" required>
		</div>
		<div class="form-group">
			<label for="foto">Logo Komunitas :</label>
			Tambah Logo ? <input type="checkbox" name="gantifoto">
			<input style="color:black;" type="file" class="form-control" id="foto" name="foto">
		</div>
		<div class="form-group">
			<label for="id_kategori">Kategori</label>
			<select class="form-control" name="id_kategori" id="id_kategori">
<?PHP
	$kuerikategori = mysqli_query($koneksi,"SELECT * FROM kategori");
	while($datakategori = mysqli_fetch_array($kuerikategori)){
?>
				<option value="<?= $datakategori["id_kategori"]?>"><?= $datakategori["nama_kategori"]?></option>
<?PHP
	}
?>
			</select>
		</div>
		<div class="form-group">
			<label for="deskripsi_komunitas">Deskripsi Komunitas :</label>
			<textarea id="deskripsi_komunitas" name="deskripsi_komunitas">
			</textarea>
		</div>
		<input type="hidden" name="aksi" value="Baru">
		<button type="submit" class="btn btn-default">Buat</button>
		<a href= "index.php?laman=listkomunitas" class= "btn btn-default"> batal </a>
	</form>
</div>
<script>
	CKEDITOR.replace('deskripsi_komunitas');
</script>