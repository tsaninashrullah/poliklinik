<?php
include('../config/koneksi.php');

$nip = $_POST['nip'];
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];
$telp = $_POST['telp'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$tanggal = $_POST['tanggal'];

$login = mysql_query("update login set username='$username', password='$password', status='$status' where username='$username'");
$pegawai = mysql_query("update pegawai set nama='$nama', alamat='$alamat', telp='$telp', tgl_lahir='$tanggal', j_kel='$jk', username='$username' where nip=$nip");
if ($login&&$pegawai) {
	echo "<script>alert('Data Pegawai $nama Berhasil Diperbarui');parent.location='index.php';</script>";
}else{
	echo "<script>alert('Data Pegawai $nama Gagal Diperbarui');parent.location='edit.php?nip=" . $nip . "&key==edit'</script>";
}
?>