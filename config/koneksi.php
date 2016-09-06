<?php
$localhost = 'localhost';
$user = 'root';
$pass = '';
$koneksi = mysql_connect('localhost','root','') or die('Database tidak ditemukan');
$db = mysql_select_db('poliklinik') or mysql_error();
?>