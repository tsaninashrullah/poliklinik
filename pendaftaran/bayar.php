<?php
include("../layout/header.php");
$no_pendaftaran = $_GET['no_pendaftaran'];
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
			<form action="simpan_bayar.php" method="post">
            <div class="row">
			  	<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Pendaftaran
                        </div>
                        <div class="panel-body">
                        <div class="form-group col-md-3">
				        	<label>No Pendaftaran</label>
				        	<input type="text" name="no_pendaftaran" class="form-control" value="<?=$no_pendaftaran?>" readonly="true">
				        </div>
                        <div class="row">
	                        <div class="col-lg-12">
			                    <div class="panel panel-info">
			                        <div class="panel-heading">
			                           Tambahkan Biaya
			                        </div>
			                        <div class="panel-body">
							            <!-- Tempat Untuk Form Obat -->
							            <div class="form-group col-md-10">
								        	<label>Jenis Biaya</label>
								        	<select name="jenis" class="form-control">
											    <?php
											    $cek = mysql_query("select * from history_biaya where no_pendaftaran='$no_pendaftaran'");
											    $hey = mysql_fetch_array($cek);
											    if ($hey[0]=="") {
											    	$poli = mysql_query("select * from jenis_biaya");
												    while ($ambil = mysql_fetch_array($poli)) {
												    	echo "<option value=". $ambil[0] . ">" . $ambil[1] . "</option>";
												    }	
											    }else{
												    $ceks = mysql_query("select * from history_biaya where no_pendaftaran='$no_pendaftaran'");
												    while($cekquery = mysql_fetch_array($ceks))
												    {
												    // echo "<label>" . var_dump($cekquery[0]) . "</label>";
													    $poli = mysql_query("select * from jenis_biaya where kd_jenis!='$cekquery[1]'");
													    while ($ambils = mysql_fetch_array($poli)) {
													    	echo "<option value=". $ambils[0] . ">" . $ambils[1] . "</option>";
													    }
												    }
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
                            *)<!--  Note = Pilih dan Sesuaikan Biaya Dengan Teliti
						    <?php
						    var_dump($cek,$hey[0],$no_pendaftaran,$cekquery[0]);
						    ?> -->
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