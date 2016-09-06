<?php
include('../layout/header.php');
?>
<title>List Pendaftaran Poliklinik TRSNW.</title>
<div id="page-wrapper">
	<div class="row well">
	<div class="col-md-12">
	<div class="well">
	<h2 class="page-header">
    <span class="fa-stack fa-1x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-hospital-o fa-stack-1x fa-inverse"></i>
    </span>&nbsp;List Pendaftaran</h2>
    </div>
    <div class="col-md-3 pull-right">
    <form action="cari.php" method="get">
    	<!-- Blog Search Well -->
            <div class="input-group well">
                <input type="text" class="form-control" name="search" placeholder="Cari Pendaftaran">
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
				<tr><th>No Pendaftaran</th>
				<th>Tanggal Pendaftaran</th>
				<th>No Urut</th>
				<th>Nama Pasien</th>
				<th>Biaya</th>
				<th>Daftar Obat</th>
				<th>Total Biaya</th>
				<th>Aksi</th>
				</tr>
				<?php
				$query=mysql_query("select * from pendaftaran order by no_pendaftaran");
				if (mysql_num_rows($query) > 0) {
					while($data=mysql_fetch_array($query))
					{
						echo "<tr>";
						echo "<td>".$data[0]."</td>";
						echo "<td>".$data[1]."</td>";
						echo "<td>".$data[2]."</td>";
						$cari = mysql_query("select * from pasien where kd_pasien ='$data[3]'") or mysql_error();
						$nama = mysql_fetch_array($cari);
						echo "<td>" . $nama[1] . "</td>";
						$obat = mysql_query("select * from history_biaya where no_pendaftaran='$data[0]'");
						echo "<td>";
						while ($ambil = mysql_fetch_array($obat)) {
							if ($ambil[0]=="") {
								echo "";
							}else{
								$final = mysql_query("select * from jenis_biaya where kd_jenis='$ambil[1]'");
								while ($ambils=mysql_fetch_array($final)) {
									echo "- ";
									echo $ambils[1];
									echo "<br>";
								}
							}
						}
						echo "</td>";
						echo "<td>";
						$pemeriksaan = mysql_query("select * from pemeriksaan where no_pemeriksaan='$data[5]'");
						while ($ambilperiksa=mysql_fetch_array($pemeriksaan)) {
							$resep = mysql_query("select * from history_obat where kd_resep='$ambilperiksa[8]'");
							while ($ambilresep=mysql_fetch_array($resep)) {
								$obatasli=mysql_query("select * from obat where kd_obat='$ambilresep[1]'");
								if (mysql_num_fields($obatasli) == 0) {
									echo "Belum ada obat";
								}else{
									while ($ambilobat=mysql_fetch_array($obatasli)) {
										echo "- ";
										echo $ambilobat[1];
									}
									echo " (".$ambilresep[3].")";
									echo "<br>";
								}
							}
						}
						echo "</td>";
						echo "<td> Rp. ".$data[7].",00-</td>";
						echo "<td>
						<a href='detail.php?no_pendaftaran=" . $data[0] . "'> <i class='fa fa-eye'></i> </a>  
						<a href='edit.php?no_pendaftaran=" . $data[0] . "&key=edit'> <i class='fa fa-pencil'></i> </a>  
						<a href='edit.php?no_pendaftaran=" . $data[0] . "&key=delete'> <i class='fa fa-trash-o'></i> </a>
						<a href='bayar.php?no_pendaftaran=" . $data[0] . "'> <i class='fa fa-plus'></i> </a>  
						";
						// $periksa = mysql_query("select * from pemeriksaan where no_pemeriksaan='$data[5]'");
						// while ($ambilvalidasi=mysql_fetch_array($periksa)) {
							
						// }
						if (mysql_num_rows($obat) > 0 || mysql_num_rows($pemeriksaan) > 0) {
							echo "<a href='pdfbayar.php?no_pendaftaran=" . $data[0] . "'> <i class='fa fa-dollar'></i> </a>";
						}
						echo "</tr>";
					}
				}else{
					echo "<tr><td colspan=6>&nbsp;</td></tr>";
					echo "<tr><td colspan=6 bgcolor='gray'><strong><center>Tidak Ada Data</center></strong></td></tr>";
				}

				?>
			</center>
		</table>
		<div class="col-md-12">
			<div class="pull-right">
				<a href="pdf.php" class="btn btn-success"><i class='fa fa-table'></i>  Report</a>
				<a href="choose.php" class="btn btn-primary"><i class='fa fa-pencil'></i>  Tambah</a>
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