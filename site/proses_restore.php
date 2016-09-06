<?php
include('../config/koneksi.php');

$datafile = $_POST['datafile'];

if(isset($_POST['restore'])){
 restore($_FILES['datafile']);
 echo "<pre>";
 echo "</pre>";
 } else {
 unset($_POST['restore']);
 }
?>