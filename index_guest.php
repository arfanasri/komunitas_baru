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
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Sistem Informasi Komunitas Parepare</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li <?PHP if(isset($navbar[0])) echo "class='active'" ?> ><a href="index.php">Beranda</a></li>
      <li <?PHP if(isset($navbar[1])) echo "class='active'" ?> ><a href="index.php?laman=kategori">Kategori</a></li>
      <li <?PHP if(isset($navbar[2])) echo "class='active'" ?> ><a href="index.php?laman=daftar">Daftar</a></li>
	  
    </ul>
  </div>
</nav>

<div class="container">
	<div class="col-md-offset-9 col-md-3">
		<form class="form-horizontal" method="POST" action="index.php?laman=listkomunitas">
			<div class="form-group">
				<div class="col-sm-10">
					<input type="text" class="form-control" name="cari" id="cari" placeholder="Cari" required>
				</div>
				<div class="col-sm-2">
					<input type="submit" class="btn btn-primary" name="btncari" value="Cari" required>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-<?PHP if($laman == "beranda") echo "9"; else echo "12"; ?>">
		<div class="container-fluid isikonten">
			<?PHP include($page) ?>
		</div>
	</div>
	<?PHP if($laman == "beranda") {?>
	<div class="col-md-3">
		<div class="container-fluid isikonten">
			<form method="post" action="ceklogin.php">
				<div class="form-group">
					<label for="username">Username :</label>
					<input type="text" name="username" class="form-control" id="username">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control" id="password">
				</div>
				<button type="submit" class="btn btn-default">Login</button>
			</form>
		</div>
	</div>
	<?PHP } ?>
	<div class="clearfix">
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>

<footer class="navbar-fixed-bottom container-fluid text-center kaki">
	Created By Sri Reski
</footer>

</body>
</html>