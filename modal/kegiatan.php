<?PHP
	if(isset($_POST["aksi"]) or isset($_GET["aksi"])) {
		
		if(isset($_POST["aksi"])){
			$aksi = $_POST["aksi"];
		} else {
			$aksi = $_GET["aksi"];
		}
		
		if($aksi == "Komentar") {
			$isi_komentar = addslashes($_POST["komentar"]);
			$user = $_SESSION["user"];
			$id_kegiatan = $_POST["id_kegiatan"];
			$id_komunitas = $_POST["id_komunitas"];
			
			$kueri = mysqli_query($koneksi,"INSERT INTO komentar(id_user,isi_komentar,id_kegiatan,id_komunitas) VALUES ('$user','$isi_komentar','$id_kegiatan','$id_komunitas')");
			
		}
		
		if($aksi == "KegiatanEdit"){
			$id_kegiatan = $_POST["id_kegiatan"];
			$id_komunitas = $_POST["id_komunitas"];
			$nama_kegiatan = $_POST["nama_kegiatan"];
			$deskripsi_kegiatan = addslashes($_POST["deskripsi_kegiatan"]);
			
			$kueri = mysqli_query($koneksi,"UPDATE kegiatan SET id_komunitas='$id_komunitas', nama_kegiatan='$nama_kegiatan', deskripsi_kegiatan='$deskripsi_kegiatan' WHERE id_kegiatan='$id_kegiatan'");
		}
		
		if($aksi == "Hapus"){
			$id = $_GET["id"];
			$ke = $_GET["idk"];
			
			$kueri = mysqli_query($koneksi,"DELETE FROM kegiatan WHERE id_kegiatan='$id'");
			$kueri2 = mysqli_query($koneksi,"DELETE FROM komentar WHERE id_kegiatan='$id'");
			echo "<script>alert('Kegiatan Dihapus');window.location.href='index.php?laman=komunitas&id=".$ke."'</script>";
		}
		
		if($kueri) {
			echo '
					<script>
						alert("Berhasil");
					</script>
				';
		} else {
			echo '
					<script>
						alert("'.mysqli_error($koneksi).'");
					</script>
				';
		}
	}
?>