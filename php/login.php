<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "", "pw_173040027") or die ("Koneksi ke DB gagal");

  if(isset($_COOKIE['id']) && isset($_COOKIE['password'])){
    $id = $_COOKIE['id'];
    $username = $_COOKIE['username'];

    $results = mysqli_query($conn, "SELECT username FROM user WHERE id=$id");
    var_dump($results);
    $row = mysqli_fetch_assoc($results);

        if($key === hash('sha256', $row['username'])){
        $_SESSION['login']=true;
    }
}

if(isset($_SESSION['login'])){
    header("location: ../admin/index.php"); 
}

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $results=mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

if(mysqli_num_rows($results) === 1){
    $row = mysqli_fetch_assoc($results);

if(password_verify($password, $row['password'])){
    $_SESSION["login"] = true;
       header("location: ../admin/index.php");
        exit();
    }    
  }
  $error = true;
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/log.css">
</head>
<body>
	<div>
		<div class="navbar nav0 nav-brand"><a href="#" ">Zikri Alhaq</a></div>
		<div class="navbar nav11 nav-click"></div>
		<div class="navbar nav1 nav-click"><a href="../index.php"">Kembali</a></div>
	</div>
	<h1>Login Admin</h1>
	<form method="POST" action="">
	<table align="center">
	<tr>
		<td class="td"></td>
		<td class="tt"><label for="username"><b>Username</b></label></td>
		<td><input type="text" name="username" id="username" placeholder="Masukkan Username" autofocus autocomplete="off"></td>
		<td class="td"></td>
	</tr>
	<tr>
		<td class="td"></td>
		<td class="tt"><label for="password"><b>Password</b></label></td>
		<td><input type="password" name="password" id="password" placeholder="Masukkan Password"></td>
		<td class="td"></td>
	</tr>
	<tr>
		<td colspan="4"><?php 
	if (isset($error)) {
			echo "Username atau Password salah!!!";
	}
	 ?></td>
	</tr>
	<tr>
		<td align="center" colspan="4"><i style="color: black;">Login : admin/admin</i></td>
	</tr>
	<tr>
		<td colspan="4"><input type="submit" name="login" value="login"></td>
	</tr>
	<tr>
		<td colspan="4" style="height: 40px;"></td>
	</tr>
	<tr>
		<td colspan="4"><b style="color: black">Atau daftar baru (klik di bawah sini)</b></td>
	</tr>
	<tr>
		<td colspan="4" class="daf"><a href="register.php" style="text-decoration: none;">Daftar !!</a></td>
	</tr>
	</table>
	</form>

</body>
</html>