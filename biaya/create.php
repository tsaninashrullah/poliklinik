<?php
include("../layout/header.php");
?>
<title>Penambahan Jenis Biaya Poliklinik TRSNW.</title>
<div id="page-wrapper">
<div class="well">
	<br>
	<center>
	<label><h3>Penambahan Jenis Biaya</h3></label>
	</center>
</div>
<div class="well">
	<div class="row">
		<div class="col-md-8">
			<form action="simpan.php" method="post">
            <div class="row">
	            <div class="form-group col-md-3">
				    <label>Kode Jenis Biaya</label>
				    <?php
				    $sql = mysql_query("select max(kd_jenis) from jenis_biaya");
				    $data = mysql_fetch_array($sql);
				    $max = $data[0];
				    $id = (int)substr($max, 2,4);
				    $id++;
				    $newid = "JB".sprintf("%03s",$id);
				    ?>
				    <input type="text" name="kd_jenis" class="form-control" readonly="true" value="<?=$newid?>">
			  	</div>
		        <div class="form-group col-md-12">
		        	<label>Nama Biaya</label>
		        	<input type="text" name="nama" class="form-control" placeholder="Nama Biaya">
		        </div>
                <div class="col-md-12 form-group">
                    <label>Besar Biaya</label>
				    <div class="input-group col-md-4">
				      <div class="input-group-addon">Rp.</div>
				      <input type="text" class="form-control" required data-validation-required-message='Tidak boleh ada data yang kosong.' name="besar" id="exampleInputAmount" placeholder="Besar Biaya">
				      <div class="input-group-addon">,00</div>
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