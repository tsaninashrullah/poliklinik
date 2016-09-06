<?php
include("../layout/header.php");
?>
<title>Penambahan Jenis Biaya Poliklinik TRSNW.</title>
<div id="page-wrapper">
<div class="well">
	<h2 class="page-header">
    <span class="fa-stack fa-1x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-folder-open fa-stack-1x fa-inverse"></i>
    </span>&nbsp;Back Up Database</h2>
</div>
<div class="well">
	<div class="row">
		<div class="col-md-8">
            <div class="row">
	            <div class="col-md-12 form-group">
			        <a href="semua.php" class="btn btn-primary"><i class='fa fa-folder-open'></i>&nbsp;    Backup Database</a>
		        </div>
		        <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            BackUp Tabel
                        </div>
                        <div class="panel-body">
							<form action="proses_backup.php" method="post">
					        <div class="form-group col-md-12">
					        	<label>Nama Tabel</label>
					        	<select name="yosh" class="form-control">
					        		<option value="pasien">Pasien</option>
					        		<option value="pendaftaran">Pendaftaran</option>
					        		<option value="pemeriksaan">Pemeriksaan</option>
					        		<option value="kunjungan">Kunjungan</option>
					        		<option value="obat">Obat</option>
					        		<option value="resep">Resep</option>
					        		<option value="dokter">Dokter</option>
					        		<option value="poliklinik">Poliklinik</option>
					        		<option value="jadwal_praktek">Jadwal Praktek</option>
					        		<option value="jenis_biaya">Jenis Biaya</option>
					        	</select>
					        </div>
					        <div class="form-group col-md-12">
					        	<label>Lokasi</label>
					        	<input type="file" name="nama" class="form-control" placeholder="Nama Biaya">
					        </div>
					        <div class="col-md-8 form-group">
						        <button class="btn btn-success"><i class='fa fa-folder-open'></i>&nbsp;    Backup Tabel</button>
					        </div>
							</form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Restore Tabel
                        </div>
                        <div class="panel-body">
							<form action="proses_restore.php" method="post">
					        <div class="form-group col-md-12">
					        	<label>file</label>
					        	<input type="file" name="datafile" class="form-control" placeholder="Nama Biaya">
					        </div>
					        <div class="col-md-8 form-group">
						        <button class="btn btn-success"><i class='fa fa-folder-open'></i>&nbsp;    Restore Tabel</button>
					        </div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
</div>
<?php
include("../layout/footer.php");
?>