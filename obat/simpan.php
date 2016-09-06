<?php
include('../config/koneksi.php');

$kd_resep = $_POST['kd_resep'];
$kd_obat = $_POST['kd_obat'];
$nama = $_POST['nama'];
$merk = $_POST['merk'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga'];

$nambah = mysql_query("insert into obat values('$kd_obat','$nama','$merk','$satuan','$harga')");

if ($nambah) {
	echo "<script>alert('Data Berhasil Disimpan');parent.location='index.php';</script>";
}else{
	echo "<script>alert('Data Gagal Disimpan');parent.location='index.php';</script>";
}
?>