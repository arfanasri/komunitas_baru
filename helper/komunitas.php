<?PHP
function levelkomunitas($user,$idkomunitas){
	include("script/koneksi.php");
	$kueri = mysqli_query($koneksi,"SELECT * FROM level WHERE id_user='$user' AND id_komunitas='$idkomunitas'");
	if(mysqli_num_rows($kueri) > 0){
		$data = mysqli_fetch_array($kueri);
		$level = $data["level"];
	} else {
		$level = "visitor";
	}
	return $level;
}

function levelkegiatan($user,$idkegiatan){
	include("script/koneksi.php");
	$kueri = mysqli_query($koneksi,"SELECT * FROM kegiatan WHERE id_user='$user' AND id_kegiatan='$idkegiatan'");
	if(mysqli_num_rows($kueri) > 0){
		$level = "pemilik";
	} else {
		$level = "visitor";
	}
	return $level;
}
?>