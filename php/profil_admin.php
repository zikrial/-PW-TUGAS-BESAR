<?php 
	if (!isset($_GET['nomor'])) {
		header("Location: ../admin/index.php");
		exit;
	}

	require 'functions.php';
	$nomor = $_GET['nomor'];

	$pen = query("SELECT nomor, penemu, temuan, nama_negara, tahun_ditemukan, gambar_penemu FROM penemu_terkenal NATURAL JOIN negara WHERE nomor = $nomor")[0];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/css.css">

 </head>
 <body>
 	<div>
		<div class="navbar nav0 nav-brand"><a href="#" ">M Zikri Alhaq</a></div>
		<div class="navbar navx nav-click"></div>
		<div class="navbar nav1 nav-click"><a href="../index.php"">Logout</a></div>
	</div>
 	<h1>Profil Penemu</h1>
 	<table align="center">
	 	<tr><td><img src="../assets/image/<?= $pen['gambar_penemu'] ?>"></td></tr>
	 	<tr><td>Urutan : <?= $pen['nomor'] ?></td></tr>
	 	<tr><td>Nama Penemu : <?= $pen['penemu'] ?></td></tr>
	 	<tr><td>Temuan : <?= $pen['temuan'] ?></td></tr>
	 	<tr><td>Asal Negara : <?= $pen['nama_negara'] ?></td></tr>
	 	<tr><td>Tahun Ditemukan : <?= $pen['tahun_ditemukan'] ?></td></tr>
	 	
	 </table>
 	<div class="kembali" align="center"><a href="../admin/index.php">Kembali</a></div>
 </body>
 </html>