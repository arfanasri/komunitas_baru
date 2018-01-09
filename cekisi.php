<?PHP
	if(isset($_GET["laman"])) {
		$laman = $_GET["laman"];
	} else {
		$laman = "beranda";
	}
	
	if($laman == "beranda"){
		$page = "view/lamanutama.php";
		$navbar[0] = true;
	} else if($laman == "logout") { 
		$page = "view/logout.php";
		// masuk
	} else if($laman == "login") {
		$page = "view/login.php";
		// daftar
	} else if($laman == "daftar") {
		$page = "view/daftar.php";

	// admin
		// user
	} else if($laman == "user" and $_SESSION["level"] == "admin") {
		$page = "view/admin/user.php";
		// lihat
	} else if($laman == "lihat" and $_SESSION["level"] == "admin") {
		$page = "view/admin/lihat.php";
		// lihat User
	} else if($laman == "lihatkomuser") {
		$page = "view/admin/komunitas/lihatuser.php";
		// lihat User
	} else if($laman == "lihancalon") {
		$page = "view/admin/komunitas/lihatpendaftar.php";
		// komunitas
	} else if($laman == "listkomunitas" and $_SESSION["level"] == "admin") {
		$page = "view/admin/komunitas/list.php";
			// baru
	} else if($laman == "buatkomunitas") { 
		$page = "view/admin/komunitas/baru.php";
			// lihat
	} else if($laman == "komunitas") {
		$page = "view/admin/komunitas/lihat.php";
			// edit
	} else if($laman == "editprofilkomunitas") {
		$page = "view/admin/komunitas/edit.php";
		// kegiatan	
			// baru
	} else if($laman == "buatkegiatan") {
		$page = "view/admin/komunitas/kegiatan/buat.php";
			// lihat
	} else if($laman == "kegiatan") {
		$page = "view/admin/komunitas/kegiatan/lihat.php";
			// edit
	} else if($laman == "editkegiatan") {
		$page = "view/admin/komunitas/kegiatan/edit.php";
		// kategori
	} else if($laman == "listkategori") {
		$page = "view/admin/kategori/list.php";
	} else if($laman == "buatkategori") {
		$page = "view/admin/kategori/baru.php";
	} else if($laman == "editkategori") {
		$page = "view/admin/kategori/edit.php";

	// user
		// komunitas
	} else if($laman == "listkomunitas" and $_SESSION["level"] == "user") { 
		$page = "view/user/komunitas/list.php";
		// komunitas
	} else if($laman == "listkomunitas" and $_SESSION["level"] == "guest") { 
		$page = "view/guest/komunitas/list.php";

	// login
	} else if($laman == "editprofil") {
		$page = "view/editprofil.php";
	} else if($laman == "profil") {
		$page = "view/admin/lihat.php";
	} else if($laman == "kategori") {
		$page = "view/kategori.php";
	
	} else {
		$page = "404.php";
	}
?>