<?php
$no_pemeriksaan = $_GET['no_pemeriksaan'];

$key = $_GET['key'];

if($key == 'edit')
{
include('../layout/header.php');
include('../config/koneksi.php');
$sql = mysql_query("select * from pemeriksaan where no_pemeriksaan='$no_pemeriksaan'") or mysql_error();
$data = mysql_fetch_array($sql) or mysql_error();
echo "
	<title>Penambahan Data Dokter pemeriksaan TRSNW.</title>
<div id='page-wrapper'>
<div class='well'>
	<br>
	<center>
	<label><h3>Penambahan Data Dokter</h3></label>
	</center>
</div>
<div class='well'>
	<div class='row'>
		<div class='col-md-8'>
			<form action='update.php' method='post'>
            <div class='row'>
	            <div class='form-group col-md-3'>
				    <label>No Pemeriksaan</label>
				    <input type='text' name='no_pemeriksaan' class='form-control' readonly='true' value='$data[0]'>
			  	</div>
		        <div class='form-group col-md-12'>
		        	<label>Keluhan</label>
		        	<input type='text' value='$data[1]' name='keluhan' placeholder='Keluhan' class='form-control'>
		        </div>
		        <div class='form-group col-md-12'>
		        	<label>Diagnosa</label>
		        	<textarea name='diagnosa' rows='5' class='form-control'>$data[2]</textarea>
		        </div>
		        <div class='form-group col-md-12'>
		        	<label>Perawatan</label>
		        	<input type='text' name='perawatan' placeholder='Perawatan' value='$data[3]' class='form-control'>
		        </div>
		        <div class='form-group col-md-10'>
		        	<label>Tindakan</label>
		        	<select name='tindakan' class='form-control'>
		        		<option value='Operasi'>Operasi</option>
		        		<option value='Minum Obat'>Minum Obat</option>
		        		<option value='Rujukan Ke Rumah Sakit'>Rujukan Ke Rumah Sakit</option>
		        	</select>
		        </div>
		        <div class='form-group col-md-9'>
		        	<label>Berat Badan</label>
		        	<input type='text' name='bb' placeholder='Berat Badan' maxlength='3' value='$data[5]' class='form-control'>
		        </div>
		        <div class='form-group col-md-4'>
		        	<label>Tensi Diastolik</label>
		        	<input type='text' name='td' placeholder='Tensi Diastolik' maxlength='3' class='form-control' value='$data[6]'>
		        </div>
		        <div class='form-group col-md-4'>
		        	<label>Tensi Sistolik</label>
		        	<input type='text' name='ts' placeholder='Tensi Sistolik' maxlength='3' class='form-control' value='$data[7]'>
		        </div>
		        <div class='form-group col-md-10'>
		        	<label>Resep</label>
		        	<select name='kd_resep' class='form-control'>";
					    $poli = mysql_query('select * from resep');
					    while ($ambil = mysql_fetch_array($poli)) {
					    	echo '<option value='. $ambil[0] . '>' . $ambil[0] . '</option>';
					    }
		        	echo "</select>
		        </div>
		        <div class='form-group col-md-10'>
		        	<label>Pendaftaran</label>
		        	<select name='no_pendaftaran' class='form-control'>";
					    $poli = mysql_query('select * from pendaftaran');
					    while ($ambil = mysql_fetch_array($poli)) {
					    	echo '<option value='. $ambil[0] . '>' . $ambil[0] . '</option>';
					    }
		        	echo "</select>
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
$sql=mysql_query("delete from pemeriksaan where no_pemeriksaan='$no_pemeriksaan'");
if($sql)
echo "<script> alert ('Data dengan kode $no_pemeriksaan berhasil dihapus!'); parent.location='index.php';</script>";
else
echo "<script> alert ('Data dengan kode $no_pemeriksaan gagal dihapus!');parent.location='index.php';</script>";
}