<?php
	session_start();
	include "connect.php";
	date_default_timezone_set("Asia/Jakarta");
    $getDate = date("Y-m-d H:i:s");
	$grabRFID;$getRfidNew;
	if(empty($_SESSION["admin"]) )
	{
		header("location: login.php");
	}
	if(	isset($_POST["register-submit"]) && !empty($_POST["rfid"]) && !empty($_POST["bb"]) && !empty($_POST["tensi"]) 
		&& !empty($_POST["goldar"]) && !empty($_POST["ll"]) && !empty($_POST["tb"]) && !empty($_POST["hamilke"]) && !empty($_POST["kandungan"]) && !empty($_POST["idSekarang"]) )
	{
        $grabIdPengukuran = $_POST["idSekarang"];
		$grabRfid = $_POST["rfid"];
		$grabBerat = $_POST["bb"];
		$grabTensi = $_POST["tensi"];
		$grabGoldar = $_POST["goldar"];
		$grabLL = $_POST["ll"];
		$grabTinggi = $_POST["tb"];
		$grabHamilke = $_POST["hamilke"];
		$grabKandungan = $_POST["kandungan"];

		$sqlFile = "UPDATE tblpengukuran SET beratbadan ='$grabBerat', tensi='$grabTensi', goldar='$grabGoldar',
					lingkarlengan='$grabLL', tinggibadan='$grabTinggi', usiakandungan='$grabKandungan', hamilke='$grabHamilke' WHERE id='$grabIdPengukuran'";
		$queryFile = mysqli_query($link, $sqlFile);
		
		$sqlDelete = mysqli_query($link, "DELETE FROM tblgetrfidukur WHERE rfid='$grabRfid'");
		
		header("location: formDataPengukuran.php");
		
	}
	if(!empty($_GET["rfidBumil"]))
	{
		$grabRfidBumil = $_GET["rfidBumil"];
		$getData = mysqli_query($link, "SELECT * FROM tblpengukuran WHERE id = '$grabRfidBumil'");
		if($valData = mysqli_fetch_array($getData) )
		{
		    $rfidPengukuran = $valData["rfid"];
			$getBb = $valData["beratbadan"];
			$getTensi = $valData["tensi"];
			$getGoldar = $valData["goldar"];
			$getLl = $valData["lingkarlengan"];
			$getTb = $valData["tinggibadan"];
			$getHamilke = $valData["hamilke"];
			$getKandungan = $valData["usiakandungan"];
		}
		$getNamaBumil = mysqli_query($link, "SELECT * FROM tbldaftarbumil WHERE rfid='$rfidPengukuran'");
		if($valName = mysqli_fetch_array($getNamaBumil))
		{
			$getNama = $valName["nama"];
		}
	}
	if(empty($_GET["rfidBumil"]))
	{
		header("location: index.php");
	}
	
	
