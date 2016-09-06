<?php
include('../config/koneksi.php');

$kd_resep = $_POST['kd_resep'];
$kd_obat = $_POST['kd_obat'];
$no_pendaftaran = $_POST['no_pendaftaran'];
$no_pemeriksaan = $_POST['no_pemeriksaan'];
$berapa = $_POST['berapa'];
$hari = $_POST['hari'];
$jumlah = $_POST['jumlah'];

$dosis = $berapa . " X " . $hari;


$nilaiobat = mysql_query("select * from obat where kd_obat='$kd_obat'");
$ambilobat= mysql_fetch_array($nilaiobat);

// proses pengambilan dan pemasukkan nilai obat dan jumlah harga
$kali = $ambilobat[4] * $jumlah;
// selesai penjumlahan biaya total

$cekada = mysql_query("select * from history_obat where kd_resep='$kd_resep' AND kd_obat='$kd_obat'");
if (mysql_num_rows($cekada) > 0) {
	$ambilduli = mysql_fetch_array($cekada);
	$jumlahcopy = $ambilduli[3] + $jumlah;
	$kalis = $ambilobat[4] * $jumlahcopy;
	$updateobatada = mysql_query("update history_obat set jumlah='$jumlahcopy', biaya='$kalis' where kd_resep='$kd_resep' AND kd_obat='$kd_obat'");
}else{
	$nambah = mysql_query("insert into history_obat values('$kd_resep','$kd_obat','$dosis','$jumlah','$kali')");
}

$nilai = mysql_query("select * from pendaftaran where no_pendaftaran='$no_pendaftaran'");
$ambil= mysql_fetch_array($nilai);

$harga = $ambil[7] + $kali;

$tambahkanharga = mysql_query("update pendaftaran set biaya='$harga' where no_pendaftaran='$no_pendaftaran'");

echo mysql_error();
// Ini bagian memperbarui jumlah obat pada resep tertentu
$nilairesep = mysql_query("select * from resep where kd_resep='$kd_resep'");
$ambilresep= mysql_fetch_array($nilairesep);
$jumlahresep = $ambilresep[1] + $jumlah;
$biayaresep = $ambilresep[3] + $kali;
$tambahkanjumlahresep = mysql_query("update resep set jumlah='$jumlahresep', biaya='$biayaresep' where kd_resep='$kd_resep'");
// ini akhirnya


if ($tambahkanjumlahresep) {
  // header('location:simpan_harga.php?kd_resep=' . $kd_resep . '&&no_pendaftaran=' . $no_pendaftaran . '&&no_pemeriksaan=' . $no_pemeriksaan . '&&harga=' . $kali);
  header('location:nambah.php?kd_resep=' . $kd_resep . '&&no_pendaftaran=' . $no_pendaftaran . '&&no_pemeriksaan=' . $no_pemeriksaan);
}else{
	echo "<script>alert('Data Gagal Disimpan');parent.location='nambah.php?kd_resep='$kd_resep;</script>";
}
?>