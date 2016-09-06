<?php
include('../config/koneksi.php');

$cek = mysql_query("select * from login where username='$username'");
$cek_status = mysql_fetch_array($cek);
if ($cek_status['status']=="0") {
	echo "<script>alert('Halaman Yang Anda Akses, Tidak Diperkenankan Untuk Diakses');parent.location='../site/index.php';</script>";
}
?>