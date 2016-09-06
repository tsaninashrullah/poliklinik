<?php
include('../layout/header.php');
?>
<title>List Obat Poliklinik TRSNW.</title>
<div id="page-wrapper">
	<div class="row well">
	<div class="col-md-12">
	<div class="well">
	<h2 class="page-header">
    <span class="fa-stack fa-1x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-heart-o fa-stack-1x fa-inverse"></i>
    </span>&nbsp;List Data Obat</h2>
    </div>
    <div class="col-md-3 pull-right">
    <form action="cari.php" method="get">
    	<!-- Blog Search Well -->
            <div class="input-group well">
                <input type="text" class="form-control" name="search" placeholder="Cari Obat">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
        <!-- /.input-group -->
    </form>
    </div>
    <div class="col-lg-12"><br></div>
		<div class="col-md-12 well table-responsive">
		<center>
			<table width=100% align="center" class="table table-hover">
				<tr>
				<th>Kode Obat</th>
				<th>Nama Obat</th>
				<th>Merk Obat</th>
				<th>Satuan</th>
				<th>Harga Jual</th>
				<th>Aksi</th>
				</tr>
				<?php
				$query=mysql_query("select * from obat order by kd_obat");
				if (mysql_num_rows($query) > 0) {
					while($data=mysql_fetch_array($query))
					{
						echo "<tr>";
						echo "<td>".$data[0]."</td>";
						echo "<td>".$data[1]."</td>";
						echo "<td>".$data[2]."</td>";
						echo "<td>".$data[3]."</td>";
						echo "<td>".$data[4]."</td>";
						echo "<td>
						<a href='edit.php?kd_obat=" . $data[0] . "&key=edit'> <i class='fa fa-pencil'></i> </a>  
						<a href='edit.php?kd_obat=" . $data[0] . "&key=delete'> <i class='fa fa-trash-o'></i> </a>
						";
						echo "</tr>";
					}
				}else{
					echo "<tr><td colspan=6>&nbsp;</td></tr>";
					echo "<tr><td colspan='6' bgcolor='gray'><strong><center>Tidak Ada Data</center></strong></td></tr>";
				}

				?>
			</center>
		</table>
		<div class="col-md-12">
			<div class="pull-right">
				<a href="pdf.php" class="btn btn-success"><i class='fa fa-table'></i>  Report</a>
				<?php
				$resep = mysql_query("select * from resep");
				if (mysql_num_rows($resep) > 0 ) {
					echo "<a href='create.php' class='btn btn-primary'><i class='fa fa-pencil'></i>  Tambah</a>";
				}else{
					echo "&nbsp;";
				}
				?>
			</div>
		</div>
		</div>
	</div>
	</div>
	</center>
	</div>
	</div>
	</div>
	</div>
	</div>
</div>
<?php
include("../layout/footer.php");
?>