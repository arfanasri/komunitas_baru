<?PHP
if($_SESSION["level"] != "admin") {
	echo "<script>window.location.href='index.php?error=akses'</script>";
}

include("modal/komunitas.php");

if(isset($_POST["cari"])) {
	$cari = $_POST["cari"];
	$kueri = mysqli_query($koneksi,"SELECT * FROM komunitas WHERE nama_komunitas LIKE '%$cari%'");
} else if (isset($_GET["idkategori"])){
	$cari = $_GET ["idkategori"];
	$kueri = mysqli_query($koneksi,"SELECT * FROM komunitas WHERE id_kategori LIKE '$cari'");
} else {
	$kueri = mysqli_query($koneksi,"SELECT * FROM komunitas");
}
?>
<!-- Page Content -->
<div class="text-center">
	<h2>Komunitas</h2>
</div>
<div class="text-justify">
	<form method="POST" action="index.php?laman=listkomunitas">
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
				<th>Logo</th>
				<th>Nama</th>
				<th>Kategori</th>
				<th>Deskripsi</th>
				<th>Admin</th>
				<th>Anggota</th>
				<th>Admin</th>
			</tr>
		</thead>
		<tbody>
		<?PHP
		if(mysqli_num_rows($kueri) > 0) {
			while($data = mysqli_fetch_array($kueri)){
				$id_komunitas = $data["id_komunitas"];
				$kuerianggota = mysqli_query($koneksi,"SELECT * FROM level WHERE id_komunitas = '$id_komunitas' AND level LIKE 'anggota'");
				$banyakanggota = mysqli_num_rows($kuerianggota);
				$kueriadmin = mysqli_query($koneksi,"SELECT * FROM level WHERE id_komunitas LIKE '$id_komunitas' AND level LIKE 'admin'");
		?>
			<tr>
				<td><img class="img-responsive displayed" src="upload/komunitas/<?PHP echo $data["logo_komunitas"] ?>"></td>
				<td><?PHP echo $data["nama_komunitas"] ?></td>
				<td><?PHP echo ambilsatudata("kategori","nama_kategori","id_kategori",$data["id_kategori"]) ?></td>
				<td><?PHP echo $data["deskripsi_komunitas"] ?></td>
				<td><?PHP 
					echo "<ul>";
					while($dataadmin = mysqli_fetch_array($kueriadmin)) {
						echo "<li>".$dataadmin["id_user"]."</li>";
					}
					echo "<ul>";
				?></td>
				<td><?PHP echo $banyakanggota ?></td>
				<td class="text-center">
					<?PHP if($data["verifikasi_komunitas"] == "ya") {?>
						<a href="index.php?laman=komunitas&id=<?PHP echo $data["id_komunitas"];?>">Kunjungi</a> |
					<?PHP } ?>
					<?PHP if($data["verifikasi_komunitas"] == "tidak") {?>
						<a href="index.php?laman=listkomunitas&aksi=Verifikasi&id=<?PHP echo $data["id_komunitas"];?>" onclick="return confirm('Apakah Anda Ingin Mengaktifkan Komunitas Ini')">Aktifvasi</a> |
					<?PHP } ?>
					<a href="index.php?laman=listkomunitas&aksi=Hapus&id=<?PHP echo $data["id_komunitas"]; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus')">Hapus</a>
				</td>
			</tr>
		<?PHP
			}
		} else { ?>
			<tr>
				<td colspan="6" class="text-center">Data Tidak Ditemukan</td>
			</tr>
		<?PHP }?>
		</tbody>
	</table>
	<div class="row">
		<a href="index.php?laman=buatkomunitas" class="col-sm-2 btn btn-default">Buat</a>
	</div>
</div>