<!doctype html>
<?php
	session_start();
	include "ceksessionn.php";
?>
<html lang="en">
  <head>
  	<title>Arsip Surat Kemenag</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.2/css/all.css"/>
	
	<link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="../../img/icon.ico">
	</head>
	<body>
	<section class="ftco-section">
		<div class="row-icon text-center">
			<div class="col icon">
				<i class="fa-solid fa-user"></i></i>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-2">
					<h2 class="heading-section">SISTEM INFORMASI ARSIP SURAT MASUK DAN SURAT KELUAR</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<form action="proses_login.php" id="login" name="login" class="login-form" method="post">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa-solid fa-user-lock"></span></div>
		      			<input type="text" id="username" name="username_admin_bagian" class="form-control rounded-left" placeholder="Username" name="username" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" id="password" name="password_bagian" class="form-control rounded-left" placeholder="Password" name="password" required>
	            </div>
	            <div>
					<div class="row">
						<div class="col">
						<a href="../../index.php"><button type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></a>
						</div>
						<div class="col">
						<button type="submit" class="btn btn-primary"> Masuk</button>
						</div>
					</div>
               
               
              </div>
	            
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

