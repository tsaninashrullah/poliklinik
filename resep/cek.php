<?php
include('../config/koneksi.php');
$nilai = mysql_query("select * from pendaftaran where no_pendaftaran='D0001'");
$ambil= mysql_fetch_array($nilai);
var_dump($ambil[6]);
?>