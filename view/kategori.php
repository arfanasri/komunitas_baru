<div class="text-center">
	<h2>Kategori Komunitas</h2>
</div>
<div class="list-group">
<?PHP
	$kueri = ambildata("kategori");
	while($data = mysqli_fetch_array($kueri)) {
		echo "<a class='list-group-item' href='index.php?laman=listkomunitas&idkategori=".$data["id_kategori"]."'>".$data["nama_kategori"]."</a>";
	}
?>
</div>