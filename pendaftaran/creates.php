<?php
include("../layout/header.php");
$username = $_SESSION['username'];
?>
<title>Pencatatan Pendaftaran Poliklinik TRSNW.</title>
<div id="page-wrapper">
<div class="well">
	<br>
	<center>
	<label><h3>Pendaftaran Ulang Pasien</h3></label>
	</center>
</div>
<div class="well">
	<div class="row">
		<div class="col-lg-12">
            <div class="row">
			  	
                <div class="row">
                <div class="col-lg-12">
                <form action="simpans.php" method="post">
                    <!-- INI PENDAFTARAN -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Form Pendaftaran
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-md-3">
					        	<label>No Pendaftaran</label>
							    <?php
							    $sql = mysql_query("select max(no_pendaftaran) from pendaftaran");
							    $data = mysql_fetch_array($sql);
							    $max = $data[0];
							    $id = (int)substr($max, 2,4);
							    $id++;
							    $newids = "D".sprintf("%04s",$id);
							    ?>
							    <input type="text" name="no_pendaftaran" class="form-control" readonly="true" value="<?=$newids?>">
					        </div>
					        <div class="form-group col-md-3">
					        	<label>No Urut</label>
							    <?php
							    $date = date("Y-m-d");
							    $sql = mysql_query("select max(no_urut) from pendaftaran where tgl_pendaftaran='$date'");
							    $data = mysql_fetch_array($sql);
							    $max = $data[0];
							    $id = (int)substr($max, 2,4);
							    $id++;
							    $newidss = "TN".sprintf("%03s",$id);
							    ?>
							    <input type="text" name="no_urut" class="form-control" readonly="true" value="<?=$newidss?>">
					        </div>
					        <div class="form-group col-md-10">
					        	<label>Diperiksa Oleh</label>
					        	<select name="kd_dokter" class="form-control">
								    <?php
								    $dokter = mysql_query("select kd_dokter from jadwal_praktek");
								    while ($ambils = mysql_fetch_array($dokter)) {
									    $uluh = mysql_query("select * from dokter where kd_dokter='$ambils[0]'");
									    while ($ambil = mysql_fetch_array($uluh)) {
									    	echo "<option value=". $ambil[0] . ">" . $ambil[1] . "</option>";
									    }
								    }
								    ?>
					        	</select>
					        </div>
					        <div class="form-group col-md-10">
					        	<label>Pasien</label>
					        	<select name="kd_pasien" class="form-control">
								    <?php
								    $poli = mysql_query("select * from pasien");
								    while ($ambil = mysql_fetch_array($poli)) {
								    	echo "<option value=". $ambil[0] . ">" . $ambil[1] . "</option>";
								    }
								    ?>
					        	</select>
					        </div>
					        <div class="form-group col-md-5">
					        	<label>Tanggal Pendaftaran</label>
					        	<input type="text" class="form-control" name="tp" value="<?=date("Y-m-d")?>" readonly="true" placeholder="No Telepon">
					        </div>
					        <!-- SELESAI PENDAFTARAN -->
                        </div>
                        <input type="hidden" name="username" value="<?= $username ?>">
                        <div class="panel-footer">
                            Bila pasien belum terdaftar, kembali ke halaman sebelumnya dan pilih pendaftaran pasien
                        </div>
                    </div>
			        <div class="col-md-12">
			        <button class="btn btn-primary"><i class='fa fa-plus'></i>&nbsp;    Tambah Pendftaran</button>
		        	</div>
                </div>
                </div>
                </form>
	        	<div class="col-md-12">&nbsp;</div>
	            </div>
			</form>
			</div>
		</div>
	</div>
</div>
</div>
<?php
include("../layout/footer.php");
?>