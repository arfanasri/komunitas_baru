<?PHP
if($_SESSION["level"] != "admin") {
	echo "<script>window.location.href='index.php?error=akses'</script>";
}

include("modal/kategori.php");

if(isset($_POST["cari"])) {
	$cari = $_POST["cari"];
	$kueri = mysqli_query($koneksi,"SELECT * FROM kategori WHERE nama_kategori LIKE '%$cari%'");
} else {
	$kueri = mysqli_query($koneksi,"SELECT * FROM kategori");
}
?>
<!-- Page Content -->
<div class="text-center">
	<h2>Kategori</h2>
</div>
<div class="text-justify">
	<form method="POST" action="index.php?laman=listkategori">
		<div class="form-group">
			<div class="col-sm-10">
				<input style="color:black;" class="form-control" type="text" name="cari">
			</div>
			<div class="col-sm-2">
				<input type="submit" class="btn btn-default btn-block" value="Cari">
			</div>
		</div>
	</form>
	<br>
	<br>
	<table id="tabelku" class="table table-striped table-bordered table-hover">
		<thead>
			<tr style="background-color:#E96840;color:white;">
				<th>No</th>
				<th>Nama</th>
				<th>Admin</th>
			</tr>
		</thead>
		<tbody>
		<?PHP
		if(mysqli_num_rows($kueri) > 0) {
			$no = 1;
			while($data = mysqli_fetch_array($kueri)){
		?>
			<tr>
				<td><?PHP echo $no++; ?></td>
				<td><?PHP echo $data["nama_kategori"] ?></td>
				<td class="text-center">
					<a href="index.php?laman=listkomunitas&idkategori=<?PHP echo $data["id_kategori"];?>">Lihat</a> |
					<a href="index.php?laman=editkategori&id=<?PHP echo $data["id_kategori"];?>">Edit</a> |
					<a href="index.php?laman=listkategori&aksi=Hapus&id=<?PHP echo $data["id_kategori"];?>" onclick="return confirm('Apakah Anda Ingin Menghapus Kategori Ini?')">Hapus</a>
				</td>
			</tr>
		<?PHP
			}
		} else { ?>
			<tr>
				<td colspan="3" class="text-center">Data Tidak Ditemukan</td>
			</tr>
		<?PHP }?>
		</tbody>
	</table>
	<a href="index.php?laman=buatkategori" class="btn btn-default">Buat</a>
</div>