<?PHP
	$id = $_GET["id"];
	
	$kueri = mysqli_query($koneksi,"SELECT * FROM komunitas WHERE id_komunitas = '$id'");
	$data = mysqli_fetch_array($kueri)
?>
<script src="script/ckeditor/ckeditor.js"></script>
<div class="text-center">
	<h2>Ubah</h2>
</div>
<div class="text-justify">
	<form method="post" action="index.php?laman=komunitas&id=<?PHP echo $id ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nama_komunitas">Nama Komunitas :</label>
			<input style="color:black;" type="text" class="form-control" id="nama_komunitas" name="nama_komunitas" value="<?PHP echo $data["nama_komunitas"] ?>" required>
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
		if($datakategori["id_kategori"] == $data["id_kategori"]){
?>
				<option selected value="<?= $datakategori["id_kategori"]?>"><?= $datakategori["nama_kategori"]?></option>
<?PHP
		} else {
?>
				<option value="<?= $datakategori["id_kategori"]?>"><?= $datakategori["nama_kategori"]?></option>
<?PHP
		}
	}
?>
			</select>
		</div>
		<div class="form-group">
			<label for="deskripsi_komunitas">Deskripsi Komunitas :</label>
			<textarea id="deskripsi_komunitas" name="deskripsi_komunitas"><?PHP echo $data["deskripsi_komunitas"] ?></textarea>
		</div>
		<input type="hidden" name="id" value="<?PHP echo $data["id_komunitas"] ?>">
		<input type="hidden" name="aksi" value="Ubah">
		<button type="submit" class="btn btn-default">Simpan</button>
	</form>
</div>
<script>
	CKEDITOR.replace('deskripsi_komunitas');
</script>