<?php
include('../config/koneksi.php');


$no_pendaftaran = $_POST['no_pendaftaran'];
$no_urut = $_POST['no_urut'];
$kd_dokter = $_POST['kd_dokter'];
$kd_pasien = $_POST['kd_pasien'];
$tp = $_POST['tp'];
$username = $_POST['username'];
$nilai = 0;
$pendaftaran = mysql_query("insert into pendaftaran values('$no_pendaftaran','$tp','$no_urut','$kd_pasien','$kd_dokter','','$username','$nilai')");

if ($pendaftaran) {
  header('location:bayar.php?no_pendaftaran=' . $no_pendaftaran);
}else{
	echo "<script>alert('Data Gagal Untuk Disimpan');parent.location='creates.php';</script>";
}
?>