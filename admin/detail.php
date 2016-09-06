<?php
include('../layout/header.php');
$username = $_SESSION['username'];
include('../auth/hak_akses.php');
$nip = $_GET['nip'];
?>
<title>Detail Pegawai Poliklinik TRSNW.</title>
<div id="page-wrapper">
	<div class="row well">
		<div class="col-lg-12">
			<h2 class="page-header">
				<span class="fa-stack fa-1x">
			          <i class="fa fa-circle fa-stack-2x text-primary"></i>
			          <i class="fa fa-user-md fa-stack-1x fa-inverse"></i>
			    </span>&nbsp; Detail Data Pegawai 
			    <?php 
			    $query = mysql_query("select * from pegawai where nip=" . $nip);
			    $sql = mysql_fetch_array($query);
			    echo $sql[1]; ?>
			</h2>
		</div>
		<div class="col-lg-12">
			<div class="row well">
				<table width="100%" border="0">
					<tr>
					<td width="20%"><label>Nomor Induk Pegawai</label></td>
					<td>:</td>
					<td><label><?=$sql[0]?><label></td>
					</tr>
					<tr>
					<td width="20%"><label>Nama Pegawai</label></td>
					<td>:</td>
					<td><label><?=$sql[1]?><label></td>
					</tr>
					<tr>
					<td width="20%"><label>Alamat Pegawai</label></td>
					<td>:</td>
					<td><label><?=$sql[2]?><label></td>
					</tr>
					<tr>
					<td width="20%"><label>No Telepon Pegawai</label></td>
					<td>:</td>
					<td><label><?=$sql[3]?><label></td>
					</tr>
					<tr>
					<td width="20%"><label>Tanggal Lahir</label></td>
					<td>:</td>
					<td><label><?=$sql[4]?><label></td>
					</tr>
					<tr>
					<td width="20%"><label>Jenis Kelamin</label></td>
					<td>:</td>
					<td><label><?=$sql[5]?><label></td>
					</tr>
					<tr>
					<td width="20%"><label>Username</label></td>
					<td>:</td>
					<td><label><?=$sql[6]?><label></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<?php
include('../layout/footer.php')
?>