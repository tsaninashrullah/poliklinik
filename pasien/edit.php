<?php

$kd_pasien = $_GET['kd_pasien'];

$key = $_GET['key'];

if($key == 'edit')
{
include('../layout/header.php');
include('../config/koneksi.php');
$sql = mysql_query("select * from pasien where kd_pasien='$kd_pasien'") or mysql_error();
$data = mysql_fetch_array($sql) or mysql_error();
echo "
	<title>Pembaruan Data Pasien TRSNW.</title>
	<div id='page-wrapper'>
	<div class='well'>
		<br>
		<center>
		<label><h3>Penambahan Data Pasien</h3></label>
		</center>
	</div>
	<div class='well'>
		<div class='row'>
			<div class='col-md-8'>
				<form action='update.php' method='post'>
	            <div class='row'>
		            <div class='form-group col-md-3'>
			        	<label>Kode Pasien</label>
					    <input type='text' name='kd_pasien' class='form-control' readonly='true' value='$data[0]'>
			        </div>
			        <div class='form-group col-md-12'>
			        	<label>Nama Pasien</label>
			        	<input type='text' value='$data[1]' class='form-control' name='nama' placeholder='Nama Pasien'>
			        </div>
			        <div class='col-md-6 form-group'>
			        	<label>Alamat</label>
			        	<textarea name='alamat' rows='5' class='form-control'>$data[2]</textarea>
			        </div>
			        <div class='form-group col-md-12'>
			        	<label>No Telepon</label>
			        	<input type='text' class='form-control' name='telp' value='$data[3]' placeholder='No Telepon' maxlength='13'>
			        </div>
			        <div class='col-md-12'>
			        	<label>Tanggal Lahir</label>
			        	<input type='text' class='form-control' name='tanggal' value='$data[4]' placeholder='Tanggal Lahir' maxlength='13'>
			        </div>
			        <div class='form-group col-md-10'>
			        	<label>Jenis Kelamin</label>
			        	<select name='jk' class='form-control'>
			        		<option value='Laki-Laki'>Laki-Laki</option>
			        		<option value='Perempuan'>Perempuan</option>
			        	</select>
			        </div>
			        <div class='col-md-12'>
			        	<label>Tanggal Registrasi</label>
			        	<input type='text' class='form-control' name='tanggals' value='$data[6]' placeholder='Tanggal Lahir' maxlength='13'>
			        </div>
			        <div class='col-md-8 form-group'>
			        &nbsp;
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
$sql=mysql_query("delete from pasien where kd_pasien='$kd_pasien'");
if($sql)
echo "<script> alert ('Data dengan kode $kd_pasien berhasil dihapus!'); parent.location='index.php';</script>";
else
echo "<script> alert ('Data dengan kode $kd_pasien gagal dihapus!');parent.location='index.php';</script>";
}