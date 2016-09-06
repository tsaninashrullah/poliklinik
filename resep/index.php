<?php
include('../layout/header.php');
?>
<title>List Resep Poliklinik TRSNW.</title>
<div id="page-wrapper">
	<div class="row well">
	<div class="col-md-12">
	<div class="well">
	<h2 class="page-header">
    <span class="fa-stack fa-1x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-tablet fa-stack-1x fa-inverse"></i>
    </span>&nbsp;List Data Resep</h2>
    </div>
    <div class="col-md-3 pull-right">
    <form action="cari.php" method="get">
    	<!-- Blog Search Well -->
            <div class="input-group well">
                <input type="text" class="form-control" name="search" placeholder="Cari Resep">
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
				<th>Kode Resep</th>
				<th>Jumlah</th>
				<th>Daftar Obat</th>
				<th>Dosis Per Obat</th>
				<th>Aksi</th>
				</tr>
				<?php
				$query=mysql_query("select * from resep order by kd_resep");
				echo mysql_error();
				// echo mysql_result($query, 0);
				if (mysql_num_rows($query) > 0) {
					while($data=mysql_fetch_array($query))
					{
						echo "<tr>";
						echo "<td>".$data[0]."</td>";
						echo "<td>".$data[1]."</td>";
						$obat = mysql_query("select * from history_obat where kd_resep='$data[0]'");
						echo "<td><ul>";
						while ($ambil = mysql_fetch_array($obat)) {
							if ($ambil[0]=="") {
								echo "-";
							}else{
								$final = mysql_query("select * from obat where kd_obat='$ambil[1]'");
								while ($ambils=mysql_fetch_array($final)) {
									echo "<li>";
									echo $ambils[1];
								}
								echo "(" . $ambil[3] . ") &nbsp;";
								echo "<a href='hapus_obat.php?kd_obat=$ambil[1]&&kd_resep=$ambil[0]'> <i class='fa fa-minus'></i> </a></li>";
							}
						}
						echo "</ul></td>";
						echo "<td><ul>";
						$obat1 = mysql_query("select * from history_obat where kd_resep='$data[0]'");
						while ($ambilm = mysql_fetch_array($obat1)) {
							if ($ambilm[0]=="") {
								echo "<li>-</li>";
							}else{
							echo "<li>";
							echo $ambilm[2];
							echo "</li>";
							}
						}
						echo "</ul></td>";
						echo "<td>
						<a href='edit.php?kd_resep=" . $data[0] . "&key=edit'> <i class='fa fa-pencil'></i> </a>  
						<a href='edit.php?kd_resep=" . $data[0] . "&key=delete'> <i class='fa fa-trash-o'></i> </a>
						<a href='nambah.php?kd_resep=" . $data[0] . "'> <i class='fa fa-plus'></i> </a>  
						";
						echo "</tr>";
					}
				}else{
					echo "<tr><td colspan=5>&nbsp;</td></tr>";
					echo "<tr><td colspan=5 bgcolor='gray'><strong><center>Tidak Ada Data</center></strong></td></tr>";
				}

				?>
			</center>
		</table>
		<div class="col-md-12">
			<div class="pull-right">
				<a href="pdf.php" class="btn btn-success"><i class='fa fa-table'></i>  Report</a>
				<a href="create.php" class="btn btn-primary"><i class='fa fa-pencil'></i>  Tambah</a>
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