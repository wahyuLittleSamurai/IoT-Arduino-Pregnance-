<?php
	session_start();
	include "connect.php";
	if(!empty($_GET["valRFID"]))
	{
	    $getID = $_GET["valRFID"];
	    $commandDelete = mysqli_query($link, "DELETE FROM tblgetrfidukur WHERE id='$getID'");
	    
	}
	
?>
<html>
	<head>
	
		<script src = "js/jquery-3.1.1.js"></script>
		<script src = "js/jquery-ui.js"></script>
		<script src="js/push.min.js"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/carousel.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<link rel="stylesheet" href="css/glyphicons.css">
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/justified-nav.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="js/ie-emulation-modes-warning.js"></script>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div style="padding-top: 20px;"class="row">
				<div class="col-md-12">
				<h4>Data RFID Pengukuran Baru</h4>
				<div class="table-responsive">

						
					  <table id="mytable" class="table table-bordred table-striped">
						   
						   <thead>
							<th>id</th>
							<th>Rfid</th>
							<th>Berat</th>
							<th>Time</th>
							<th>Delete</th>
						   </thead>
			<tbody>
				<?php
				    
					$getData = mysqli_query($link, "SELECT * FROM tblgetrfidukur");
				
					while($valData = mysqli_fetch_array($getData) )
					{
				?>
				<tr>
					<td><?php echo $valData["id"]; ?></td>
					<td><?php echo $valData["rfid"]; ?></td>
					<td><?php echo $valData["berat"]; ?></td>
					<td><?php echo $valData["time"]; ?></td>
					<td><a href="?valRFID=<?php echo $valData["id"]; ?>"class="btn btn-danger"><em class="fa fa-trash"></em></a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
				
		</table>

		<div class="clearfix"></div>
						
					</div>
					
				</div>
			</div>
		</div>


		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>