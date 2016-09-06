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
				    <label>No Pemeriksaan</label>
				    <?php
				    $sql = mysql_query("select max(no_pemeriksaan) from pemeriksaan");
				    $data = mysql_fetch_array($sql);
				    $max = $data[0];
				    $id = (int)substr($max, 2,4);
				    $id++;
				    $newid = "PR".sprintf("%03s",$id);
				    ?>
				    <input type="text" name="no_pemeriksaan" class="form-control" readonly="true" value="<?=$newid?>">
			  	</div>
		        <div class="form-group col-md-12">
		        	<label>Keluhan</label>
		        	<input type="text" name="keluhan" placeholder="Keluhan" class="form-control">
		        </div>
		        <div class="form-group col-md-12">
		        	<label>Diagnosa</label>
		        	<textarea name="diagnosa" rows="5" class="form-control"></textarea>
		        </div>
		        <div class="form-group col-md-12">
		        	<label>Perawatan</label>
		        	<input type="text" name="perawatan" placeholder="Perawatan" class="form-control">
		        </div>
		        <div class="form-group col-md-10">
		        	<label>Tindakan</label>
		        	<select name="tindakan" class="form-control">
		        		<option value="Operasi">Operasi</option>
		        		<option value="Minum Obat">Minum Obat</option>
		        		<option value="Rujukan Ke Rumah Sakit">Rujukan Ke Rumah Sakit</option>
		        	</select>
		        </div>
		        <div class="form-group col-md-9">
		        	<label>Berat Badan</label>
		        	<select name="bb" class="form-control">
		        		<?php
		        		for ($i=20; $i <= 150 ; $i++) { 
		        			echo "<option value=" . $i . ">" . $i . "</option>";
		        		}
		        		?>
		        	</select>
		        </div>
		        <div class="form-group col-md-4">
		        	<label>Tensi Diastolik</label>
		        	<input type="text" name="td" placeholder="Tensi Diastolik" maxlength="3" class="form-control">
		        </div>
		        <div class="form-group col-md-4">
		        	<label>Tensi Sistolik</label>
		        	<input type="text" name="ts" placeholder="Tensi Sistolik" maxlength="3" class="form-control">
		        </div>
		        <div class="form-group col-md-10">
		        	<label>Pendaftaran</label>
		        	<select name="no_urut" class="form-control">
					    <?php
					    $dates = date("Y-m-d");
					    $poli = mysql_query("select * from pendaftaran where tgl_pendaftaran='$dates'");
					    while ($ambil = mysql_fetch_array($poli)) {
					    	echo "<option value=". $ambil['no_urut'] . ">" . $ambil['no_urut'] . "</option>";
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