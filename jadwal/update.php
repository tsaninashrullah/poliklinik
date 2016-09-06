<?php
include('../config/koneksi.php');

$kd_praktek = $_POST['kd_praktek'];
$nama = $_POST['nama'];
$hari = $_POST['hari'];
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];

$sql = mysql_query("update jadwal_praktek set kd_dokter='$nama', hari='$hari', mulai='$jam_mulai', selesai='$jam_selesai' where kd_praktek='$kd_praktek'");

if($sql){
	echo "<script>alert('Data Berhasil Diperbarui');parent.location='index.php';</script>";
}else{
	echo "<script>alert('Data Gagal Diperbarui');parent.location='edit.php?kd_praktek=' . $kd_praktek . '&&key=edit';</script>";	
}