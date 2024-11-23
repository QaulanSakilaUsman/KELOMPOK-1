<?php
// cetak.php
session_start();
include "login/ceksession.php";
include '../koneksi/koneksi.php';

// Mengambil data tanggal dari POST
$tglawal = isset($_POST['tglawal']) ? $_POST['tglawal'] : '';
$tglakhir = isset($_POST['tglakhir']) ? $_POST['tglakhir'] : '';

// Query untuk mendapatkan data sesuai dengan filter tanggal
$sql = "SELECT * FROM tb_suratmasuk WHERE tanggalsurat_suratmasuk BETWEEN '$tglawal' AND '$tglakhir'";
$result = mysqli_query($db, $sql);

// Mulai cetak laporan
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Surat Masuk</title>
    <link rel="stylesheet" href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <style>
      @page {
         margin-top: 0.5cm;
         margin-left: 1cm;
         margin-right: 1cm;
         margin-bottom: 0.1cm;
      }
      .name-school {
         font-size: 13pt;
         font-weight: bold;
         text-transform: uppercase;
      }

      .alamat {
         font-size: 11pt;
         margin-top: -15px;
         margin-bottom: -10px;
      }

      .alamat2 {
         font-size: 9pt;
      }
      body {
        font-family: sans-serif;
        padding:20px;

      }

      table {
        font-family: verdana, arial, sans-serif;
        font-size: 11px;
        color: #333333;
        border-collapse: collapse;
        width: 100%;
      }

      th {
        padding: 8px;
        border-color: #666666;
        background-color: #dedede;
        text-align: left;
      }

      td {
        padding: 8px;
        border-color: #666666;
        background-color: #ffffff;
        text-align: left;
      }

      hr {
        border: 1;
        height: 2px;
        color: #333;
        background-color: #333;
      }

      .container {
        position: relative;
      }

      
    </style>
</head>
<body onload="window.print()">

  <table width="100%">
    <tr>
      <td width="120">
        <img src="../img/d.png" alt="logo1" width="80">
      </td>
      <td align="left">
        <p class="name-school">Sistem Informasi Arsip Surat Masuk dan Surat Keluar</p>
        <p class="alamat"> Arsip Surat Kantor Kementerian Agama</p>
      </td>
    </tr>
  </table>
  <hr>
  <h3 align="center">L A P O R A N <br> ARSIP SURAT MASUK</h3>
  <p class="alamat2">Laporan tanggal: <b><u><?php echo $tglawal ?></u></b> s/d <b><u><?php echo $tglakhir ?></u></b></p>
  
  <table border="1" width="100%">
    <tr>
      <th>Kode Surat</th>
      <th>Tanggal Surat</th>
      <th>Pengirim</th>
      <th>Nomor Surat</th>
      <th>Kepada</th>
      <th>Perihal</th>
    </tr>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_array($result)) {
            echo '<tr>
                
                <td>' . $data['kode_suratmasuk'] . '</td>
                            <td>' . $data['tanggalsurat_suratmasuk'] . '</td>
                            <td>' . $data['pengirim'] . '</td>
                            <td>' . $data['nomor_suratmasuk'] . '</td>
                            <td>' . $data['kepada_suratmasuk'] . '</td>
                            <td>' . $data['perihal_suratmasuk'] . '</td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="8">Tidak ada data yang ditemukan.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>