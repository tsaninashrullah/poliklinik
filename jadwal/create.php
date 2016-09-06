<?php
include("../layout/header.php");
?>
<title>Penambahan Jadwal Praktek Poliklinik TRSNW.</title>
<div id="page-wrapper">
<div class="well">
	<br>
	<center>
	<label><h3>Penambahan Jadwal Praktek</h3></label>
	</center>
</div>
<div class="well">
	<div class="row">
		<div class="col-md-8">
			<form action="simpan.php" method="post">
            <div class="row">
	            <div class="form-group col-md-3">
				    <label>Kode Praktek</label>
				    <?php
				    $sql = mysql_query("select max(kd_praktek) from jadwal_praktek");
				    $data = mysql_fetch_array($sql);
				    $max = $data[0];
				    $id = (int)substr($max, 2,4);
				    $id++;
				    $newid = "JP".sprintf("%03s",$id);
				    ?>
				    <input type="text" name="kd_praktek" class="form-control" readonly="true" value="<?=$newid?>">
			  	</div>
		        <div class="form-group col-md-12">
		        	<label>Nama Dokter</label>
		        	<select name="nama" class="form-control">
						    <?php
						    $poli = mysql_query("select * from dokter");
						    while ($ambil = mysql_fetch_array($poli)) {
						    	echo "<option value=". $ambil[0] . ">" . $ambil[1] . "</option>";
						    }
						    ?>
		        	</select>
		        </div>
		        <div class="form-group col-md-12">
		        	<label>Hari</label>
		        	<select name="hari" class="form-control">
		        		<option value="Senin">Senin</option>
		        		<option value="Selasa">Selasa</option>
		        		<option value="Rabu">Rabu</option>
		        		<option value="Kamis">Kamis</option>
		        		<option value="Jum'at">Jum'at</option>
		        		<option value="Sabtu">Sabtu</option>
		        	</select>
		        </div>
		        <div class="form-group col-md-12">
		        	<label>Jam Mulai</label>
		        	<div class="row">
			        	<div class="col-md-6">
				        	<select name="jamm" class="form-control">
				        	<?php
				        	for ($i=8; $i < 16 ; $i++) { 
				        		echo "<option value=" . $i . ">" . $i . "</option>";
				        	}
				        	?>
				        	</select>
			        	<label>Jam</label>
			        	</div>
			        	<div class="col-md-6">
				        	<select name="menit" class="form-control">
				        	<option value="00">00</option>
				        	<?php
				        	for ($i=1; $i < 60 ; $i++) { 
				        		echo "<option value=" . $i . ">" . $i . "</option>";
				        	}
				        	?>
				        	</select>
			        	<label>Menit</label>
			        	</div>
		        	</div>
		        </div>
		        <div class="form-group col-md-12">
		        	<label>Jam Selesai</label>
		        	<div class="row">
			        	<div class="col-md-6 form-group">
				        	<select name="jams" class="form-control">
				        	<?php
				        	for ($i=12; $i < 22 ; $i++) { 
				        		echo "<option value=" . $i . ">" . $i . "</option>";
				        	}
				        	?>
				        	</select>
			        	<label>Jam</label>
			        	</div>
			        	<div class="col-md-6 form-group">
				        	<select name="menits" class="form-control">
				        	<option value="00">00</option>
				        	<?php
				        	for ($i=1; $i < 60 ; $i++) { 
				        		echo "<option value=" . $i . ">" . $i . "</option>";
				        	}
				        	?>
				        	</select>
			        	<label>Menit</label>
			        	</div>
		        	</div>
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