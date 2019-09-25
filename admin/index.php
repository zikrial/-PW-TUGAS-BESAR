<?php 
session_start();

 ?>

<?php 
	require '../php/functions.php';
	$penemu = query("SELECT nomor, penemu, temuan, nama_negara, tahun_ditemukan, gambar_penemu FROM penemu_terkenal NATURAL JOIN negara");

	if(isset($_POST["cari"])) {
		$penemu = cari($_POST["keyword"]);
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/css.css">
</head>
<body>
	<div>
		<div class="navbar nav0 nav-brand"><a href="#" ">Zikri Alhaq</a></div>
		<div class="navbar nav11 nav-click">
	 	<form action="" method="POST">
	 	<input type="text" name="keyword" id="keyword" placeholder="Search..." autofocus autocomplete="off">
	 	</form>	
		</div>
		<div class="navbar nav3 nav-click"><a href="cetak.php" target="_blank">Cetak Halaman</a></div>
		<div class="navbar nav2 nav-click"><a href="tambah.php">Tambah Data Penemu</a></div>
		<div class="navbar nav1 nav-click"><a href="../php/logout.php"">Logout</a></div>
	</div>
	 <h1>PENEMU - PENEMU TERKENAL DI DUNIA</h1>
	 
	 <div id="container">
	 <table align="center">
		<tr>
			<th>No</th>
			<th>Nama Penemu</th>
			<th>Temuan</th>
			<th>Asal Negara</th>
			<th>Tahun Ditemukan</th>
			<th>Foto Penemu</th>
			<th>Opsi</th>
		</tr>
		<?php if(empty($penemu)) :?>
			<tr>
				<td colspan="7">
					<h1 align="center" style="color: black;">Data tidak ditemukan!</h1>
				</td>
			</tr>
		<?php else : ?>
		<?php foreach ($penemu as $pen) : ?>

	 	<tr><td><?= $pen['nomor'] ?></td>
	 	<td><?= $pen['penemu'] ?></td>
	 	<td><?= $pen['temuan'] ?></td>
	 	<td><?= $pen['nama_negara'] ?></td>
	 	<td><?= $pen['tahun_ditemukan'] ?></td>
	 	<td><img src="../assets/image/<?= $pen['gambar_penemu'] ?>" width="150px" height="200px"></td>
	 	<td>
	 		<a href="ubah.php?nomor=<?= $pen['nomor'];?>">Ubah</a>
	 		<a href="hapus.php?nomor=<?= $pen['nomor'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ?')">Hapus</a>
	 		<a href="../php/profil_admin.php?nomor=<?php echo $pen['nomor'] ?>">Detail</a>
	 	</td></tr>
	 <?php endforeach ?>
	<?php endif ?>
	 </table>
	 </div>
<script src="../assets/js/scriptAdmin.js"></script>

</body>
</html>