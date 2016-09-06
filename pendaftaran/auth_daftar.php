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
$no_pendaftaran = $_POST['no_pendaftaran'];
$no_urut = $_POST['no_urut'];
$kd_dokter = $_POST['kd_dokter'];
$tp = $_POST['tp'];
$username = $_POST['username'];

$tanggalr = date("Y-m-d");
$tanggall = $tahun . "/" . $bln . "/" . $tgl;

$pasien = mysql_query("insert into pasien values('$kd_pasien','$nama','$alamat','$telp','$tanggall','$jk','$tanggalr')");
$pendaftaran = mysql_query("insert into pendaftaran values('$no_pendaftaran','$tp','$no_urut','$kd_pasien','$kd_dokter','','$username','0')");

if ($pasien&&$pendaftaran) {
  header('location:bayar.php?no_pendaftaran=' . $no_pendaftaran);
}else{
	echo "<script>alert('Data Gagal Untuk Disimpan');parent.location='create.php';</script>";
}
?>