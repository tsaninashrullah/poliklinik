<?php
include('../config/koneksi.php');

$kd_poli = $_POST['kd_poli'];
$nama = $_POST['nama'];
$sql = mysql_query("update poliklinik set nama_poli='$nama' where kd_poli='$kd_poli'");

if($sql){
	echo "<script>alert('Data Berhasil Diperbarui');parent.location='index.php';</script>";
}else{	
	echo "<script>alert('Data Gagal Diperbarui');parent.location='index.php';</script>";
}
?>