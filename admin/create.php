<?php
include("../layout/header.php");
$username = $_SESSION['username'];
include('../auth/hak_akses.php');
?>
<div id="page-wrapper">
<div class="well">
	<br>
	<center>
	<label><h3>Penambahan Data Pegawai Poliklinik</h3></label>
	</center>
</div>
<div class="well">
	<div class="row">
		<div class="col-md-8">
			<form action="simpan.php" method="post">
            <div class="row">
		        <div class="form-group col-md-9">
		        	<label>NIP</label>
		        	<input type="text" class="form-control" name="nip" placeholder="Nomor Induk Pegawai" maxlength="13">
		        </div>
		        <div class="form-group col-md-12">
		        	<label>Username</label>
		        	<input type="text" name="username" class="form-control" placeholder="Username">
		        </div>
		        <div class="form-group col-md-12">
		        	<label>Password</label>
		        	<input type="password" name="password" class="form-control" placeholder="Password">
		        </div>
		        <div class="form-group col-md-12">
		        	<label>Status</label>
		        	<select name="status" class="form-control">
		        		<option value="1">Admin Sistem</option>
		        		<option value="0">Pegawai Poliklinik</option>
		        	</select>
		        </div>
		        <div class="form-group col-md-12">
		        	<label>Nama Pegawai</label>
		        	<input type="text" name="nama" placeholder="Nama Pegawai" class="form-control">
		        </div>
		        <div class="form-group col-md-12">
		        	<label>Alamat Pegawai</label>
		        	<textarea name="alamat" rows="5" class="form-control"></textarea>
		        </div>
		        <div class="form-group col-md-9">
		        	<label>No Telepon</label>
		        	<input type="text" name="telp" placeholder="No Telepon" maxlength="13" class="form-control">
		        </div>
		        <div class="col-md-12">
		        	<label>Tanggal Lahir</label>
		        	<div class="row form-group">
		        	<div class="col-md-3">
		        	<select name="tgl" class="form-control">
		        		<?php
		        		for ($i=1; $i <= 31; $i++) { 
		        			echo "<option value=" . $i . ">" . $i . "</option>";
		        		}
		        		?>
		        	</select>
		        	<label>Tanggal</label>
		        	</div>
		        	<div class="col-md-3">
		        	<select name="bln" class="form-control">
		        		<?php
		        		for ($i=1; $i <= 12; $i++) { 
		        			echo "<option value=" . $i . ">" . $i . "</option>";
		        		}
		        		?>
		        	</select>
		        	<label>Bulan</label>
		        	</div>
		        	<div class="col-md-3">
		        	<select name="tahun" class="form-control">
		        		<?php
		        		for ($i=1960; $i <= 2000; $i++) { 
		        			echo "<option value=" . $i . ">" . $i . "</option>";
		        		}
		        		?>
		        	</select>
		        	<label>Tahun</label>
		        	</div>
		        	</div>
		        </div>
		        <div class="form-group col-md-10">
		        	<label>Jenis Kelamin</label>
		        	<select name="jk" class="form-control">
		        		<option value="Laki-Laki">Laki-Laki</option>
		        		<option value="Perempuan">Perempuan</option>
		        	</select>
		        </div>
		        <div class="col-md-8 form-group">
			        <button class="btn btn-success"><i class='fa fa-pencil'></i>&nbsp;    Tambahkan</button>
		        </div>
            </div>
			</form>
		</div>
	</div>
</div>
</div>
<?php
include("../layout/footer.php");
?>