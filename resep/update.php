<?php
include('../config/koneksi.php');
$kd_resep = $_POST['kd_resep'];
$berapa = $_POST['berapa'];
$hari = $_POST['hari'];
$jumlah = $_POST['jumlah'];

$dosis = $berapa . " X " . $hari;

$resep = mysql_query("update resep set dosis='$dosis',jumlah='$jumlah' where kd_resep='$kd_resep'");

if ($resep) {
	echo "<script>alert('Data Berhasil Untuk Diperbarui');parent.location='index.php';</script>";
}else{
	echo "<script>alert('Data Gagal Untuk Diperbarui');parent.location='edit.php?kd_resep=$kd_resep&&key=edit';</script>";
}
?>