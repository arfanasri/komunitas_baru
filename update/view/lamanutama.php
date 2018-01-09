<?PHP if($_SESSION["level"] == "guest" ){?>
<div class="text-justify">
	<p>Selamat datang Di Situs Laman SISTEM INFORMASI KOMUNITAS PAREPARE BERBASIS WEB.<br><p>
	Di Laman ini akan menjadi sebagai wadah penyebaran informasi secara meluas tentang komunitas komunitas di parepare, dan juga  wadah untuk mempromosikan komunitas agar dapat merekrut banyak anggota.
	Anda para calon peminat juga tidak akan kesulitan mencari informasi lagi tentang komunitas yang anda minati.<br><p>Untuk mengetahui komunitas apa saja yang ada,masuk pada tab menu "Kategori".
	jika ingin mendaftar komunitas Anda, Maka Diharuskan Anda mengisi form pendaftaran pada Tab Menu "Daftar" dan mendapatkan username juga password yang akan Anda pakai mendaftar komunitas baru, begitupun jika ingin bergabung menjadi anggota di komunitas. SELAMAT MENCOBA!</p>
</div>
<?PHP } else if($_SESSION["level"] == "admin" ){ ?>
<div class="text-justify">
	<p>Selamat Datang di Situs Admin WEB, anda bisa mengontrol komunitas apa yang ingin mendaftarkan dirinya di Web ini, dan melihat siapa saja users yang ada,anda bisa menghapus dan mempromosikan sekaligus mendemosikan users yang ada. Pada Menu Kategori anda dapat menambahkan  dan menghapus Kategori  yang ada.</p>
</div>
<?PHP } else if($_SESSION["level"] == "user" ){ ?>
<div class="text-justify">
	<p>Selamat, Anda sudah mempunyai akun , selanjutnya jika anda ingin mengedit profil anda, maka Klik "edit Profil", Jika ingin bergabung di komunitas yang ada silahkan klik "Komunitas", dan jika ingin  membuat komunitas sendiri maka di form komunitas klik tombol  "buat". selanjutnya akan di verifikasi oleh admin komunitasnya.Selamat mecoba!</p>
</div>
<?PHP } ?>