<?php
include('../config/koneksi.php');

$kd_jenis = $_POST['kd_jenis'];
$nama = $_POST['nama'];
$besar = $_POST['besar'];
$sql = mysql_query("update jenis_biaya set nama_biaya='$nama', biaya='$besar' where kd_jenis='$kd_jenis'");

if($sql){
	echo "<script>alert('Data Berhasil Diperbarui');parent.location='index.php';</script>";
}else{	
	echo "<script>alert('Data Gagal Diperbarui');parent.location='edit.php?kd_jadwal=" . $kd_jadwal . "&&key=edit';</script>";
}
?>