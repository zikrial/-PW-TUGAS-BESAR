<?php 
	function koneksi(){
		$conn = mysqli_connect("localhost", "root", "") or die("Koneksi ke DB gagal!");
		mysqli_select_db($conn, "pw_173040027") or die("Database salah!");

		return $conn;
	}


	function query($sql){
		$conn = koneksi();
		$results = mysqli_query($conn, "$sql");

		$rows = [];
		while ($row = mysqli_fetch_assoc($results)) {
			$rows[] = $row;
		};
		return $rows;
	}
 	function tambah($data) {
 		$conn = koneksi();

 		$nomor = htmlspecialchars($data['nomor']);
 		$penemu = htmlspecialchars($data['penemu']);
 		$temuan = htmlspecialchars($data['temuan']);
 		$id_negara = htmlspecialchars($data['id_negara']);
 		$tahun_ditemukan = htmlspecialchars($data['tahun_ditemukan']);

		$gambar_penemu = upload();

		if( !$gambar_penemu ) {
			return false;
		}

 		$querytambah = "INSERT INTO penemu_terkenal
 						VALUES ('$nomor', '$penemu', '$temuan', '$id_negara', '$tahun_ditemukan', '$gambar_penemu')";

 		mysqli_query($conn, $querytambah);

 		return mysqli_affected_rows($conn);
 	}
 	function upload() {
 		$namaFile = $_FILES['gambar_penemu']['name'];
 		$error = $_FILES['gambar_penemu']['error'];
 		$tmpName = $_FILES['gambar_penemu']['tmp_name'];

 		if( $error === 4 ) {
 			echo "<script>
 					alert('Anda harus memasukkan gambar terlebih dahulu');
 					</script>";
 			return false;
 		}

 		$TipeGambarValid = ['jpg', 'jpeg', 'png'];
 		$TipeGambar = explode('.', $namaFile);
 		$TipeGambar = strtolower(end($TipeGambar));

 		if ( !in_array($TipeGambar, $TipeGambarValid) ) {
 			echo "<script>
 					alert('Jangan mengupload selain gambar');
 					</script>";
 			return false;
 		}
 		move_uploaded_file($tmpName, '../assets/image/' . $namaFile);
 		return $namaFile;
 	}

 	function hapus($nomor) {
 		$conn = koneksi();
 		mysqli_query($conn, "DELETE FROM penemu_terkenal WHERE nomor = $nomor");

 		return mysqli_affected_rows($conn);
 	}
 	function ubah($data) {
 		$conn = koneksi();

 		$nomor = htmlspecialchars($data['nomor']);
 		$penemu = htmlspecialchars($data['penemu']);
 		$temuan = htmlspecialchars($data['temuan']);
 		$id_negara = htmlspecialchars($data['id_negara']);
 		$tahun_ditemukan = htmlspecialchars($data['tahun_ditemukan']);
 
		$gambar_penemu = upload();

		if( !$gambar_penemu ) {
			return false;
		}

 		$queryubah = "UPDATE penemu_terkenal
 						SET 
 							nomor = '$nomor',
 							penemu = '$penemu',
 							temuan = '$temuan',
 							id_negara = '$id_negara',
 							tahun_ditemukan = '$tahun_ditemukan',
 							gambar_penemu = '$gambar_penemu'
 						WHERE nomor = $nomor";

 		mysqli_query($conn, $queryubah);

 		return mysqli_affected_rows($conn);
 	}

 	function cari($keyword) {
 		$query = "SELECT nomor, penemu, temuan, nama_negara, tahun_ditemukan, gambar_penemu FROM penemu_terkenal NATURAL JOIN negara WHERE 
 			nomor LIKE '%$keyword%' OR 
			penemu LIKE '%$keyword%' OR 
			temuan LIKE '%$keyword%' OR 
			nama_negara LIKE '%$keyword%' OR 
			tahun_ditemukan LIKE '%$keyword%'";

		return query($query);
 	}
 	function register($data){
	$conn = koneksi();
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 =  mysqli_real_escape_string($conn, $data["password2"]);

	$results = mysqli_query($conn,"SELECT username FROM user WHERE
		 username = '$username' ");
	if(mysqli_fetch_assoc($results)){
		echo "<script> 
		alert ('Username sudah terdaftar');
		</script>";
		return false;
	}
	if($username == is_null($username)){
		echo "<script> 
		alert ('Username tidak boleh kosong');
		</script>";
		return false;
	}
	if($password !== $password2){
		echo "<script> 
		alert ('Password yang diinput tidak sama');
		</script>";
		return false;
	}
	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($conn, "INSERT INTO user VALUES
		('', '$username', '$password')");
		return mysqli_affected_rows($conn);
}
 ?>