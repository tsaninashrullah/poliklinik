<?php
include('../config/koneksi.php');

$kd_poli = $_POST['kd_poli'];
$nama = $_POST['nama'];
$sql = mysql_query("insert into poliklinik values('$kd_poli','$nama')");

if($sql){
	echo "<script>alert('Data Berhasil Disimpan');parent.location='index.php';</script>";
}else{	
	echo "<script>alert('Data Gagal Disimpan');parent.location='index.php';</script>";
}
?>