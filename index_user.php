<!DOCTYPE html>
<html>
<head>
<title>
</title>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/komunitas.css" rel='stylesheet' type='text/css' />
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
</head>
<body class="latarbelakang">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Sistem Informasi Komunitas Parepare</a>
    </div>
  </div>
</nav>

<div class="col-md-3">
	<div class="media">
		<div class="media-left media-middle">
			<img src="upload/profil/<?PHP if(isset($_SESSION["foto"])) echo $_SESSION["foto"]; else echo "default.jpg" ?>" class="media-object" style="width:90px;height:90px;">
		</div>
		<div class="media-body">
			<h4 class="media-heading"><?= $_SESSION["user"]?></h4>
			<p><?= $_SESSION["level"]?></p>
			<a href="index.php?laman=editprofil&id=<?= $_SESSION["user"]?>">Edit Profil</a>
		</div>
	</div>
	<br>
	<div class="list-group">
		<a class="list-group-item" href="index.php">Beranda</a>
		<?PHP if ($_SESSION["level"] == "admin") { ?>
		<a class="list-group-item" href="index.php?laman=user">Users</a>
		<a class="list-group-item" href="index.php?laman=listkategori">Kategori</a>
		<?PHP } ?>
		<a class="list-group-item" href="index.php?laman=listkomunitas">Komunitas</a>
		<a class="list-group-item" onclick="return confirm('Apakah anda ingin keluar?')" href="index.php?laman=logout">Keluar</a>
	</div>
</div>
<div class="container col-md-9">
	<div class="isikonten">
		<?PHP include($page) ?>
	<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</div>
	<div class="clearfix"></div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="navbar-fixed-bottom container-fluid text-center kaki">
	<p>Created By Sri Reski</p>
</footer>

</body>
</html>