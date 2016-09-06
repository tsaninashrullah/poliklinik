<?php
include('../config/koneksi.php');

$no_pendaftaran = $_POST['no_pendaftaran'];
$jenis = $_POST['jenis'];

$history = mysql_query("insert into history_biaya values ('$no_pendaftaran','$jenis')");


$nilaijenis = mysql_query("select * from jenis_biaya where kd_jenis='$jenis'");
$ambiljenis= mysql_fetch_array($nilaijenis);

$nilai = mysql_query("select * from pendaftaran where no_pendaftaran='$no_pendaftaran'");
$ambil= mysql_fetch_array($nilai);

$harga = $ambil[6] + $ambiljenis[2];

$tambahkanharga = mysql_query("update pendaftaran set biaya='$harga' where no_pendaftaran='$no_pendaftaran'");

var_dump($ambil[6],$tambahkanharga,$ambiljenis[2]);
if ($history) {
  header('location:bayar.php?no_pendaftaran=' . $no_pendaftaran);
}else{
	echo "<script>alert('Data Gagal Disimpan');parent.location='bayar.php?no_pendaftaran='$no_pendaftaran;</script>";
}
?>