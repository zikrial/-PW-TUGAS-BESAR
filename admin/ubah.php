<?php 
	require '../php/functions.php';

 	$nomor = $_GET['nomor'];
	$pen = query("SELECT * FROM penemu_terkenal WHERE nomor = '$nomor'")[0];

	if (isset($_POST['ubah'])) {
		if(ubah($_POST) > 0) {
			echo "<script>
					alert('Data Berhasil diubah!');
					document.location.href = 'index.php';
					</script>";
		} else {
			echo "<script>
					alert('Data Gagal diubah!');
					document.location.href = 'index.php';
					</script>";
		}
	}
		$negara = query("SELECT * FROM negara");
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/change.css">
	<style type="text/css">
		select {
		    width: 800px;
		    padding: 15px 20px;
		    border: none;
		    border-radius: 5px;
		    border: 2px solid;
		}
		option {
			color: white;
			background-color: black;
		}
	</style>
</head>
<body>
	<h1 align="center">Ubah Data Penemu</h1>
<table align="center" cellspacing="10" cellpadding="10">
	<form action="" method="POST" enctype="multipart/form-data">
	<tr>
		<td><label for="nomor">Nomor</label></td>
		<td><input type="text" name="nomor" id="nomor" value="<?php echo $pen['nomor'] ?>" placeholder="Diisi harus berurutan" autofocus autocomplete="off"></td>
	</tr>
	<tr>
		<td><label for="penemu">Nama Penemu</label></td>
		<td><input type="text" name="penemu" id="penemu" value="<?php echo $pen['penemu'] ?>" placeholder="Masukkan nama penemu" autocomplete="off"></td>
	</tr>
	<tr>
		<td><label for="temuan">Temuan</label></td>
		<td><input type="text" name="temuan" id="temuan" value="<?php echo $pen['temuan'] ?>" placeholder="Masukkan nama temuan" autocomplete="off"></td>
	</tr>
	<tr>
		<td><label for="id_negara">Asal Negara</label></td>
		<td><select name="id_negara" id="id_negara">
			<?php foreach ($negara as $n) { ?>
			<option value="<?= $n['id_negara'] ?>"><?= $n['nama_negara']; ?></option>
			<?php } ?>
		</select></td>
	</tr>
	<tr>
		<td><label for="tahun_ditemukan">Tahun Ditemukan</label></td>
		<td><input type="text" name="tahun_ditemukan" id="tahun_ditemukan" value="<?php echo $pen['tahun_ditemukan'] ?>" placeholder="Masukkan tahun temuan ditemukan" autocomplete="off"></td>
	</tr>
	<tr>
		<td><label for="gambar_penemu">Foto Penemu</label></td>
		<td><input type="file" name="gambar_penemu" id="gambar_penemu" value="<?php echo $pen['gambar_penemu'] ?>"></td>
	</tr>
	<tr>
		<td><button type="submit" name="ubah">Ubah</button></td>
		<td><button><a href="index.php">Kembali</a></button></td>
	</tr>
	</form>
	</table>

</body>
</html>