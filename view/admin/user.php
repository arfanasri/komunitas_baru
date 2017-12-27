<?PHP
if($_SESSION["level"] != "admin") {
	echo "<script>window.location.href='index.php?error=akses'</script>";
}

include("modal/user.php");

if(isset($_POST["cari"])) {
	$cari = $_POST["cari"];
	$kueri = mysqli_query($koneksi,"SELECT * FROM user WHERE username LIKE '%$cari%' OR nama_lengkap LIKE '%$cari%'");
}
else {
	$kueri = mysqli_query($koneksi,"SELECT * FROM user");
}
?>
<!-- Page Content -->
<div class="text-center">
	<h2>User</h2>
</div>

<div class="text-justify">
	<form method="POST" action="index.php?laman=user">
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
				<th>Username</th>
				<th>Nama Lengkap</th>
				<th>Level</th>
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
				<td><?PHP echo $no++ ?></td>
				<td><?PHP echo $data["username"] ?></td>
				<td><?PHP echo $data["nama_lengkap"] ?></td>
				<td><?PHP echo $data["level_user"] ?></td>
				<td class="text-center">
					<a href="index.php?laman=lihat&id=<?PHP echo $data["username"] ?>">Lihat</a>
					<?PHP if($data["username"] != "admin") {?>| <a href="index.php?laman=user&aksi=Hapus&id=<?PHP echo $data["username"] ?>" onclick="return confirm('Apakah Anda Ingin Menghapus')">Hapus</a><?PHP } ?>
				</td>
			</tr>
		<?PHP
			}
		} else { ?>
			<tr>
				<td colspan="5" class="text-center">Data Tidak Ditemukan</td>
			</tr>
		<?PHP }?>
		</tbody>
	</table>
</div>