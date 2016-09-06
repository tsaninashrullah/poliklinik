<?php
include('../config/koneksi.php');

$no_pemeriksaan = $_POST['no_pemeriksaan'];
$keluhan = $_POST['keluhan'];
$diagnosa = $_POST['diagnosa'];
$perawatan = $_POST['perawatan'];
$tindakan = $_POST['tindakan'];
$bb = $_POST['bb'];
$td = $_POST['td'];
$ts = $_POST['ts'];
$kd_resep = $_POST['kd_resep'];
$no_pendaftaran = $_POST['no_pendaftaran'];

$sql = mysql_query("update pemeriksaan set keluhan='$keluhan',diagnosa='$diagnosa',perawatan='$perawatan',tindakan='$tindakan',berat_badan='$bb',tensi_diastolik='$td',tensi_sistolik='$ts',kd_resep='$kd_resep',no_pendaftaran='$no_pendaftaran' where no_pemeriksaan='$no_pemeriksaan'");

if($sql){
	echo "<script>alert('Data Berhasil Diperbarui');parent.location='index.php';</script>";
}else{	
	echo "<script>alert('Data Gagal Diperbarui');parent.location='edit.php?no_pemeriksaan=$no_pemeriksaan&&key=edit';</script>";
}
?>