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
    <!-- Datatables -->
     
    <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
      <link rel="shortcut icon" href="../img/icon.ico">
    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
    
    <style>

        input[type="date"] {
        width: 150px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 10px;
        }

        .button {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        margin-top:5px;
        margin-bottom:10px;
  
        }

        .cetak-button {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        border-radius: 4px;
        cursor: pointer;
        border:none;
        }

    </style>
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
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa-solid fa-file-arrow-down"></i>&nbsp;DAFTAR SURAT MASUK</h2>
                        <div class="clearfix"></div>
                    </div>
                    <form action="lap_sm.php" method="post" >
                        <input type="date" name="tglawal" required >&nbsp;to &nbsp;&nbsp;
                        <input type="date" name="tglakhir"  required>
                        <input type="submit" class="cetak-button" value="Filter Data" name="filter">
                    </form><br>
                    <form action="cetak_sm.php" method="post" target="_blank">
                        <input type="hidden" name="tglawal" value="<?php echo isset($_POST['tglawal']) ? $_POST['tglawal'] : ''; ?>">
                        <input type="hidden" name="tglakhir" value="<?php echo isset($_POST['tglakhir']) ? $_POST['tglakhir'] : ''; ?>">
                        <button type="submit" class="button">Cetak Laporan</button>
                    </form>
                    <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="3%">No Urut</th>
                                        <th width="10%">Tanggal Masuk</th>
                                        <th width="3%">Kode Surat</th>
                                        <th width="10%">Tanggal Surat</th>
                                        <th width="14%">Pengirim</th>
                                        <th width="15%">Nomor Surat</th>
                                        <th width="10%">Kepada</th>
                                        <th width="25%">Perihal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include '../koneksi/koneksi.php';
                                    if (isset($_POST['filter'])){
                                        $tglawal = mysqli_real_escape_string($db,$_POST['tglawal']);
                                        $tglakhir = mysqli_real_escape_string($db,$_POST['tglakhir']);
                                        $sql1 = mysqli_query($db, "SELECT * FROM tb_suratmasuk WHERE tanggalsurat_suratmasuk BETWEEN '$tglawal' AND '$tglakhir'");
                                    }else {
                                        $sql1 = mysqli_query($db,"SELECT * FROM tb_suratmasuk ");
                                    }                       
                                    while ($data = mysqli_fetch_array($sql1)) {
                                        echo '<tr>
                                            <td>' . $data['nomorurut_suratmasuk'] . '</td>
                                            <td>' . $data['tanggalmasuk_suratmasuk'] . '</td>
                                            <td>' . $data['kode_suratmasuk'] . '</td>
                                            <td>' . $data['tanggalsurat_suratmasuk'] . '</td>
                                            <td>' . $data['pengirim'] . '</td>
                                            <td>' . $data['nomor_suratmasuk'] . '</td>
                                            <td>' . $data['kepada_suratmasuk'] . '</td>
                                            <td>' . $data['perihal_suratmasuk'] . '</td>
                                        </tr>';
                                    }
                                    if (mysqli_num_rows($sql1) == 0) {
                                        echo '<tr><td colspan="8">Tidak ada data yang ditemukan.</td></tr>';
                                    }
                                     ?>
                                </tbody>
                            </table>
                    </div>
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
    <!-- iCheck -->
    <script src="../assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    

    <!-- Custom Theme Scripts -->
    <script src="../assets/build/js/custom.min.js"></script>
    <script type="text/javascript" language="JavaScript">
        function konfirmasi()
        {
        tanya = confirm("Anda Yakin Akan Menghapus Data ?");
        if (tanya == true) return true;
        else return false;
        }
    </script>

  </body>
</html>