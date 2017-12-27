<?PHP
if($_SESSION["level"] == "guest") {
	echo "<script>window.location.href='index.php?error=akses'</script>";
}

include("modal/kegiatan.php");

$id=$_GET["id"];

$kueri = mysqli_query($koneksi,"SELECT * FROM kegiatan WHERE id_kegiatan='$id'");
$data = mysqli_fetch_array($kueri);
$id_kegiatan = $id;
$level = levelkegiatan($_SESSION["user"],$id_kegiatan);
?>
<script src="script/ckeditor/ckeditor.js"></script>
<!-- Page Content -->
<div class="text-center">
	<h2>Kegiatan</h2>
</div>
<div class="text-justify">

<?php if ($level == "pemilik") {?>
<a class="btn btn-default" href="index.php?laman=editkegiatan&id=<?PHP echo $data["id_kegiatan"] ?>">Edit Kegiatan</a>
<a class="btn btn-default" href="index.php?laman=kegiatan&aksi=Hapus&id=<?PHP echo $data["id_kegiatan"] ?>&idk=<?PHP echo $data["id_komunitas"]?>" onclick="return confirm('Apakah Anda Ingin Menghapus Kegiatan Ini?')">Hapus Kegiatan</a>
<?PHP }?>
	<table class="table table-bordered">
		
			<th colspan="2"><h1 class="text-center"><?PHP echo $data["nama_kegiatan"] ?></h1></th>
		</tr>
		<tr>
			<th colspan="2"><?PHP echo $data["deskripsi_kegiatan"] ?></th>
		</tr>
<?PHP
	$kuerikomentar = mysqli_query($koneksi,"SELECT * FROM komentar WHERE id_kegiatan = '$id_kegiatan'");
	while($datakomentar = mysqli_fetch_array($kuerikomentar)){
		?>
		<tr>
			<th><?PHP echo $datakomentar["id_user"] ?></th>
			<td><?PHP echo $datakomentar["isi_komentar"] ?></td>
		</tr>
		<?PHP
	}
?>
		<tr>
			<th colspan="2">
				<form method="POST" action="index.php?laman=kegiatan&id=<?PHP echo $data["id_kegiatan"] ?>">
					<textarea id="komentar" name="komentar"></textarea>
					<input type="hidden" name="aksi" value="Komentar">
					<input type="hidden" name="id_kegiatan" value="<?PHP echo $data["id_kegiatan"] ?>">
					<input type="hidden" name="id_komunitas" value="<?PHP echo $data["id_komunitas"] ?>">
					<input type="submit" name="simpan" value="Komentar">
				</form>
				</th>
		</tr>
	</table>
</div>

<script>
	CKEDITOR.replace('komentar');
</script>