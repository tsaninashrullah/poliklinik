<?php

$kd_resep = $_GET['kd_resep'];

$key = $_GET['key'];

if($key == 'edit')
{
include('../layout/header.php');
include('../config/koneksi.php');
$sql = mysql_query("select * from resep where kd_resep='$kd_resep'") or mysql_error();
$data = mysql_fetch_array($sql) or mysql_error();
echo "
	<title>Pembaruan Data Resep TRSNW.</title>
	<div id='page-wrapper'>
	<div class='well'>
		<br>
		<center>
		<label><h3>Pembaruan Data Resep</h3></label>
		</center>
	</div>
	<div class='well'>
		<div class='row'>
			<div class='col-md-8'>
				<form action='update.php' method='post'>
	            <div class='row'>
		            <div class='form-group col-md-3'>
				        	<label>Kode Resep</label>
						    <input type='text' name='kd_resep' class='form-control' readonly='true' value='$data[0]'>
				        </div>
				        <div class='form-group col-md-12'>
				        	<label>Dosis</label>
				        	<table border='0' width='100%'>
					  		<tr>
					  		<td width='12%'>
						  		<select name='berapa' class='form-control'>";
						  			for ($i=1; $i <5 ; $i++) { 
						  				echo '<option value='.$i . '>' . $i . '</option>';
						  			}
						  		echo "</select>
					  		</td>
					  		<td width='2%'>
					  		<center>
						  		<label>X</label>
					  		</center>
					  		</td>
					  		<td width='15%'>
						  		<select name='hari' class='form-control'>";
						  			for ($i=1; $i <5 ; $i++) { 
						  				echo '<option value='.$i . '>' . $i . '</option>';
						  			}
						  		echo "</select>
					  		</td>
					  		<td width='15%'><label>&nbsp;  Hari</label></td>
					  		</tr>
					  	</table>
				        </div>
				        <div class='col-md-6 form-group'>
				        	<label>Jumlah</label>
				        	<select name='jumlah' class='form-control'>";
				        		for ($i=1; $i < 20 ; $i++) { 
				        			echo "<option value='" . $i . "'>$i</option>";
				        		}
				        	echo "</select>
				        </div>
				        <div class='col-md-12'>
				        <button class='btn btn-primary'><i class='fa fa-plus'></i>&nbsp;    Perbarui</button>
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
$sql=mysql_query("delete from resep where kd_resep='$kd_resep'");
if($sql)
echo "<script> alert ('Data dengan kode $kd_resep berhasil dihapus!'); parent.location='index.php';</script>";
else
echo "<script> alert ('Data dengan kode $kd_resep gagal dihapus!');parent.location='index.php';</script>";
}