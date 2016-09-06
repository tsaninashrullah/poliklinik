<?php
include('../layout/header.php');
$username = $_SESSION['username'];
?>
<title>Pendaftaran Poliklinik TRSNW.</title>
<div id="page-wrapper">
	<div class="row well">
		<div class="col-lg-12">
			<h2 class="page-header">
				<span class="fa-stack fa-1x">
			          <i class="fa fa-circle fa-stack-2x text-primary"></i>
			          <i class="fa fa-user-md fa-stack-1x fa-inverse"></i>
			    </span>&nbsp; Pilihan Daftar 
			</h2>
		</div>
		<div class="col-lg-12">
			<div class="row well">
				<div class="col-md-6 col-sm-6">
	            <a href="create.php">
	                <div class="panel panel-default text-center">
	                    <div class="panel-heading">
	                        <center><h2><i class='fa fa-briefcase'></i>Pendafaran Pasien</h2></center>
	                    </div>
	                </div>
	            </a>
	            </div>
	            <div class="col-md-6 col-sm-6">
	            <a href="creates.php">
	                <div class="panel panel-default text-center">
	                    <div class="panel-heading">
	                        <center><h2><i class='fa fa-archive'></i>Pendafaran Ulang</h2></center>
	                    </div>
	                </div>
	            </a>
	            </div>
			</div>
		</div>
	</div>
</div>

<?php
include('../layout/footer.php')
?>