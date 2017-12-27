<?PHP
	if(isset($_POST["aksi"]) or isset($_GET["aksi"])) {
		
		if(isset($_POST["aksi"])){
			$aksi = $_POST["aksi"];
		} else {
			$aksi = $_GET["aksi"];
		}
		
		if($aksi == "Baru") {
			$nama_komunitas = $_POST["nama_komunitas"];
			$id_kategori = $_POST["id_kategori"];
			if(isset($_POST["gantifoto"])){
				include("script/uploadkomunitas.php");
				$foto = $_FILES["foto"]["name"];				
			} else {
				$foto = "default.jpg";
			}
			$deskripsi_komunitas = addslashes($_POST["deskripsi_komunitas"]);
			
			$kueri = mysqli_query($koneksi,"INSERT INTO komunitas(nama_komunitas,id_kategori,logo_komunitas,deskripsi_komunitas,verifikasi_komunitas) VALUES ('$nama_komunitas','$id_kategori','$foto','$deskripsi_komunitas','tidak')");
			
			$pesanscript= "pendaftaran komunitas selesai, selanjutnya anda akan menunggu verifikasi dari admin" ;

			$id = mysqli_insert_id($koneksi);
			$user = $_SESSION["user"];
			
			$kueri2 = mysqli_query($koneksi,"INSERT INTO level(id_komunitas,level,id_user) VALUES ('$id','admin','$user')");
		}
		
		if($aksi == "KegiatanBaru"){
			$id_komunitas = $_POST["id_komunitas"];
			$nama_kegiatan = $_POST["nama_kegiatan"];
			$deskripsi_kegiatan = addslashes($_POST["deskripsi_kegiatan"]);
			$user = $_SESSION["user"];
			
			$kueri = mysqli_query($koneksi,"INSERT INTO kegiatan(nama_kegiatan,deskripsi_kegiatan,id_komunitas,id_user) VALUES ('$nama_kegiatan','$deskripsi_kegiatan','$id_komunitas','$user')");
		}
		
		if($aksi == "KegiatanEdit"){
			$id_kegiatan = $_POST["id_kegiatan"];
			$id_komunitas = $_POST["id_komunitas"];
			$nama_kegiatan = $_POST["nama_kegiatan"];
			$deskripsi_kegiatan = addslashes($_POST["deskripsi_kegiatan"]);
			
			$kueri = mysqli_query($koneksi,"UPDATE kegiatan SET id_komunitas='$id_komunitas', nama_kegiatan='$nama_kegiatan', deskripsi_kegiatan='$deskripsi_kegiatan' WHERE id_kegiatan='$id_kegiatan'");
		}
		
		if($aksi == "Ubah"){
			$id = $_POST["id"];
			$nama_komunitas = $_POST["nama_komunitas"];
			$id_kategori = $_POST["id_kategori"];
			$kuerifoto = mysqli_query($koneksi,"SELECT * FROM komunitas WHERE id_komunitas = '$id'");
			$datafoto = mysqli_fetch_array($kuerifoto);
			if(isset($_POST["gantifoto"])){
				include("script/uploadkomunitas.php");
				$foto = $_FILES["foto"]["name"];				
				if($datafoto["logo_komunitas"] != "default.jpg"){
					unlink("upload/komunitas/".$datafoto["logo_komunitas"]);
				}
			} else {
				$foto = $datafoto["logo_komunitas"];
			}
			$deskripsi_komunitas = addslashes($_POST["deskripsi_komunitas"]);
			
			$kueri = mysqli_query($koneksi,"UPDATE komunitas SET nama_komunitas='$nama_komunitas', id_kategori='$id_kategori', logo_komunitas='$foto', deskripsi_komunitas='$deskripsi_komunitas' WHERE id_komunitas='$id'");
		}
		
		if($aksi == "Gabung"){
			$id = $_GET["id"];
			$user = $_SESSION["user"];
			$cekkueri = mysqli_query($koneksi,"SELECT * FROM daftar WHERE id_komunitas = '$id' AND id_user='$user'");
			if(mysqli_num_rows($cekkueri) > 0) {
				echo "<script>alert('Anda Sudah Meminta Bergabung')</script>";
				$kueri = false;
			} else {
				echo "<script>alert('Silahkan tunggu konfirmasi dari Admin Komunitas')</script>";
				$kueri = mysqli_query($koneksi,"INSERT INTO daftar(id_komunitas,id_user) VALUES ('$id','$user')");
			}
		}
		
		if($aksi == "Terima"){
			$id = $_GET["iddaftar"];
			
			$kueriselect = mysqli_query($koneksi,"SELECT * FROM daftar WHERE id_daftar = '$id'");
			$dataselect = mysqli_fetch_array($kueriselect);
			$id_komunitas = $dataselect["id_komunitas"];
			$id_user = $dataselect["id_user"];
			// echo "<script>alert('".mysqli_error($koneksi)."');</script>";
			$kueri = mysqli_query($koneksi,"INSERT INTO level(id_komunitas,level,id_user) VALUES ('$id_komunitas','anggota','$id_user')");
			// echo "<script>alert('".mysqli_error($koneksi)."');</script>";
			$kuerihapus = mysqli_query($koneksi,"DELETE FROM daftar WHERE id_daftar = '$id'");
			// echo "<script>alert('".mysqli_error($koneksi)."');</script>";
		}
		
		if($aksi == "Promosi"){
			$id = $_GET["idl"];
			
			
			$kueri = mysqli_query($koneksi,"UPDATE level SET level = 'admin' WHERE id_level = '$id'");
		}
		if($aksi == "Kick"){
			$id = $_GET["idl"];
			
			
			$kueri = mysqli_query($koneksi,"DELETE FROM level WHERE id_level = '$id'");
		}
		
		if($aksi == "Demosi"){
			$id = $_GET["idl"];

			$idkomunitas = ambilsatudata("level","id_komunitas","id_level",$id);
			
			$kueridemosi = mysqli_query($koneksi,"SELECT * FROM level WHERE level = 'admin' AND id_komunitas = '$idkomunitas'");
			
			if(mysqli_num_rows($kueridemosi) > 1){				
				$kueri = mysqli_query($koneksi,"UPDATE level SET level = 'anggota' WHERE id_level = '$id'");
			} else {
				$kueri = false;
				$error = "Maaf Minimal Dalam 1 Komunitas Terdapat Satu Admin";
			}
			
		}
		
		if($aksi == "Verifikasi"){
			$id = $_GET["id"];
			
			$kueri = mysqli_query($koneksi,"UPDATE komunitas SET verifikasi_komunitas = 'ya' WHERE id_komunitas='$id'");
		}
		
		if($aksi == "Hapus"){
			$id = $_GET["id"];
			
			$kueri6 = mysqli_query($koneksi,"SELECT * FROM komunitas WHERE id_komunitas = '$id'");
			$datakueri6 = mysqli_fetch_array($kueri6);
			if($datakueri6["logo_komunitas"] != "default.jpg"){
				unlink("upload/komunitas/".$datakueri6["logo_komunitas"]);
			}
			
			$kueri = mysqli_query($koneksi,"DELETE FROM komunitas WHERE id_komunitas = '$id'");
			$kueri2 = mysqli_query($koneksi,"DELETE FROM level WHERE id_komunitas = '$id'");
			$kueri3 = mysqli_query($koneksi,"DELETE FROM kegiatan WHERE id_komunitas = '$id'");
			$kueri4 = mysqli_query($koneksi,"DELETE FROM daftar WHERE id_komunitas = '$id'");
			$kueri5 = mysqli_query($koneksi,"DELETE FROM komentar WHERE id_komunitas = '$id'");
		}
		
		
		if($kueri) {
		if(isset($pesanscript)) {
			echo '
				<script>
					alert ("'.$pesanscript.'");
				</script>
			';
		} else {
			echo '
				<script>
					alert ("Berhasil");
				</script>
			';
		}
		} else {
			if(isset($error)){
				echo '
						<script>
							alert("'.$error.'");
						</script>
					';
			} else {				
				echo '
						<script>
							alert("Maaf Tidak Berhasil Melakukan Aksi");
						</script>
					';
			}
		}
	}
?>