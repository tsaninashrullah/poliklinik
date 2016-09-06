<?php
include('../config/koneksi.php');

$kd_praktek = $_POST['kd_praktek'];
$nama = $_POST['nama'];
$hari = $_POST['hari'];
$jamm = $_POST['jamm'];
$menitm = $_POST['menit'];
$jams = $_POST['jams'];
$menits = $_POST['menits'];

$jam_mulai = $jamm . ":" . $menitm;
$jam_selesai = $jams . ":" . $menits;

$sql = mysql_query("insert into jadwal_praktek values('$kd_praktek','$hari','$jam_mulai','$jam_selesai','$nama')");

if($sql){
	echo "<script>alert('Data Berhasil Disimpan');parent.location='index.php';</script>";
}else{
	echo "<script>alert('Data Gagal Disimpan');parent.location='index.php';</script>";	
}