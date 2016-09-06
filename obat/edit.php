<?php

$kd_obat = $_GET['kd_obat'];

$key = $_GET['key'];

if($key == 'edit')
{
include('../layout/header.php');
include('../config/koneksi.php');
$sql = mysql_query("select * from obat where kd_obat='$kd_obat'") or mysql_error();
$data = mysql_fetch_array($sql) or mysql_error();
echo "
	<title>Pembaruan Data Obat Poliklinik TRSNW.</title>
	<div id='page-wrapper'>
	<div class='well'>
		<br>
		<center>
		<label><h3>Pembaruan Data Obat</h3></label>
		</center>
	</div>
	<div class='well'>
		<div class='row'>
			<div class='col-lg-12'>
				<form action='update.php' method='post'>
	                    <div class='panel panel-info'>
	                        <div class='panel-heading'>
	                           Form Obat
	                        </div>
	                        <div class='panel-body'>
					            <!-- Tempat Untuk Form Obat -->
					            <div class='form-group col-md-3'>
								    <label>Kode Obat</label>
								    <input type='text' name='kd_obat' class='form-control' readonly='true' value='$data[0]'>
							  	</div>
							  	<div class='form-group col-md-12'>
						        	<label>Nama Obat</label>
						        	<input type='text' name='nama' class='form-control' placeholder='Nama Obat'  value='$data[1]'>
						        </div>
							  	<div class='form-group col-md-12'>
						        	<label>Merk Obat</label>
						        	<input type='text' name='merk' class='form-control' placeholder='Merk Obat' value='$data[2]'>
						        </div>
							  	<div class='form-group col-md-12'>
						        	<label>Satuan</label>
						        	<select name='satuan' class='form-control'>
						        		<option value='Butir'>Butir</option>
						        		<option value='Kapsul'>Kapsul</option>
						        		<option value='Tablet'>Tablet</option>
						        		<option value='Kaplet'>Kaplet</option>
						        		<option value='Pcs'>PCS</option>
						        		<option value='Gram'>Gram</option>
						        		<option value='Mg'>Mg</option>
						        	</select>
						        </div>
						        <div class='col-md-12 form-group'>
				                    <label>Harga</label>
								    <div class='input-group col-md-4'>
								      <div class='input-group-addon'>Rp.</div>
								      <input type='text' class='form-control' value='$data[4]' required data-validation-required-message='Tidak boleh ada data yang kosong.' name='harga' id='exampleInputAmount' placeholder='Harga'>
								      <div class='input-group-addon'>,00</div>
								    </div>
								</div>		        
							  	<!-- Selesai Untuk Form Resep -->
	                        </div>
			            <div class='panel-footer'>
	                        *) Note = Pilih dan Sesuaikan Kode Resep Yang Sesuai
	                    </div>
	                    </div>
				        <div class='col-md-8 form-group'>
					        <button class='btn btn-success'><i class='fa fa-pencil'></i>&nbsp;    Perbarui</button>
				        </div>
                        </div>
                    </div>
				</form>";
	include('../layout/footer.php');
}elseif($key == 'delete')
{
include('../config/koneksi.php');
$sql=mysql_query("delete from obat where kd_obat='$kd_obat'");
if($sql)
echo "<script> alert ('Data dengan kode $kd_obat berhasil dihapus!'); parent.location='index.php';</script>";
else
echo "<script> alert ('Data dengan kode $kd_obat gagal dihapus!');parent.location='index.php';</script>";
}