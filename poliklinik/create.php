<?php
include("../layout/header.php");
?>
<title>Penambahan Data Poliklinik TRSNW.</title>
<div id="page-wrapper">
<div class="well">
	<br>
	<center>
	<label><h3>Penambahan Data Poliklinik</h3></label>
	</center>
</div>
<div class="well">
	<div class="row">
		<div class="col-md-8">
			<form action="simpan.php" method="post">
            <div class="row">
	            <div class="form-group col-md-3">
				    <label>Kode Poliklinik</label>
				    <?php
				    $sql = mysql_query("select max(kd_poli) from poliklinik");
				    $data = mysql_fetch_array($sql);
				    $max = $data[0];
				    $id = (int)substr($max, 2,4);
				    $id++;
				    $newid = "PL".sprintf("%03s",$id);
				    ?>
				    <input type="text" name="kd_poli" class="form-control" readonly="true" value="<?=$newid?>">
			  	</div>
		        <div class="form-group col-md-12">
		        	<label>Nama Poliklinik</label>
		        	<input type="text" name="nama" class="form-control" placeholder="Nama Poliklinik">
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