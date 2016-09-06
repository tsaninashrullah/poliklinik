<?php
include('../layout/header.php');
?>
<title>Pencatatan Pemeriksaan Poliklinik TRSNW.</title>
<div id="page-wrapper">
	<div class="row well">
	<div class="col-md-12">
	<div class="well">
	<h2 class="page-header">
    <span class="fa-stack fa-1x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-hospital-o fa-stack-1x fa-inverse"></i>
    </span>&nbsp;List Data Hasil Pemeriksaan</h2>
    </div>
    <div class="col-md-3 pull-right">
    <form action="cari.php" method="get">
    	<!-- Blog Search Well -->
            <div class="input-group well">
                <input type="text" class="form-control" name="search" placeholder="Cari Data">
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
				<th>No Pemeriksaan</th>
				<th>Keluhan</th>
				<th>Tindakan</th>
				<th>Tensi Diastolik</th>
				<th>Tensi Sistolik</th>
				<th>Obat</th>
				<th>Nama Pasien</th>
				<th>Aksi</th>
				</tr>
				<?php
				$query=mysql_query("select * from pemeriksaan order by no_pemeriksaan");
				if (mysql_num_rows($query) > 0) {
					while($data=mysql_fetch_array($query))
					{
						echo "<tr>";
						echo "<td>".$data[0]."</td>";
						echo "<td>".$data[1]."</td>";
						echo "<td>".$data[4]."</td>";
						echo "<td>".$data[6]."</td>";
						echo "<td>".$data[7]."</td>";
						$obat = mysql_query("select * from history_obat where kd_resep='$data[8]'");
						echo "<td><ul>";
						while ($ambil = mysql_fetch_array($obat)) {
							if ($ambil[0]=="") {
								echo "-";
							}else{
								$final = mysql_query("select * from obat where kd_obat='$ambil[1]'");
								while ($ambils=mysql_fetch_array($final)) {
									echo "<li>";
									echo $ambils[1];
									echo "</li>";
								}
							}
						}
						$obat = mysql_query("select * from pendaftaran where no_pendaftaran='$data[9]'");
						echo "</ul></td><td>";
						while ($ambil = mysql_fetch_array($obat)) {
							if ($ambil[0]=="") {
								echo "-";
							}else{
								$final = mysql_query("select * from pasien where kd_pasien='$ambil[3]'");
								while ($ambils=mysql_fetch_array($final)) {
									echo $ambils[1];
								}
							}
						}
						echo "</td><td>
						<a href='detail.php?no_pemeriksaan=" . $data[0] . "'> <i class='fa fa-eye'></i> </a>  
						<a href='edit.php?no_pemeriksaan=" . $data[0] . "&key=edit'> <i class='fa fa-pencil'></i> </a>  
						<a href='edit.php?no_pemeriksaan=" . $data[0] . "&key=delete'> <i class='fa fa-trash-o'></i> </a>
						";
						echo "</tr>";
					}
				}else{
					echo "<tr><td colspan=7>&nbsp;</td></tr>";
					echo "<tr><td colspan=7 bgcolor='gray'><strong><center>Tidak Ada Data</center></strong></td></tr>";
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