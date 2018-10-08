<?php
	include "connect.php";
	if(!empty($_GET["rfid"]) )
	{
		$grabRfid = $_GET["rfid"];
		$sqlFile = "INSERT INTO tblgetrfidukur (rfid) 
					VALUES ('$grabRfid')";
		
		$queryFile = mysqli_query($link, $sqlFile);
		
		
	}
?>