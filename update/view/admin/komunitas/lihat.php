<?PHP
if($_SESSION["level"] == "guest") {
	echo "<script>window.location.href='index.php?error=akses'</script>";
}

include("modal/komunitas.php");

$id=$_GET["id"];

$kueri = mysqli_query($koneksi,"SELECT * FROM komunitas WHERE id_komunitas='$id'");
$data = mysqli_fetch_array($kueri);
$id_komunitas = $id;
$level = levelkomunitas($_SESSION["user"],$id_komunitas);
?>
<!-- Page Content -->
<div class="text-center">
	<h2>Komunitas</h2>
</div>
<div class="text-justify">

<?php if ($level == "admin") {?>
<a class="btn btn-default" href="index.php?laman=editprofilkomunitas&id=<?PHP echo $data["id_komunitas"] ?>">Edit Profil Komunitas</a>
<?PHP }?>
	<table class="table table-bordered">
		<tr>
			<td class="text-center" colspan="2"><img class="img-thumbnail" style="width:50%" src="upload/komunitas/<?PHP echo $data["logo_komunitas"]?>"></td>
		</tr>
		<tr>
			<th colspan="2"><h1 class="text-center"><?PHP echo $data["nama_komunitas"] ?></h1></th>
		</tr>
		<tr>
			<th colspan="2"><?PHP echo $data["deskripsi_komunitas"] ?></th>
		</tr>
<?PHP
	if($level != "visitor"){
?>
		<tr>
			<th colspan="2">Kegiatan Komunitas</th>
		</tr>
		<tr>
			<th colspan="2">
			<?php if ($level == "admin") {?>
				<a class="btn btn-primary" href="index.php?laman=buatkegiatan&id=<?PHP echo $id ?>">Buat</a>
				<br>
				<br>
							<?PHP }?>
<?PHP
	$kuerikegiatan = mysqli_query($koneksi,"SELECT * FROM kegiatan WHERE id_komunitas = '$id_komunitas' ORDER BY id_kegiatan DESC");
	if(mysqli_num_rows($kuerikegiatan) > 0){
?>
				<div class="list-group">
							<?PHP while($datakegaitan = mysqli_fetch_array($kuerikegiatan)){ ?>
					<a href="index.php?laman=kegiatan&idk=<?= $id ?>&id=<?PHP echo $datakegaitan["id_kegiatan"] ?>" class="list-group-item"><?PHP echo $datakegaitan["nama_kegiatan"] ?></a>
							<?PHP } ?>	
				</div>
<?PHP 
	} else {
?>
				<h2>Maaf Tidak Ada Kegiatan</h2>
<?PHP
	}
?>
			</th>
		</tr>
<?PHP
	} else {
?>
		<tr>
			<th>Ingin Bergabung</th>
			<td><a class="btn btn-primary" onclick="return confirm('Apakah anda ingin bergabung?')" href="index.php?laman=komunitas&aksi=Gabung&id=<?PHP echo $id ?>">Gabung</a></td>
		</tr>
<?PHP
	}
?>
		<tr>
			<th>Anggota</th>
			<td>
				
<?PHP
	$kuerianggota = mysqli_query($koneksi,"SELECT a.*, b.* FROM level as a LEFT JOIN user as b ON a.id_user = b.username WHERE a.id_komunitas = '$id_komunitas' ORDER BY a.level ASC");
	
	while($dataanggota = mysqli_fetch_array($kuerianggota)){
		if($level == "admin"){
			echo "<a href='index.php?laman=lihatkomuser&idk=".$id."&idl=".$dataanggota['id_level']."'>";
		} else {
			echo "<a>";
		}
		echo $dataanggota["nama_lengkap"]." (".$dataanggota["level"].")";
		echo "</a>";
		echo "<br>";
	}
?>
				
			</td>
		</tr>
<?PHP
	if($level != "visitor"){
		$kuericalonanggota = mysqli_query($koneksi,"SELECT a.*, b.* FROM daftar as a LEFT JOIN user as b ON a.id_user = b.username WHERE a.id_komunitas = '$id_komunitas'");
		if(mysqli_num_rows($kuericalonanggota) > 0) {
?>
		<tr>
			<th>Calon Anggota</th>
			<td>
				<div class="list-group">
<?PHP
	$kuericalonanggota = mysqli_query($koneksi,"SELECT a.*, b.* FROM daftar as a LEFT JOIN user as b ON a.id_user = b.username WHERE a.id_komunitas = '$id_komunitas'");
	
	while($datacalonanggota = mysqli_fetch_array($kuericalonanggota)){
		echo "<a class='list-group-item' href='index.php?laman=komunitas&aksi=Terima&iddaftar=".$datacalonanggota["id_daftar"]."&id=".$id_komunitas."' onclick='return confirm(".'"Apakah Anda Ingin Menerima User Ini?"'.")'>";
		echo $datacalonanggota["nama_lengkap"];
		echo "</a>";
	}
?>
				</div>
			</td>
		</tr>
<?PHP
	} }
?>
	</table>
</div>