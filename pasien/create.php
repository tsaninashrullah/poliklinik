<?php
include("../layout/header.php");
?>
<title>Penambahan Data Poliklinik TRSNW.</title>
<div id="page-wrapper">
<div class="well">
	<br>
	<center>
	<label><h3>Penambahan Data Poliklinik</h3></label>
	</center>
</div>
<div class="well">
	<div class="row">
		<div class="col-md-12">
			<form action="simpan.php" method="post">
            <div class="row">
	            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Pasien
                </div>
                <form action="auth_daftar.php" method="Post">
                <div class="panel-body">
                    <div class="form-group col-md-3">
			        	<label>Kode Pasien</label>
					    <?php
					    $sql = mysql_query("select max(kd_pasien) from pasien");
					    $data = mysql_fetch_array($sql);
					    $max = $data[0];
					    $id = (int)substr($max, 2,4);
					    $id++;
					    $newid = "P".sprintf("%04s",$id);
					    ?>
					    <input type="text" name="kd_pasien" class="form-control" readonly="true" value="<?=$newid?>">
			        </div>
			        <div class="form-group col-md-12">
			        	<label>Nama Pasien</label>
			        	<input type="text" class="form-control" name="nama" placeholder="Nama Pasien">
			        </div>
			        <div class="col-md-6 form-group">
			        	<label>Alamat</label>
			        	<textarea name="alamat" rows="5" class="form-control"></textarea>
			        </div>
			        <div class="form-group col-md-12">
			        	<label>No Telepon</label>
			        	<input type="text" class="form-control" name="telp" placeholder="No Telepon" maxlength="13">
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
			        <div class="col-md-12">
			        	<label>Tanggal Registrasi</label>
			        	<div class="row form-group">
			        	<div class="col-md-3">
			        	<select name="tglr" class="form-control">
			        		<?php
			        		for ($i=1; $i <= 31; $i++) { 
			        			echo "<option value=" . $i . ">" . $i . "</option>";
			        		}
			        		?>
			        	</select>
			        	<label>Tanggal</label>
			        	</div>
			        	<div class="col-md-3">
			        	<select name="blnr" class="form-control">
			        		<?php
			        		for ($i=1; $i <= 12; $i++) { 
			        			echo "<option value=" . $i . ">" . $i . "</option>";
			        		}
			        		?>
			        	</select>
			        	<label>Bulan</label>
			        	</div>
			        	<div class="col-md-3">
			        	<select name="tahunr" class="form-control">
			        		<?php
			        		for ($i=2013; $i <= 2015; $i++) { 
			        			echo "<option value=" . $i . ">" . $i . "</option>";
			        		}
			        		?>
			        	</select>
			        	<label>Tahun</label>
			        	</div>
			        	</div>
			        </div>
		            <div class="col-md-8 form-group">
				        <button class="btn btn-success"><i class='fa fa-pencil'></i>&nbsp;    Tambahkan</button>
			        </div>
                </div>
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