<script src="script/ckeditor/ckeditor.js"></script>
<!-- Page Content -->
<div class="text-center">
	<h2>Kegiatan Baru</h2>
</div>
<div class="text-justify">
	<form method="post" action="index.php?laman=komunitas&id=<?PHP echo $_GET["id"] ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nama_kegiatan">Nama Kegiatan :</label>
			<input style="color:black;" type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
		</div>
		<div class="form-group">
			<label for="deskripsi_kegiatan">Deskripsi Kegiatan :</label>
			<textarea id="deskripsi_kegiatan" name="deskripsi_kegiatan">
			</textarea>
		</div>
		<input type="hidden" name="aksi" value="KegiatanBaru">
		<input type="hidden" name="id_komunitas" value="<?PHP echo $_GET["id"] ?>">
		<button type="submit" class="btn btn-default">Buat</button>
		<a href="index.php?laman=komunitas&id=<?PHP echo $_GET["id"] ?>" class="btn btn-danger">Batal</a>
	</form>
</div>
<script>
	CKEDITOR.replace('deskripsi_kegiatan');
</script>