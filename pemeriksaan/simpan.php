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
$no_urut = $_POST['no_urut'];
$date = date("Y-m-d");

$pendaftaran = mysql_query("select * from pendaftaran where no_urut='$no_urut' AND tgl_pendaftaran='$date'");
$ambildaftar = mysql_fetch_array($pendaftaran);
$periksa = mysql_query("update pendaftaran set no_pemeriksaan='$no_pemeriksaan' where no_urut='$no_urut' AND tgl_pendaftaran='$date'");
$sql = mysql_query("insert into pemeriksaan values('$no_pemeriksaan','$keluhan','$diagnosa','$perawatan','$tindakan','$bb','$td','$ts','','$ambildaftar[0]')");

if($sql){
	echo "<script>alert('Data Berhasil Disimpan');parent.location='../resep/create.php?no_pemeriksaan=$no_pemeriksaan&&no_pendaftaran=$ambildaftar[0]';</script>";
}else{	
	echo "<script>alert('Data Gagal Disimpan');parent.location='index.php';</script>";
}
?>