?>
<html>
	<head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->

		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<script type="text/javascript">
	
			function grabDataRfid(){
				xhr = new XMLHttpRequest();
				xhr.open('POST' , 'getDataRfidPengukuran.php',true);
				xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
				xhr.send();
				xhr.onreadystatechange = function()
				{
					readXHR = xhr.responseText;
					objRead = JSON.parse(readXHR);
					
					document.getElementById('rfid').value =objRead.rfid;
					document.getElementById('nama').value =objRead.nama;
					
					
				}
			}
			
			setInterval("grabDataRfid()",1000);
		</script>
		<style>
			@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,100,700,500);

			body {
			  padding-top: 7px;
			  background:#F7F7F7;
			  color:#666666;
			  font-family: 'Roboto', sans-serif;
			  font-weight:100;
			}

			body{
			  width: 100%;
			  background: -webkit-linear-gradient(left, #22d686, #24d3d3, #22d686, #24d3d3);
			  background: linear-gradient(to right, #22d686, #24d3d3, #22d686, #24d3d3);
			  background-size: 600% 100%;
			  -webkit-animation: HeroBG 20s ease infinite;
					  animation: HeroBG 20s ease infinite;
			}

			@-webkit-keyframes HeroBG {
			  0% {
				background-position: 0 0;
			  }
			  50% {
				background-position: 100% 0;
			  }
			  100% {
				background-position: 0 0;
			  }
			}

			@keyframes HeroBG {
			  0% {
				background-position: 0 0;
			  }
			  50% {
				background-position: 100% 0;
			  }
			  100% {
				background-position: 0 0;
			  }
			}


			.panel {
			  border-radius: 5px;
			}
			label {
			  font-weight: 300;
			}
			.panel-login {
			   border: none;
			  -webkit-box-shadow: 0px 0px 49px 14px rgba(188,190,194,0.39);
			  -moz-box-shadow: 0px 0px 49px 14px rgba(188,190,194,0.39);
			  box-shadow: 0px 0px 49px 14px rgba(188,190,194,0.39);
			  }
			.panel-login .checkbox input[type=checkbox]{
			  margin-left: 0px;
			}
			.panel-login .checkbox label {
			  padding-left: 25px;
			  font-weight: 300;
			  display: inline-block;
			  position: relative;
			}
			.panel-login .checkbox {
			 padding-left: 20px;
			}
			.panel-login .checkbox label::before {
			  content: "";
			  display: inline-block;
			  position: absolute;
			  width: 17px;
			  height: 17px;
			  left: 0;
			  margin-left: 0px;
			  border: 1px solid #cccccc;
			  border-radius: 3px;
			  background-color: #fff;
			  -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
			  -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
			  transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
			}
			.panel-login .checkbox label::after {
			  display: inline-block;
			  position: absolute;
			  width: 16px;
			  height: 16px;
			  left: 0;
			  top: 0;
			  margin-left: 0px;
			  padding-left: 3px;
			  padding-top: 1px;
			  font-size: 11px;
			  color: #555555;
			}
			.panel-login .checkbox input[type="checkbox"] {
			  opacity: 0;
			}
			.panel-login .checkbox input[type="checkbox"]:focus + label::before {
			  outline: thin dotted;
			  outline: 5px auto -webkit-focus-ring-color;
			  outline-offset: -2px;
			}
			.panel-login .checkbox input[type="checkbox"]:checked + label::after {
			  font-family: 'FontAwesome';
			  content: "\f00c";
			}
			.panel-login>.panel-heading .tabs{
			  padding: 0;
			}
			.panel-login h2{
			  font-size: 20px;
			  font-weight: 300;
			  margin: 30px;
			}
			.panel-login>.panel-heading {
			  color: #848c9d;
			  background-color: #e8e9ec;
			  border-color: #fff;
			  text-align:center;
			  border-bottom-left-radius: 5px;
			  border-bottom-right-radius: 5px;
			  border-top-left-radius: 0px;
			  border-top-right-radius: 0px;
			  border-bottom: 0px;
			  padding: 0px 15px;
			}
			.panel-login .form-group {
			  padding: 0 30px;
			}
			.panel-login>.panel-heading .login {
			  padding: 20px 30px;
			  border-bottom-leftt-radius: 5px;
			}
			.panel-login>.panel-heading .register {
			  padding: 20px 30px;
			  background: #2d3b55;
			  border-bottom-right-radius: 5px;
			}
			.panel-login>.panel-heading a{
			  text-decoration: none;
			  color: #666;
			  font-weight: 300;
			  font-size: 16px;
			  -webkit-transition: all 0.1s linear;
			  -moz-transition: all 0.1s linear;
			  transition: all 0.1s linear;
			}
			.panel-login>.panel-heading a#register-form-link {
			  color: #fff;
			  width: 100%;
			  text-align: right;
			}
			.panel-login>.panel-heading a#login-form-link {
			  width: 100%;
			  text-align: left;
			}

			.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
			  height: 45px;
			  border: 0;
			  font-size: 16px;
			  -webkit-transition: all 0.1s linear;
			  -moz-transition: all 0.1s linear;
			  transition: all 0.1s linear;
			  -webkit-box-shadow: none;
			  box-shadow: none;
			  border-bottom: 1px solid #e7e7e7;
			  border-radius: 0px;
			  padding: 6px 0px;
			}
			.panel-login input:hover,
			.panel-login input:focus {
			  outline:none;
			  -webkit-box-shadow: none;
			  -moz-box-shadow: none;
			  box-shadow: none;
			  border-color: #ccc;
			}
			.btn-login {
			  background-color: #E8E9EC;
			  outline: none;
			  color: #2D3B55;
			  font-size: 14px;
			  height: auto;
			  font-weight: normal;
			  padding: 14px 0;
			  text-transform: uppercase;
			  border: none;
			  border-radius: 0px;
			  box-shadow: none;
			}
			.btn-login:hover,
			.btn-login:focus {
			  color: #fff;
			  background-color: #2D3B55;
			}
			.forgot-password {
			  text-decoration: underline;
			  color: #888;
			}
			.forgot-password:hover,
			.forgot-password:focus {
			  text-decoration: underline;
			  color: #666;
			}

			.btn-register {
			  background-color: #E8E9EC;
			  outline: none;
			  color: #2D3B55;
			  font-size: 14px;
			  height: auto;
			  font-weight: normal;
			  padding: 14px 0;
			  text-transform: uppercase;
			  border: none;
			  border-radius: 0px;
			  box-shadow: none;
			}
			.btn-register:hover,
			.btn-register:focus {
			  color: #fff;
			  background-color: #2D3B55;
			}

		</style>
	</head>
	<body>
		<div class="container">
		   <div class="row">
			<div class="col-md-6 col-md-offset-3">
			  <div class="panel panel-login">
				<div class="panel-body">
				  <div class="row">
					<div class="col-lg-12">

					  <form id="register-form" method="post" role="form" style="display: block;">
						<h2>FORM PENGUKURAN</h2>
						  <div class="form-group">
							<input type="text" name="idSekarang" id="idSekarang" tabindex="10" class="form-control" placeholder="" value="<?php echo $grabRfidBumil; ?>" >
						  </div>
						  <div class="form-group">
							<input type="text" name="rfid" id="rfid" tabindex="1" class="form-control" placeholder="RFID" value="<?php echo $rfidPengukuran; ?>">
						  </div>
						  <div class="form-group">
							<input type="text" name="nama" id="nama" tabindex="1" class="form-control" placeholder="Nama" value="<?php echo $getNama; ?>">
						  </div>
						  <div class="form-group">
							<input type="text" name="kandungan" id="kandungan" tabindex="2" class="form-control" placeholder="Usia Kandungan" value="<?php echo $getKandungan; ?>">
						  </div>
						  <div class="form-group">
							<input type="text" name="hamilke" id="hamilke" tabindex="1" class="form-control" placeholder="Hamil Ke" value="<?php echo $getHamilke; ?>">
						  </div>
						  <div class="form-group">
							<input type="text" name="bb" id="bb" tabindex="2" class="form-control" placeholder="Berat Badan" value="<?php echo $getBb; ?>">
						  </div>
						  <div class="form-group">
							<input type="text" name="tensi" id="tensi" tabindex="3" class="form-control" placeholder="Tensi" value="<?php echo $getTensi; ?>">
						  </div>
						  <div class="form-group">
							<input type="text" name="goldar" id="goldar" tabindex="4" class="form-control" placeholder="Golongan Darah" value="<?php echo $getGoldar; ?>">
						  </div>
						  <div class="form-group">
							<input type="text" name="ll" id="ll" tabindex="6" class="form-control" placeholder="Lingkar Lengan" value="<?php echo $getLl; ?>">
						  </div> 
						  <div class="form-group">
							<input type="text" name="tb" id="tb" tabindex="7" class="form-control" placeholder="Tinggi Badan" value="<?php echo $getTb; ?>">
						  </div>
						  <div class="form-group">
							<div class="row">
							  <div class="col-xs-6 tabs ">
								<input type="submit" name="register-submit" id="register-submit" tabindex="8" class="form-control btn btn-register" value="Edit Data">
								
							  </div>
							  
							</div>
						  </div>
					  </form>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>

	</body>
</html>