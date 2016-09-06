<?php
include("../config/koneksi.php");
$username = $_POST['username'];
$password = $_POST['password'];
	if ($username==""||$password==""){
		echo "<script>alert('Username atau Password belum diisi');parent.location='login.php'</script>";
		}elseif ($password==""){
		echo "<script>alert('Password belum diisi')parent.location='login.php'</script>";
		}else{
		session_start();
		$login = mysql_query("select * from login where username='$username' and password='$password'");
		if (mysql_num_rows($login) > 0){
		$_SESSION['username'] = $username;
		echo "<script>parent.location='../site/index.php'</script>";
		}else{
		echo "<script>alert('Username atau Password salah');parent.location = 'login.php'</script>";
		}
	}

?>

