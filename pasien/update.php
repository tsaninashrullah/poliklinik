<?php
include('../config/koneksi.php');

$kd_pasien = $_POST['kd_pasien'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jk = $_POST['jk'];
$tanggal = $_POST['tanggal'];
$tanggals = $_POST['tanggals'];

$pasien = mysql_query("update pasien set nama='$nama',alamat='$alamat',telp='$telp',tgl_lahir='$tanggal',j_kel='$jk',tgl_registrasi='$tanggals' where kd_pasien='$kd_pasien'");

if ($pasien) {
	echo "<script>alert('Data Berhasil Diperbarui');parent.location='index.php';</script>";
}else{
	echo "<script>alert('Data Gagal Diperbarui');parent.location='index.php';</script>";
}
?>