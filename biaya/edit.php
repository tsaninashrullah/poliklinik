<?php

$kd_jenis = $_GET['kd_jenis'];

$key = $_GET['key'];

if($key == 'edit')
{
include('../layout/header.php');
include('../config/koneksi.php');
$sql = mysql_query("select * from jenis_biaya where kd_jenis='$kd_jenis'") or mysql_error();
$data = mysql_fetch_array($sql) or mysql_error();
echo "
	<title>Penambahan Jenis Biaya jenis_biaya TRSNW.</title>
	<div id='page-wrapper'>
	<div class='well'>
		<br>
		<center>
		<label><h3>Penambahan Jenis Biaya</h3></label>
		</center>
	</div>
	<div class='well'>
		<div class='row'>
			<div class='col-md-8'>
				<form action='update.php' method='post'>
	            <div class='row'>
		            <div class='form-group col-md-3'>
					    <label>Kode Jenis Biaya</label>
					    <input type='text' name='kd_jenis' class='form-control' readonly='true' value='$data[0]'>
				  	</div>
			        <div class='form-group col-md-12'>
			        	<label>Nama Biaya</label>
			        	<input type='text' name='nama' class='form-control' placeholder='Nama Biaya' value='$data[1]'>
			        </div>
	                <div class='col-md-12 form-group'>
	                    <label>Besar Biaya</label>
					    <div class='input-group col-md-4'>
					      <div class='input-group-addon'>Rp.</div>
					      <input type='text' class='form-control' required data-validation-required-message='Tidak boleh ada data yang kosong.' name='besar' id='exampleInputAmount' placeholder='Besar Biaya' value='$data[2]'>
					      <div class='input-group-addon'>,00</div>
					    </div>
					</div>
			        <div class='col-md-8 form-group'>
				        <button class='btn btn-success'><i class='fa fa-pencil'></i>&nbsp;    Tambahkan</button>
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
$sql=mysql_query("delete from jenis_biaya where kd_jenis='$kd_jenis'");
if($sql)
echo "<script> alert ('Data dengan kode $kd_jenis berhasil dihapus!'); parent.location='index.php';</script>";
else
echo "<script> alert ('Data dengan kode $kd_jenis gagal dihapus!');parent.location='index.php';</script>";
}