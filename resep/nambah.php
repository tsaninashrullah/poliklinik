<?php
include("../layout/header.php");
$kd_resep = $_GET['kd_resep'];
$queryperiksa = mysql_query("select * from resep where kd_resep='$kd_resep'");
$ambilper = mysql_fetch_array($queryperiksa);

$query = mysql_query("select * from pemeriksaan where no_pemeriksaan='$ambilper[2]'");
$ambil = mysql_fetch_array($query);

$obat = mysql_query("select * from obat");
if (mysql_num_rows($obat) < 0 ) {
	header('location:index.php');
}
?>
<title>Penambahan Data Obat Poliklinik TRSNW.</title>
<div id="page-wrapper">
<div class="well">
	<br>
	<center>
	<label><h3>Penambahan Data Poliklinik</h3></label>
	</center>
</div>
<div class="well">
	<div class="row">
		<div class="col-lg-12">
			<form action="simpan_nambah.php" method="post">
            <div class="row">
			  	<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Form Penambahan Obat
                        </div>
                        <div class="panel-body">
                        <div class="form-group col-md-3">
				        	<label>No Pendaftaran</label>
				        	<input type="text" name="no_pendaftaran" class="form-control" value="<?=$ambil[9]?>" readonly="true">
				        </div>
				        <div class="form-group col-md-3">
				        	<label>No Pemeriksaan</label>
				        	<input type="text" name="no_pemeriksaan" class="form-control" value="<?=$ambil[0]?>" readonly="true">
				        </div>
                        <div class="form-group col-md-3">
				        	<label>Kode Resep</label>
				        	<input type="text" name="kd_resep" class="form-control" value="<?=$kd_resep?>" readonly="true">
				        </div>
                        <div class="row">
	                        <div class="col-lg-12">
			                    <div class="panel panel-info">
			                        <div class="panel-heading">
			                           Form Obat
			                        </div>
			                        <div class="panel-body">
							            <!-- Tempat Untuk Form Obat -->
							            <div class="form-group col-md-10">
							        	<label>Obat</label>
							        	<select name="kd_obat" class="form-control">
										    <?php
										    while ($ambil = mysql_fetch_array($obat)) {
										    	echo "<option value=". $ambil[0] . ">" . $ambil[1] . "</option>";
										    }
										    ?>
							        	</select>
							        </div>
							        <div class="form-group col-md-12">
							        	<label>Dosis</label>
							        	<table border="0" width="100%">
								  		<tr>
								  		<td width="12%">
									  		<select name="berapa" class="form-control">
									  			<?php
									  			for ($i=1; $i <5 ; $i++) { 
									  				echo "<option value=".$i . ">" . $i . "</option>";
									  			}
									  			?>
									  		</select>
								  		</td>
								  		<td width="2%">
								  		<center>
									  		<label>X</label>
								  		</center>
								  		</td>
								  		<td width="15%">
									  		<select name="hari" class="form-control">
									  			<?php
									  			for ($i=1; $i <5 ; $i++) { 
									  				echo "<option value=".$i . ">" . $i . "</option>";
									  			}
									  			?>
									  		</select>
								  		</td>
								  		<td width="15%"><label>&nbsp;  Hari</label></td>
								  		</tr>
								  	</table>
							        </div>
							        <div class="col-md-6 form-group">
							        	<label>Jumlah</label>
							        	<select name="jumlah" class="form-control">
							        		<?php
							        		for ($i=1; $i < 20 ; $i++) { 
							        			echo "<option value='$i'>$i</option>";
							        		}
							        		?>
							        	</select>
							        </div>			        
									  	<!-- Selesai Untuk Form Resep -->
			                        </div>
		                        </div>
		                    </div>
			                </div>
                        </div>
                        <div class="panel-footer">
                            *) Note = Pilih dan Sesuaikan Kode Resep Yang Sesuai
                        </div>
                    </div>
                </div>
		        
		        <div class="col-md-8 form-group">
			        <button class="btn btn-success"><i class='fa fa-plus'></i>&nbsp;    Tambahkan Lagi</button>
			        <a href="index.php" class="btn btn-primary"><i class='fa fa-asterisk'></i>&nbsp;  Selesai</a>
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