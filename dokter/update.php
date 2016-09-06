<?php
include('../config/koneksi.php');

$kd_dokter = $_POST['kd_dokter'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jk = $_POST['jk'];
$kd_poli = $_POST['kd_poli'];

$dokter = mysql_query("update dokter set nama_dokter='$nama', alamat='$alamat', telp='$telp', j_kel='$jk',kd_poli='$kd_poli' where kd_dokter='$kd_dokter'");
if ($dokter) {
	echo "<script>alert('Data Berhasil Diperbarui');parent.location='index.php';</script>";
}else{
	echo "<script>alert('Data Gagal Diperbarui');parent.location='index.php';</script>";
}
?>