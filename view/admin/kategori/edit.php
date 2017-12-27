<?PHP
	$id = $_GET["id"];
	$kueri = mysqli_query($koneksi,"SELECT * FROM kategori WHERE id_kategori = '$id'");
	$data = mysqli_fetch_array($kueri);
?>
<div class="text-center">
	<h2>Baru</h2>
</div>
<div class="text-justify">
	<form method="post" action="index.php?laman=listkategori" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nama_kategori">Nama Kategori :</label>
			<input style="color:black;" type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $data["nama_kategori"] ?>" required>
		</div>
		<input type="hidden" name="id" value="<?= $data["id_kategori"] ?>">
		<input type="hidden" name="aksi" value="Ubah">
		<button type="submit" class="btn btn-default">Simpan</button>
	</form>
</div>