<?php

$nip = $_GET['nip'];

$key = $_GET['key'];

if($key == 'edit')
{
include('../layout/header.php');
include('../config/koneksi.php');
$sql = mysql_query("select * from pegawai where nip='$nip'") or mysql_error();
$data = mysql_fetch_array($sql) or mysql_error();
echo "
	<div id='page-wrapper'>
	<div class='well'>
		<br>
		<center>
		<label><h3>Pembaruan Data Pegawai Poliklinik $data[1]</h3></label>
		</center>
	</div>
	<div class='well'>
		<div class='row'>
			<div class='col-md-8'>
				<form action='update.php' method='post'>
				<input type='hidden' value='$data[0]' name='nip'>
	            <div class='row'>
			        <div class='form-group col-md-12'>
			        	<label>Username</label>
			        	<input type='text' name='username' class='form-control' placeholder='Username'>
			        </div>
			        <div class='form-group col-md-12'>
			        	<label>Password</label>
			        	<input type='password' name='password' class='form-control' placeholder='Password'>
			        </div>
			        <div class='form-group col-md-12'>
			        	<label>Status</label>
			        	<select name='status' class='form-control'>
			        		<option value='1'>Admin Sistem</option>
			        		<option value='0'>Pegawai Poliklinik</option>
			        	</select>
			        </div>
			        <div class='form-group col-md-12'>
			        	<label>Nama Pegawai</label>
			        	<input type='text' value='$data[1]' name='nama' placeholder='Nama Pegawai' class='form-control'>
			        </div>
			        <div class='form-group col-md-12'>
			        	<label>Alamat Pegawai</label>
			        	<textarea name='alamat' rows='5' class='form-control'>$data[2]</textarea>
			        </div>
			        <div class='form-group col-md-9'>
			        	<label>No Telepon</label>
			        	<input type='text' name='telp' placeholder='No Telepon' value='$data[3]' maxlength='13' class='form-control'>
			        </div>
			        <div class='col-md-12'>
			        	<label>Tanggal Lahir</label>
			        	<input type='text' name='tanggal' value='$data[4]' class='form-control'>
			        </div>
			        <div class='form-group col-md-10'>
			        	<label>Jenis Kelamin</label>
			        	<input type='text' name='jk' value='$data[5]' class='form-control'>
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
$sql=mysql_query("delete from pegawai where nip='$nip'");
if($sql)
echo "<script> alert ('Data dengan kode $nip berhasil dihapus!'); parent.location='index.php';</script>";
else
echo "<script> alert ('Data dengan kode $nip gagal dihapus!');parent.location='index.php';</script>";
}