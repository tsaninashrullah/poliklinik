<?php
include('../config/koneksi.php');

$kd_jenis = $_POST['kd_jenis'];
$nama = $_POST['nama'];
$besar = $_POST['besar'];
$sql = mysql_query("insert into jenis_biaya values('$kd_jenis','$nama','$besar')");

if($sql){
	echo "<script>alert('Data Berhasil Disimpan');parent.location='index.php';</script>";
}else{	
	echo "<script>alert('Data Gagal Disimpan');parent.location='index.php';</script>";
}
?>