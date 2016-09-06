<?php
include('../config/koneksi.php');

$kd_obat = $_POST['kd_obat'];
$nama = $_POST['nama'];
$merk = $_POST['merk'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga'];

$nambah = mysql_query("update obat set nama='$nama',merk='$merk',satuan='$satuan',harga='$harga' where kd_obat='$kd_obat'");

if ($nambah) {
	echo "<script>alert('Data Berhasil Diperbarui');parent.location='index.php';</script>";
}else{
	echo "<script>alert('Data Gagal Diperbarui');parent.location='edit.php?kd_obat=$kd_obat&&key=edit';</script>";
}
?>