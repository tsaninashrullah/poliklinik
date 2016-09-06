<?php
include("../layout/header.php");
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
			<form action="simpan.php" method="post">
            <div class="row">
			  	<div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                       Form Obat
                    </div>
                    <div class="panel-body">
			            <!-- Tempat Untuk Form Obat -->
			            <div class="form-group col-md-3">
						    <label>Kode Obat</label>
						    <?php
						    $sql = mysql_query("select max(kd_obat) from obat");
						    $data = mysql_fetch_array($sql);
						    $max = $data[0];
						    $id = (int)substr($max, 2,4);
						    $id++;
						    $newid = "O".sprintf("%04s",$id);
						    ?>
						    <input type="text" name="kd_obat" class="form-control" readonly="true" value="<?=$newid?>">
					  	</div>
					  	<div class="form-group col-md-12">
				        	<label>Nama Obat</label>
				        	<input type="text" name="nama" class="form-control" placeholder="Nama Obat">
				        </div>
					  	<div class="form-group col-md-12">
				        	<label>Merk Obat</label>
				        	<input type="text" name="merk" class="form-control" placeholder="Merk Obat">
				        </div>
					  	<div class="form-group col-md-12">
				        	<label>Satuan</label>
				        	<select name="satuan" class="form-control">
				        		<option value="Tube">Tube</option>
				        		<option value="Kapsul">Kapsul</option>
				        		<option value="Tablet">Tablet</option>
				        		<option value="Kaplet">Kaplet</option>
				        		<option value="Botol">Botol</option>
				        		<option value="Gram">Gram</option>
				        		<option value="Mg">Mg</option>
				        	</select>
				        </div>
				        <div class="col-md-12 form-group">
		                    <label>Harga</label>
						    <div class="input-group col-md-4">
						      <div class="input-group-addon">Rp.</div>
						      <input type="text" class="form-control" required data-validation-required-message='Tidak boleh ada data yang kosong.' name="harga" id="exampleInputAmount" placeholder="Harga">
						      <div class="input-group-addon">,00</div>
						    </div>
						</div>		        
					  	<!-- Selesai Untuk Form Resep -->
                    </div>
                </div>
		        <div class="col-md-8 form-group">
			        <button class="btn btn-success"><i class='fa fa-plus'></i>&nbsp;    Tambah</button>
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