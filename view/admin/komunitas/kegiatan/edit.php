<?PHP
	$id = $_GET["id"];
	
	$kueri = mysqli_query($koneksi,"SELECT * FROM kegiatan WHERE id_kegiatan = '$id'");
	$data = mysqli_fetch_array($kueri);
?>
<script src="script/ckeditor/ckeditor.js"></script>
<!-- Page Content -->
<div class="text-center">
	<h2>Kegiatan Baru</h2>
</div>
<div class="text-justify">
	<form method="post" action="index.php?laman=kegiatan&id=<?PHP echo $_GET["id"] ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nama_kegiatan">Nama Kegiatan :</label>
			<input style="color:black;" type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?PHP echo $data["nama_kegiatan"] ?>" required>
		</div>
		<div class="form-group">
			<label for="deskripsi_kegiatan">Deskripsi Kegiatan :</label>
			<textarea id="deskripsi_kegiatan" name="deskripsi_kegiatan"><?PHP echo $data["deskripsi_kegiatan"] ?>
			</textarea>
		</div>
		<input type="hidden" name="aksi" value="KegiatanEdit">
		<input type="hidden" name="id_komunitas" value="<?PHP echo $data["id_komunitas"] ?>">
		<input type="hidden" name="id_kegiatan" value="<?PHP echo $data["id_kegiatan"] ?>">
		<button type="submit" class="btn btn-default">Buat</button>
	</form>
</div>
<script>
	CKEDITOR.replace('deskripsi_kegiatan');
</script>