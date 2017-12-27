<?php
$target_dir = "upload/profil/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["foto"]["tmp_name"]);

if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
	echo "<script>Gambar Berhasil Diupload</script>";
	$namafoto = $_FILES["foto"]["name"];
} else {
	echo "<script>Gambar Gagal Diupload</script>";
	$namafoto = "default.jpg";
}
?>