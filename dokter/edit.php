<?php

$kd_dokter = $_GET['kd_dokter'];

$key = $_GET['key'];

if($key == 'edit')
{
include('../layout/header.php');
include('../config/koneksi.php');
$sql = mysql_query("select * from dokter where kd_dokter='$kd_dokter'") or mysql_error();
$data = mysql_fetch_array($sql) or mysql_error();
echo "
	<title>Pembaruan Data Dokter dokter TRSNW.</title>
	<div id='page-wrapper'>
	<div class='well'>
		<br>
		<center>
		<label><h3>Pembaruan Data Dokter</h3></label>
		</center>
	</div>
	<div class='well'>
		<div class='row'>
			<div class='col-md-8'>
				<form action='update.php' method='post'>
	            <div class='row'>
		            <div class='form-group col-md-3'>
					    <label>Kode Dokter</label>
					    <input type='text' name='kd_dokter' class='form-control' readonly='true' value='$data[0]'>
				  	</div>
			        <div class='form-group col-md-12'>
			        	<label>Nama Dokter</label>
			        	<input type='text' name='nama' placeholder='Nama dokter' class='form-control' value='$data[1]'>
			        </div>
			        <div class='form-group col-md-12'>
			        	<label>Alamat Dokter</label>
			        	<textarea name='alamat' rows='5' class='form-control'>$data[2]</textarea>
			        </div>
			        <div class='form-group col-md-9'>
			        	<label>No Telepon</label>
			        	<input type='text' name='telp' placeholder='No Telepon' value='$data[3]' maxlength='13' class='form-control'>
			        </div>
			        <div class='form-group col-md-10'>
			        	<label>Jenis Kelamin</label>
			        	<input type='text' name='jk' placeholder='Jenis Kelamin' value='$data[4]' class='form-control'>
			        </div>
			        <div class='form-group col-md-10'>
			        	<label>Poliklinik</label>
			        	<select name='kd_poli' class='form-control'>";
			        	$dokter = mysql_query('select * from poliklinik');
					    while ($ambil = mysql_fetch_array($dokter)) {
					    	echo "<option value=". $ambil[0] . ">" . $ambil[1] . "</option>";
					    }
			        	echo "</select>
			        </div>
			        <div class='col-md-12 form-group'>
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
$sql=mysql_query("delete from dokter where kd_dokter='$kd_dokter'");
if($sql)
echo "<script> alert ('Data dengan kode $kd_dokter berhasil dihapus!'); parent.location='index.php';</script>";
else
echo "<script> alert ('Data dengan kode $kd_dokter gagal dihapus!');parent.location='index.php';</script>";
}