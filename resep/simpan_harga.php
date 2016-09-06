<?php
include('../config/koneksi.php');

$harga = $_GET['harga'];
$no_pendaftaran = $_GET['no_pendaftaran'];
$no_pemeriksaan = $_GET['no_pemeriksaan'];
$kd_resep = $_GET['kd_resep'];

$query = mysql_query("select * from pendaftaran where no_pendaftaran='$no_pendaftaran'");
$ambil = mysql_fetch_array($query);

$nilaiobat = mysql_query("select * from resep where kd_resep='$kd_resep'");
$ambilobat= mysql_fetch_array($nilaiobat);

$hargaasli = $ambil[6] + $harga;
$update = mysql_query("update pendaftaran set biaya='$hargaasli' where no_pendaftaran='$no_pendaftaran'");
var_dump($hargaasli,$update,$no_pendaftaran,$ambilobat[1]);
if ($update) {
  header('location:nambah.php?kd_resep=' . $kd_resep . '&&no_pendaftaran=' . $no_pendaftaran . '&&no_pemeriksaan=' . $no_pemeriksaan);
}else{
	echo "<script>alert('Data Gagal Disimpan');parent.location='nambah.php?kd_resep='$kd_resep;</script>";
}
?>