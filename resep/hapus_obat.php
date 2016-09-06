<?php
include('../config/koneksi.php');

$kd_obat = $_GET['kd_obat'];
$kd_resep = $_GET['kd_resep'];

$queryperiksa = mysql_query("select * from resep where kd_resep='$kd_resep'");
$ambilper = mysql_fetch_array($queryperiksa);

$query = mysql_query("select * from pemeriksaan where no_pemeriksaan='$ambilper[2]'");
$ambil = mysql_fetch_array($query);

$nilaiobats = mysql_query("select * from history_obat where kd_obat='$kd_obat' AND kd_resep='$kd_resep'");
$ambilobats = mysql_fetch_array($nilaiobats);

$nilaiobat = mysql_query("select * from obat where kd_obat='$kd_obat'");
$ambilobat= mysql_fetch_array($nilaiobat);

$kali = $ambilobat[4] * $ambilobats[3];

$nilai = mysql_query("select * from pendaftaran where no_pendaftaran='$ambil[9]'");
$ambilw= mysql_fetch_array($nilai);
$harga = $ambilw[6] - $kali;

$nilairesep = mysql_query("select * from resep where kd_resep='$kd_resep'");
$ambilresep= mysql_fetch_array($nilairesep);
$jumlahresep = $ambilresep[1] - $ambilobats[3];
$biayaresep = $ambilresep[3] - $kali;
$tambahkanjumlahresep = mysql_query("update resep set jumlah='$jumlahresep', biaya='$biayaresep' where kd_resep='$kd_resep'");

$tambahkanharga = mysql_query("update pendaftaran set biaya='$harga' where no_pendaftaran='$ambilw[0]'");
$delete = mysql_query("delete from history_obat where kd_obat='$kd_obat' AND kd_resep='$kd_resep'");

?>
<script type="text/javascript">
	alert('Data Berhasil Disimpan');
	parent.location='index.php';
</script>