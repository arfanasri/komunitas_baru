<?PHP
	session_start();
	
	include("script/koneksi.php");
	include("helper/aa.php");
	include("helper/komunitas.php");
	include("cekisi.php");
	
	if(!isset($_SESSION["user"]) and !isset($_SESSION["level"])){
		$_SESSION["user"] = "guest";
		$_SESSION["level"] = "guest";
	}
	
	if($_SESSION["user"] == "guest") {
		include("index_guest.php");
	} else {
		include("index_user.php");
	}
?>