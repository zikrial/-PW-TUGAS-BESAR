<?php 
	require '../../php/functions.php';
	$keyword = $_GET["keyword"];

	$query = "SELECT nomor, penemu, temuan, nama_negara, tahun_ditemukan, gambar_penemu FROM penemu_terkenal NATURAL JOIN negara WHERE
			nomor LIKE '%$keyword%' OR 
			penemu LIKE '%$keyword%' OR 
			temuan LIKE '%$keyword%' OR 
			nama_negara LIKE '%$keyword%' OR 
			tahun_ditemukan LIKE '%$keyword%'";
	$penemu = query($query);

 ?>
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