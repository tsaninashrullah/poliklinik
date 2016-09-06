<?php
include('../config/koneksi.php');
$kd_resep = $_POST['kd_resep'];
$jumlah = "0";
$no_pemeriksaan = $_POST['no_pemeriksaan'];
$no_pendaftaran = $_POST['no_pendaftaran'];

$resep = mysql_query("insert into resep values('$kd_resep','$jumlah','$no_pemeriksaan','')");

$tambahkan = mysql_query("update pemeriksaan set kd_resep='$kd_resep' where no_pemeriksaan='$no_pemeriksaan'");
if ($resep) {
  header('location:nambah.php?kd_resep=' . $kd_resep);
}else{
	echo "<script>alert('Data Gagal Untuk Disimpan');parent.location='create.php?no_pemeriksaan=$no_pemeriksaan&&no_pendaftaran=$no_pendaftaran';</script>";
}
?>