<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Core CSS - Include with every page -->
    <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="../assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Page Icon -->
    <link rel='shortcut icon' href='../images/logo.png'> 
   </head>
   <?php
   include("../config/koneksi.php");
   ?>
    <?php
  $username = $_SESSION['username'];
  session_start();
  if(!isset($_SESSION['username'])){
  header('location:../site/login.php');
  }
  ?>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../site/index.php">
                    <img src="../images/text.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->

                <!-- dropdown home -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../site/index.php">
                        <span class="top-label label label-danger"></span><i class="fa fa-home fa-2x"></i>
                    </a>
                </li>
                <!-- end dropdown home -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-2x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../admin/profile.php"><i class="fa fa-user fa-fw"></i>Profil Petugas</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../site/logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="../images/logo.png" alt="">
                            </div>
                            <div class="user-info">
                            <?php
                            $username = $_SESSION['username'];
                            $sql = mysql_query("select * from pegawai where username='$username'");
                            $ambil = mysql_fetch_array($sql);
                            echo mysql_error();
                            ?>
                                <div><strong><?=$ambil[1];?></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <!-- <form action="../site/keyword.php" method="get"> -->
                        <!-- <div class="input-group"> -->
                            <!-- <select name="keyword" class="form-control">
                                <option value="dokter">Dokter</option>
                                <option value="pasien">Pasien</option>
                                <option value="jadwal">Jadwal</option>
                                <option value="biaya">Jenis Biaya</option>
                                <option value="resep">Resep</option>
                                <option value="obat">Obat</option>
                                <option value="poliklinik">Poliklinik</option>
                            </select>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        
                        </form> -->
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="../site/index.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> Master Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../dokter/index.php"><i class="fa fa-stethoscope fa-fw"></i>  Dokter</a>
                            </li>
                            <li>
                                <a href="../pasien/index.php"><i class="fa fa-users fa-fw"></i>  Pasien</a>
                            </li>
                            <li>
                                <a href="../jadwal/index.php"><i class="fa fa-table fa-fw"></i>  Jadwal</a>
                            </li>
                            <li>
                                <a href="../biaya/index.php"><i class="fa fa-dollar fa-fw"></i>  Jenis Biaya</a>
                            </li>
                            <li>
                                <a href="../resep/index.php"><i class="fa fa-tablet fa-fw"></i>  Resep</a>
                            </li>
                            <li>
                                <a href="../obat/index.php"><i class="fa fa-heart-o"></i> Obat</a>
                            </li>
                            <li>
                                <a href="../poliklinik/index.php"><i class="fa fa-hospital-o fa-fw"></i>  Poliklinik</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="../pendaftaran/index.php"><i class="fa fa-edit"></i>  Pendaftaran</a>
                    </li>
                    <li>
                        <a href="../pemeriksaan/index.php"><i class="fa fa-medkit"></i>  Pemeriksaan</a>
                    </li>
                    <?php
                    $query = mysql_query("select * from login where username='$username'");
                    $ambil = mysql_fetch_array($query);

                    if ($ambil[2]=="1") {
                        echo "
                            <li>
                                <a href='../admin/index.php'><i class='fa fa-user-md'></i>  Petugas</a>
                            </li>
                            <li>
                                <a href='../site/backup.php'><i class='fa fa-folder-open'></i>  Backup</a>
                            </li>";
                        }
                    ?>

                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i>Sample Pages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="login.html">Login Page</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->