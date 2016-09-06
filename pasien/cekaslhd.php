<?php
include('../layout/header.php');
?>
<title>List Pasien Poliklinik TRSNW.</title>
<div id="page-wrapper">
	<div class="row well">
	<div class="col-md-12">
	<div class="well">
	<h2 class="page-header">
    <span class="fa-stack fa-1x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-hospital-o fa-stack-1x fa-inverse"></i>
    </span>&nbsp;List Data Pasien</h2>
    </div>
    <div class="col-md-3 pull-right">
    <form action="cari.php" method="get">
    	<!-- Blog Search Well -->
            <div class="input-group well">
                <input type="text" class="form-control" name="search" placeholder="Cari Pasien">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
        <!-- /.input-group -->
    </form>
    </div>
    <?php 
//        includekan fungsi paginasi
        include('../config/pagination.php');
        
//        mengatur variabel reload dan sql
        if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
//        jika ada kata kunci pencarian (artinya form pencarian disubmit dan tidak kosong)
//        pakai ini
            $keyword=$_REQUEST['keyword'];
            $reload = "index.php?pagination=true&keyword=$keyword";
            $sql =  "SELECT * FROM pasien WHERE nama_pasien LIKE '%$keyword%' ORDER BY kd_pasien";
            $query = mysql_query($sql);
        }else{
//            jika tidak ada pencarian pakai ini
            $reload = "index.php?pagination=true";
            $sql =  "SELECT * FROM pasien ORDER BY kd_pasien";
            $query = mysql_query($sql);
        }
        
        //pagination config start
        $rpp = 2; // jumlah record per halaman
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysql_num_rows($query);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
        //pagination config end
    ?>
    <div class="col-lg-12"><br></div>
		<div class="col-md-12 well table-responsive">
		<center>
			<table width=100% align="center" class="table table-hover">
				<tr><th>Kode Pasien</th>
				<th>Nama Pasien</th>
				<th>Alamat Pasien</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal Pendaftaran</th>
				<th>Aksi</th>
				</tr>
				<?php
				$query=mysql_query("select * from pasien order by kd_pasien");
				if (mysql_num_rows($query) > 0) {
					while(($data=mysql_fetch_array($query)) && ($count<$rpp) && ($i<$tcount) && (mysql_data_seek($query,$i))) 
					{   
						echo "<tr>";
						echo "<td>".$data[0]."</td>";
						echo "<td>".$data[1]."</td>";
						echo "<td>".$data[2]."</td>";
						echo "<td>".$data[5]."</td>";
						echo "<td>".$data[6]."</td>";
						echo "<td>
						<a href='detail.php?kd_pasien=" . $data[0] . "'> <i class='fa fa-eye'></i> </a>  
						<a href='edit.php?kd_pasien=" . $data[0] . "&key=edit'> <i class='fa fa-pencil'></i> </a>  
						<a href='edit.php?kd_pasien=" . $data[0] . "&key=delete'> <i class='fa fa-trash-o'></i> </a>
						";
						echo "</tr>";
						$i++; 
                        $count++;
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
			<?php echo paginate_one($reload, $page, $tpages); ?>
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