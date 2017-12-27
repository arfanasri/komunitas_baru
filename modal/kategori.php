<?PHP
	if(isset($_POST["aksi"]) or isset($_GET["aksi"])) {
		
		if(isset($_POST["aksi"])){
			$aksi = $_POST["aksi"];
		} else {
			$aksi = $_GET["aksi"];
		}
		
		if($aksi == "Baru") {
			$nama_kategori = $_POST["nama_kategori"];
			
			$kueri = mysqli_query($koneksi,"INSERT INTO kategori(nama_kategori) VALUES ('$nama_kategori')");
		}
		
		if($aksi == "Ubah") {
			$id = $_POST["id"];
			$nama_kategori = $_POST["nama_kategori"];
			
			$kueri = mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id'");
		}
		
		
		if($aksi == "Hapus") {
			$id = $_GET["id"];
			
			$kueri = mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori='$id'");
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