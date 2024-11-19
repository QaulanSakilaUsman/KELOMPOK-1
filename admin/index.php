<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arsip Surat Kemenag </title>

    <!-- Bootstrap -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <link rel="shortcut icon" href="../img/icon.ico">

    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
        <!-- Profile and Sidebarmenu -->
        <?php
        include("sidebarmenu.php");
        ?>
        <!-- /Profile and Sidebarmenu -->
        
        <!-- top navigation -->
        <?php
        include("header.php");
        ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
              <div class="col-md-12">
                <div class="">
                  
                  <div class="x_content">
                    <div class="row">
                      <div class="row">
                      
                        <div class="col-md-12 col-sm-12 col-xs-12">   
                        <div class="row x_title">
                        <div class="col-md-12" style="text-align: center; background-color: #FFFFFF; padding: 20px;">
                            <h3 style="font-size: 30px; color: black;">SISTEM INFORMASI ARSIP SURAT MASUK DAN SURAT KELUAR</h3>
                        </div>
                        
                      </div>  
                          
                        </div>
                      </div>
                      
                                <?php include '../koneksi/koneksi.php';
                                $sql1		= "SELECT * FROM tb_suratmasuk";  
                                $query1  	= mysqli_query($db, $sql1);
                                $jumlah1   = mysqli_num_rows($query1);
                                  ?>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats" style="background-color: #9DC3E6; padding: 15px;">
                          <div class="icon" style="color: #222A35; padding-right:13%;"><i class="fa fa-inbox"></i>
                          </div>
                          <div class="count" style="color: #222A35;"><?php echo "$jumlah1" ?></div>
                          <h3 style="color: #222A35; padding-bottom:10px;">Data Surat Masuk</h3>
                          <p><a href="datasuratmasuk.php" class="btn btn-primary" style="background-color: #222A35; border: none;">Selengkapnya</a></p>
                        </div>
                      </div>
                                <?php include '../koneksi/koneksi.php';
                                $sql2		= "SELECT * FROM tb_suratkeluar";  
                                $query2  	= mysqli_query($db, $sql2);
                                $jumlah2   = mysqli_num_rows($query2);
                                  ?>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats" style="background-color: #FFD966; padding: 15px;">
                          <div class="icon" style="color: #222A35; padding-right:13%;"><i class="fa fa-send"></i>
                          </div>
                          <div class="count"  style="color: #222A35;"><?php echo "$jumlah2" ?></div>
                          <h3 style="color: #222A35; padding-bottom:10px;"> Data Surat Keluar</h3>
                          <p><a href="datasuratkeluar.php" class="btn btn-primary" style="background-color: #222A35; border: none;">Selengkapnya</a></p>
                        </div>
                      </div>
                                <?php include '../koneksi/koneksi.php';
                                $sql3		= "SELECT * FROM tb_bagian";  
                                $query3  	= mysqli_query($db, $sql3);
                                $jumlah3   = mysqli_num_rows($query3);
                                  ?>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats" style="background-color:#FF3300; padding: 15px;">
                          <div class="icon" style="color: #222A35; padding-right:13%;"><i class="fa fa-users"></i>
                          </div>
                          <div class="count" style="color: #222A35;"><?php echo "$jumlah3" ?></div>

                          <h3 style="color: #222A35; padding-bottom:10px;">Data Bagian</h3>
                          <p><a href="databagian.php" class="btn btn-primary" style="background-color: #222A35; border: none;">Selengkapnya</a></p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
                <div class="col-md-12 mt-4">
                <div class="alert alert-success" style="padding-bottom: 5px; background-color:#C5E0B4; border-color: green;">
                  <h4 align="left" style="font-size: 20px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: green;"> Selamat Datang, Anda Login sebagai <b><?php echo $_SESSION['nama'];?></b> 
                    </b>
                  </h4>
                </div>
              </div>
          </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right" style="font-style: italic;">
            Copyright @ Kelompok 1 Proyek Sistem Informasi
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../assets/vendors/Flot/jquery.flot.js"></script>
    <script src="../assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="../assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assets/vendors/moment/min/moment.min.js"></script>
    <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../assets/build/js/custom.min.js"></script>
	
  </body>
</html>
