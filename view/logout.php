<?PHP
	session_unset();
	session_destroy();
?>
<script>
	window.location.href="index.php";
	alert("Selamat Anda Berhasil Logout");
</script>