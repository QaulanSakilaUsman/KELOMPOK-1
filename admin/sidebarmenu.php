<?php 
	 include '../koneksi/koneksi.php';
			$sql  		= "SELECT * FROM tb_admin where id_admin='".$_SESSION['id']."'";                        
			$query  	= mysqli_query($db, $sql);
			$data 		= mysqli_fetch_array($query);
?>
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" >
              <a href="index.php" style="color: white; font-size: 40px; margin-top: 2px; margin-left:40px;"><i class="fa fa-envelope" ></i> <span>SIAS</span></a>
            </div>

            <div class="clearfix"></div>

            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li>
                  <a href="index.php"><i class="fa fa-home"></i> Beranda </a>
                  </li>
                  <li><a><i class="fa fa-gear"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="databagian.php"><i class="fa  fa-users"></i>Data Bagian</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-envelope-open-text"></i> Data Surat <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="datasuratmasuk.php"><i class="fa  fa-inbox"></i>Surat Masuk</a></li>
                      <li><a href="datasuratkeluar.php"><i class="fa fa-send"></i>Surat Keluar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa-solid fa-print"></i>&nbsp; &nbsp; Pelaporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="lap_sm.php"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;&nbsp; Surat Masuk</a></li>
                      <li><a href="lap_sk.php"><i class="fa-solid fa-file-arrow-up"></i>&nbsp;&nbsp; Surat Keluar</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
