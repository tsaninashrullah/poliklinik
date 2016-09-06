<?php

$kd_praktek = $_GET['kd_praktek'];

$key = $_GET['key'];

if($key == 'edit')
{
include('../layout/header.php');
include('../config/koneksi.php');
$sql = mysql_query("select * from jadwal_praktek where kd_praktek='$kd_praktek'") or mysql_error();
$data = mysql_fetch_array($sql) or mysql_error();
echo "
	<title>Pembaaruan Jadwal Praktek jadwal_praktek TRSNW.</title>
	<div id='page-wrapper'>
	<div class='well'>
		<br>
		<center>
		<label><h3>Pembaruan Jadwal Praktek</h3></label>
		</center>
	</div>
	<div class='well'>
		<div class='row'>
			<div class='col-md-8'>
				<form action='update.php' method='post'>
	            <div class='row'>
		            <div class='form-group col-md-3'>
					    <label>Kode Praktek</label>
					    <input type='text' name='kd_praktek' class='form-control' readonly='true' value='$data[0]'>
				  	</div>
			        <div class='form-group col-md-12'>
			        	<label>Nama Dokter</label>
			        	<select name='nama' class='form-control'>";
			        	$dokter = mysql_query('select * from dokter');
			        	while ($ambil=mysql_fetch_array($dokter)) {
			        		echo "<option value=" . $ambil[0] . ">" . $ambil[1] . "</option>";
			        	}
			        	echo "</select>
			        </div>
			        <div class='form-group col-md-12'>
			        	<label>Hari</label>
			        	<input type='text' name='hari' class='form-control' value='$data[1]'>
			        </div>
			        <div class='form-group col-md-12'>
			        	<label>Jam Mulai</label>
			        	<input type='text' name='jam_mulai' maxlength=8 class='form-control' value='$data[2]'>
			        </div>
			        <div class='form-group col-md-12'>
			        	<label>Jam Selesai</label>
			        	<input type='text' name='jam_selesai' maxlength=8 class='form-control' value='$data[3]'>
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
$sql=mysql_query("delete from jadwal_praktek where kd_praktek='$kd_praktek'");
if($sql)
echo "<script> alert ('Data dengan kode $kd_praktek berhasil dihapus!'); parent.location='index.php';</script>";
else
echo "<script> alert ('Data dengan kode $kd_praktek gagal dihapus!');parent.location='index.php';</script>";
}