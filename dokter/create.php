<?php
include("../layout/header.php");
?>
<title>Penambahan Data Dokter Poliklinik TRSNW.</title>
<div id="page-wrapper">
<div class="well">
	<br>
	<center>
	<label><h3>Penambahan Data Dokter</h3></label>
	</center>
</div>
<div class="well">
	<div class="row">
		<div class="col-md-8">
			<form action="simpan.php" method="post">
            <div class="row">
	            <div class="form-group col-md-3">
				    <label>Kode Dokter</label>
				    <?php
				    $sql = mysql_query("select max(kd_dokter) from dokter");
				    $data = mysql_fetch_array($sql);
				    $max = $data[0];
				    $id = (int)substr($max, 2,4);
				    $id++;
				    $newid = "D".sprintf("%04s",$id);
				    ?>
				    <input type="text" name="kd_dokter" class="form-control" readonly="true" value="<?=$newid?>">
			  	</div>
		        <div class="form-group col-md-12">
		        	<label>Nama Dokter</label>
		        	<input type="text" name="nama" placeholder="Nama dokter" class="form-control">
		        </div>
		        <div class="form-group col-md-12">
		        	<label>Alamat Dokter</label>
		        	<textarea name="alamat" rows="5" class="form-control"></textarea>
		        </div>
		        <div class="form-group col-md-9">
		        	<label>No Telepon</label>
		        	<input type="text" name="telp" placeholder="No Telepon" maxlength="13" class="form-control">
		        </div>
		        <div class="form-group col-md-10">
		        	<label>Jenis Kelamin</label>
		        	<select name="jk" class="form-control">
		        		<option value="Laki-Laki">Laki-Laki</option>
		        		<option value="Perempuan">Perempuan</option>
		        	</select>
		        </div>
		        <div class="form-group col-md-10">
		        	<label>Poliklinik</label>
		        	<select name="kd_poli" class="form-control">
					    <?php
					    $poli = mysql_query("select * from poliklinik");
					    while ($ambil = mysql_fetch_array($poli)) {
					    	echo "<option value=". $ambil[0] . ">" . $ambil[1] . "</option>";
					    }
					    ?>
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