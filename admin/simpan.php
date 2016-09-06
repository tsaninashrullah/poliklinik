<?php
include('../config/koneksi.php');

$nip = $_POST['nip'];
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$tgl = $_POST['tgl'];
$bln = $_POST['bln'];
$tahun = $_POST['tahun'];
$jk = $_POST['jk'];

$tanggal = $tahun . "/" . $bln . "/" . $tgl;

$pegawai = mysql_query("insert into pegawai values('$nip','$nama','$alamat','$telp','$tanggal','$jk','$username')");
$login = mysql_query("insert into login values('$username','$password','$status')");

if ($login&&$pegawai) {
	echo "<script>alert('Data Pegawai $nama Berhasil Disimpan');parent.location='index.php';</script>";
}else{
	echo "<script>alert('Data Pegawai $nama Gagal Disimpan');parent.location='index.php';</script>";
}
?>