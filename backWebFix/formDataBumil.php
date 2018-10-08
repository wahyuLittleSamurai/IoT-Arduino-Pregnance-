<?php
	include "connect.php";
	session_start();
	
	if(empty($_SESSION["admin"]) )
	{
		header("location: login.php");
	}
	
	if(!empty($_GET["idBumil"]) )
	{
		$grabIdBumil = $_GET["idBumil"];
		$sqlDelete = mysqli_query($link, "DELETE FROM tbldaftarbumil WHERE id='$grabIdBumil'");
		$message = "Data Telah Terhapus";
		echo "<script type='text/javascript'>alert('$message');</script>";
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
		<!------ Include the above in your HEAD tag ---------->
		<style>
		@import url(http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

		body {
		  font-family: "Roboto", helvetica, arial, sans-serif;
		  font-size: 14px;
		  font-weight: 100;
		  text-rendering: optimizeLegibility;
		}
		.filterable {
			margin-top: 15px;
		}
		.filterable .panel-heading .pull-right {
			margin-top: -20px;
		}
		.filterable .filters input[disabled] {
			background-color: transparent;
			border: none;
			cursor: auto;
			box-shadow: none;
			padding: 0;
			height: auto;
		}
		.filterable .filters input[disabled]::-webkit-input-placeholder {
			color: #333;
		}
		.filterable .filters input[disabled]::-moz-placeholder {
			color: #333;
		}
		.filterable .filters input[disabled]:-ms-input-placeholder {
			color: #333;
		}

		</style>
		<script>
		/*
		Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
		*/
		$(document).ready(function(){
			$('.filterable .btn-filter').click(function(){
				var $panel = $(this).parents('.filterable'),
				$filters = $panel.find('.filters input'),
				$tbody = $panel.find('.table tbody');
				if ($filters.prop('disabled') == true) {
					$filters.prop('disabled', false);
					$filters.first().focus();
				} else {
					$filters.val('').prop('disabled', true);
					$tbody.find('.no-result').remove();
					$tbody.find('tr').show();
				}
			});

			$('.filterable .filters input').keyup(function(e){
				/* Ignore tab key */
				var code = e.keyCode || e.which;
				if (code == '9') return;
				/* Useful DOM data and selectors */
				var $input = $(this),
				inputContent = $input.val().toLowerCase(),
				$panel = $input.parents('.filterable'),
				column = $panel.find('.filters th').index($input.parents('th')),
				$table = $panel.find('.table'),
				$rows = $table.find('tbody tr');
				/* Dirtiest filter function ever ;) */
				var $filteredRows = $rows.filter(function(){
					var value = $(this).find('td').eq(column).text().toLowerCase();
					return value.indexOf(inputContent) === -1;
				});
				/* Clean previous no-result if exist */
				$table.find('tbody .no-result').remove();
				/* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
				$rows.show();
				$filteredRows.hide();
				/* Prepend no-result row if all rows are filtered */
				if ($filteredRows.length === $rows.length) {
					$table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
				}
			});
		});
		</script>
	</head>
	<body>
			<div class="container">
			<h3>Data BUMIL</h3>
			<div><span ><a  href="index.php">Home</a></span>
			    || <span ><a  href="formDataBumil.php">Data BUMIL</a></span> ||
				<span ><a href="formDataPengukuran.php">Data Pengukuran</a></span> ||
				<span ><a href="formRegister.php">Daftar</a></span> ||
				<span ><a href="formPengukuran.php">Pengukuran</a></span> ||
			    <?php

			        if(!empty($_SESSION["admin"]))

			        {
			            ?>
			            <span ><a  href="index.php?logout=q">Logout</a></span>

			            <?php
			        }

			        else

			        {
			            ?>
			            <span ><a  href="login.php">Login</a></span>
			            <?php
			        }
			    ?>
			</div>
				<a href="downloadDaftarBumil.php"><button class="btn btn-danger">Export Data ke Excel</button></a>
			<hr>
			<div class="row">
				<div class="panel panel-primary filterable">
					<div class="panel-heading">
						<h3 class="panel-title">Data BUMIL</h3>
						<div class="pull-right">
							<button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
						</div>
					</div>
					<table class="table">
						<thead>
							<tr class="filters">
								<th><input type="text" class="form-control" placeholder="Id" disabled></th>
								<th><input type="text" class="form-control" placeholder="RFID" disabled></th>
								<th><input type="text" class="form-control" placeholder="Nama Istri" disabled></th>
								<th><input type="text" class="form-control" placeholder="Nama Suami" disabled></th>
								<th><input type="text" class="form-control" placeholder="Usia" disabled></th>
								<th><input type="text" class="form-control" placeholder="Alamat" disabled></th>
								<th><input type="text" class="form-control" placeholder="Edit" disabled></th>
								<th><input type="text" class="form-control" placeholder="Delete" disabled></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$getData = mysqli_query($link, "SELECT * FROM tbldaftarbumil");
								while($valData = mysqli_fetch_array($getData) )
								{
							?>
							<tr>
								<td><?php echo $valData["id"]; ?></td>
								<td><?php echo $valData["rfid"]; ?></td>
								<td><?php echo $valData["nama"]; ?></td>
								<td><?php echo $valData["namaSuami"]; ?></td>
								<td><?php echo $valData["usia"]; ?></td>
								<td><?php echo $valData["alamat"]; ?></td>
								<td> <a href="formEdit.php?idBumil=<?php echo $valData["id"]; ?>"class="btn btn-danger"><em class="fa fa-pencil"></em></a></td>
								<td> <a href="?idBumil=<?php echo $valData["id"]; ?>"class="btn btn-danger"><em class="fa fa-trash"></em></a></td>
							</tr>
							
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>



