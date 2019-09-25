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
	 <div id="container">
		<?php foreach ($penemu as $pen) : ?>
	 <table align="center">
		<tr>
			<th colspan="7">Profil Penemu</th>
		</tr>
		<?php if(empty($penemu)) :?>
			<tr>
				<td colspan="7">
					<h1 align="center" style="color: black;">Data tidak ditemukan!</h1>
				</td>
			</tr>
		<?php else : ?>
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
		<?php endif ?>
	 	</table>
	 	<?php endforeach ?>
</div>