<?php
include('../config/koneksi.php');

$kd_dokter = $_POST['kd_dokter'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jk = $_POST['jk'];
$kd_poli = $_POST['kd_poli'];

$dokter = mysql_query("insert into dokter values('$kd_dokter','$nama','$alamat','$telp','$jk','$kd_poli')");
if ($dokter) {
	echo "<script>alert('Data Berhasil Disimpan');parent.location='index.php';</script>";
}else{
	echo "<script>alert('Data Gagal Disimpan');parent.location='index.php';</script>";
}
?>