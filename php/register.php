<?php 

require 'functions.php';

if(isset($_POST['register'])){

 if(register($_POST)>0){
 	echo "<script>
 		alert('User Baru ditambahkan!');
    document.location.href = 'login.php';
 		</script>"	;
 } else {
    echo "<script>
        alert('User Gagal ditambahkan! anda akan kembali ke form login');
    document.location.href = 'login.php';
        </script>"  ;
 }

	}
?>

<!DOCTYPE html>
<html>
<head>
      
<title></title>
<link rel="stylesheet" type="text/css" href="../assets/css/log.css">
</head>
<body>
    <div>
        <div class="navbar nav0 nav-brand"><a href="#" ">Zikri Alhaq</a></div>
        <div class="navbar nav11 nav-click"></div>
        <div class="navbar nav1 nav-click"><a href="../index.php"">Kembali</a></div>
    </div>
  <h1>Buat Akun Admin</h1>
  <table align="center">
  <form method="POST" action="">
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
        <td class="td"></td>
        <td class="tt"><label for="repassword"><b>Password lagi</b></label></td>
        <td><input type="password" name="repassword" id="repassword" placeholder="Masukkan sekali lagi"></td>
        <td class="td"></td>
    </tr>
    <tr>
        <td colspan="4"><input type="submit" name="register" value="register"></td>
    </tr>
  </form>

</body>
</html>