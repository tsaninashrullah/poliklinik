<?php
include('../layout/header.php');
$username = $_SESSION['username'];
include('../auth/hak_akses.php');
?>
<title>List Admin Poliklinik TRSNW.</title>
<div id="page-wrapper">
	<div class="row well">
	<div class="col-md-12">
	<div class="well">
	<h2 class="page-header">
    <span class="fa-stack fa-1x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-user-md fa-stack-1x fa-inverse"></i>
    </span>&nbsp;List Data Pegawai</h2>
    </div>
    <div class="col-md-3 pull-right">
    <form action="cari.php" method="get">
    	<!-- Blog Search Well -->
            <div class="input-group well">
                <input type="text" class="form-control" name="search" placeholder="Cari Pegawai">
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
				<tr><th>NIP</th><th>Nama Pegawai</th>
				<th>Alamat</th>
				<th>Username</th>
				<th>Status</th>
				<th>Aksi</th>
				</tr>
				<?php
				$query=mysql_query("select * from pegawai order by nama");
				if (mysql_num_rows($query) > 0) {
					while($data=mysql_fetch_array($query))
					{
						echo "<tr>";
						echo "<td>".$data[0]."</td>";
						echo "<td>".$data[1]."</td>";
						echo "<td>".$data[2]."</td>";
						echo "<td>".$data[6]."</td>";
						$cari = mysql_query("select status from login where username ='$data[6]'") or mysql_error();
						$nama = mysql_fetch_array($cari);
							if ($nama[0]=="1") {
								echo "<td>Admin Sistem</td>";
							}else{
								echo "<td>Petugas Poliklinik</td>";
							}
						echo "<td>
						<a href='detail.php?nip=" . $data[0] . "'> <i class='fa fa-eye'></i> </a>  
						<a href='edit.php?nip=" . $data[0] . "&key=edit'> <i class='fa fa-pencil'></i> </a>  
						<a href='edit.php?nip=" . $data[0] . "&key=delete'> <i class='fa fa-trash-o'></i> </a>
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