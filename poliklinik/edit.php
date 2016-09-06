<?php

$kd_poli = $_GET['kd_poli'];

$key = $_GET['key'];

if($key == 'edit')
{
include('../layout/header.php');
include('../config/koneksi.php');
$sql = mysql_query("select * from poliklinik where kd_poli='$kd_poli'") or mysql_error();
$data = mysql_fetch_array($sql) or mysql_error();
echo "
	<title>Pembaruan Data Poliklinik TRSNW.</title>
	<div id='page-wrapper'>
	<div class='well'>
		<br>
		<center>
		<label><h3>Penambahan Data Poliklinik</h3></label>
		</center>
	</div>
	<div class='well'>
		<div class='row'>
			<div class='col-md-8'>
				<form action='update.php' method='post'>
	            <div class='row'>
		            <div class='form-group col-md-3'>
					    <label>Kode Poliklinik</label>
					    <input type='text' name='kd_poli' class='form-control' readonly='true' value='$data[0]'>
				  	</div>
			        <div class='form-group col-md-12'>
			        	<label>Nama Poliklinik</label>
			        	<input type='text' name='nama' class='form-control' placeholder='Nama Poliklinik' value='$data[1]'>
			        </div>
			        <div class='col-md-8 form-group'>
				        <button class='btn btn-success'><i class='fa fa-pencil'></i>&nbsp;    Perbarui</button>
			        </div>
	            </div>
				</form>
			</div>
		</div>
	</div>
	</div>";
	include('../layout/footer.php');
}elseif($key == 'delete')
{
include('../config/koneksi.php');
$sql=mysql_query("delete from poliklinik where kd_poli='$kd_poli'");
if($sql)
echo "<script> alert ('Data dengan kode $kd_poli berhasil dihapus!'); parent.location='index.php';</script>";
else
echo "<script> alert ('Data dengan kode $kd_poli gagal dihapus!');parent.location='index.php';</script>";
}