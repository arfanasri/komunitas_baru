<?PHP
if($_SESSION["level"] == "guest") {
	echo "<script>window.location.href='index.php?error=akses'</script>";
}

$idd=$_GET["iddaftar"];
$idk=$_GET["id"];

$kueril = mysqli_query($koneksi,"SELECT * FROM daftar WHERE id_daftar='$idd'");
$datad = mysqli_fetch_array($kueril);
$id = $datad["id_user"];

$ids= $_SESSION["user"];
$kueris = mysqli_query($koneksi,"SELECT * FROM level WHERE id_komunitas='$idk' AND id_user='$ids'");
$datas = mysqli_fetch_array($kueris);

$kueri = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$id'");
$data = mysqli_fetch_array($kueri);
?>
<!-- Page Content -->
<div class="text-center">
	<h2>Profil</h2>
</div>
<div class="text-justify">
<?php if ($_SESSION["user"] == $data["username"]) {?>
<a class="btn btn-default" href="index.php?laman=editprofil&id=<?PHP echo $data["username"] ?>">Edit Profil</a>
<?PHP }?>
	<table class="table table-bordered">
		<tr>
			<td class="text-center" colspan="2"><img class="img-thumbnail" style="width:50%" src="upload/profil/<?PHP echo $data["foto"]?>"></td>
		</tr>
		<tr>
			<th>Username</th>
			<td><?PHP echo $data["username"] ?></td>
		</tr>
		<tr>
			<th>Nama Lengkap</th>
			<td><?PHP echo $data["nama_lengkap"] ?></td>
		</tr>
		<tr>
			<th>Tanggal Lahir</th>
			<td><?PHP echo $data["tgl_lahir"] ?></td>
		</tr>
		<tr>
			<th>Alamat</th>
			<td><?PHP echo $data["alamat"] ?></td>
		</tr>
		<tr>
			<th>Komunitas</th>
			<td>
<?PHP
	$username = $data["username"];
	$kuerilevel = mysqli_query($koneksi,"SELECT * FROM level WHERE id_user = '$username'");
	$x = 0;
	if(mysqli_num_rows($kuerilevel) > 0) {
		while($datalevel = mysqli_fetch_array($kuerilevel)){
			$idkomunitas = $datalevel["id_komunitas"];
			$kuerikomunitas = mysqli_query($koneksi,"SELECT * FROM komunitas WHERE id_komunitas = '$idkomunitas'");
			$datakomunitas = mysqli_fetch_array($kuerikomunitas);
			if($x != 0){
				echo "<br>";
			}
			echo $datakomunitas["nama_komunitas"]." (".$datalevel["level"].")";
			$x++;
		}
	} else {
		echo "Tidak Terdaftar Dalam Komunitas";
	}
?>
				</td>
			</tr>
		</table>
	</div>
		<?PHP if($datas["level"] == "admin") {?>
	<div class="row">
		<a class="btn btn-success col-xs-4" href="index.php?laman=komunitas&aksi=Terima&iddaftar=<?= $idd ?>&id=<?PHP echo $idk ?>" onclick="return confirm('Apakah anda ingin menerima user ini?')">Terima</a>
		<a class="btn btn-danger col-xs-4 " href="index.php?laman=komunitas&aksi=Tolak&iddaftar=<?= $idd ?>&id=<?PHP echo $idk ?>" onclick="return confirm('Apakah anda ingin menolak user ini?')">Tolak</a>
		<a class="btn btn-primary col-xs-4" href="index.php?laman=komunitas&id=<?= $idk?>">Batal</a>
	</div>
		<?PHP }?>
</div>