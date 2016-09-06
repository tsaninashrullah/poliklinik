<?php
include("../layout/header.php");
$no_pemeriksaan = $_GET['no_pemeriksaan'];
$no_pendaftaran = $_GET['no_pendaftaran'];
?>
<title>Pencatatan Poliklinik TRSNW.</title>
<div id="page-wrapper">
<div class="well">
	<br>
	<center>
	<label><h3>Pencatatan Data Resep</h3></label>
	</center>
</div>
<div class="well">
	<div class="row">
		<div class="col-lg-12">
            <div class="row">
			  	<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Form Pencatatan Resep
                        <form action="auth_nambah.php?no_pendaftaran=<?=$no_pendaftaran?>" method="Post">
                        </div>
                        <div class="panel-body">
                        <div class="form-group col-md-3">
				        	<label>No Pemeriksaan</label>
				        	<input type="text" name="no_pemeriksaan" class="form-control" value="<?=$no_pemeriksaan?>" readonly="true">
				        </div>
				        <div class="form-group col-md-3">
				        	<label>No Pendaftaran</label>
				        	<input type="text" name="no_pendaftaran" class="form-control" value="<?=$no_pendaftaran?>" readonly="true">
				        </div>
                        <div class="row">
                        <div class="col-lg-12">
		                    <div class="panel panel-default">
		                        <div class="panel-heading">
		                            Form Resep
		                        </div>
		                        <div class="panel-body">
		                            <div class="form-group col-md-3">
							        	<label>Kode Resep</label>
									    <?php
									    $sql = mysql_query("select max(kd_resep) from resep");
									    $data = mysql_fetch_array($sql);
									    $max = $data[0];
									    $id = (int)substr($max, 2,4);
									    $id++;
									    $newid = "R".sprintf("%04s",$id);
									    ?>
									    <input type="text" name="kd_resep" class="form-control" readonly="true" value="<?=$newid?>">
							        </div>
						        <div class="col-md-12">
						        <button class="btn btn-primary"><i class='fa fa-plus'></i>&nbsp;    Tambah Resep</button>
					        	</div>
		                        </div>
		                        <div class="panel-footer">
		                            Tambah Obat Untuk Memasukkan Data Obat
		                        </div>
		                    </div>
		                </div>
		                </div>
		                </form>
			        	<div class="col-md-12">&nbsp;</div>
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