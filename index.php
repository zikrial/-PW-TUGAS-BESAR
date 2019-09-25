<?php 
	require 'php/functions.php';
	$penemu = query("SELECT nomor, penemu, temuan, nama_negara, tahun_ditemukan, gambar_penemu FROM penemu_terkenal NATURAL JOIN negara");

	if(isset($_POST["cari"])) {
		$penemu = cari($_POST["keyword"]);
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="assets/css/css.css">
</head>
<body>
	<div>
		<div class="navbar nav0 nav-brand"><a href="#" ">Zikri Alhaq</a></div>
		<div class="navbar nav11 nav-click">
		<form action="" method="POST">
	 	<input type="text" name="keyword" id="keyword" placeholder="Kolom Pencarian..." autofocus autocomplete="off">
	 	</form>
		</div>
		<div class="navbar nav2 nav-click"><a href="admin/cetak.php" target="_blank">Cetak Halaman</a></div>
		<div class="navbar nav1 nav-click"><a href="php/login.php"">Login</a></div>
	</div>
	 <h1>PENEMU - PENEMU TERKENAL DI DUNIA</h1>
	 <div class="tidak">
	 	<h1>Data tidak ditemukan <br> Coba Lagi</h1>
	 </div>
	 <div id="container">

	 <table align="center">
		<?php foreach ($penemu as $pen) : ?>
		<tr>
			<th colspan="7">Profil Penemu</th>
		</tr>
		<tr><td colspan="7"><img src="assets/image/<?= $pen['gambar_penemu'] ?>" width="150px" height="200px"></td></tr>
	 	<tr>
	 		<td width="200px">Nama Penemu</td>
	 		<td colspan="5"><?= $pen['penemu'] ?></td></tr>
	 	<tr>
	 		<td width="200px">Temuan</td>
	 		<td colspan="5"><?= $pen['temuan'] ?></td></tr>
	 	<tr>
	 		<td width="200px">Asal Negara</td>
	 		<td colspan="5"><?= $pen['nama_negara'] ?></td></tr>
	 	<tr>
	 		<td width="200px">Tahun Ditemukan</td>
	 		<td colspan="5"><?= $pen['tahun_ditemukan'] ?></td></tr>
	 	<?php endforeach ?>
	 	</table>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>