<?php 
	require '../php/functions.php';
	$nomor = $_GET['nomor'];

	if(hapus($nomor) > 0) {
		echo "<script>
				alert('Data berhasil dihapus!');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo "<script>
				alert('Data gagal dihapus!');
				document.location.href = 'index.php';
			</script>";
	}
 ?>