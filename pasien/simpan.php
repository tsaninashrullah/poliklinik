<?php
include('../config/koneksi.php');

$kd_pasien = $_POST['kd_pasien'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$tgl = $_POST['tgl'];
$jk = $_POST['jk'];
$bln = $_POST['bln'];
$tahun = $_POST['tahun'];
$tglr = $_POST['tglr'];
$blnr = $_POST['blnr'];
$tahunr = $_POST['tahunr'];
$tanggall = $tahun . "/" . $bln . "/" . $tgl;
$tanggalr = $tahunr . "/" . $blnr . "/" . $tglr;

$pasien = mysql_query("insert into pasien values('$kd_pasien','$nama','$alamat','$telp','$tanggall','$jk','$tanggalr')");

if($pasien){
	echo "<script>alert('Data Berhasil Disimpan');parent.location='index.php';</script>";
}else{	
	echo "<script>alert('Data Gagal Disimpan');parent.location='index.php';</script>";
}
?>