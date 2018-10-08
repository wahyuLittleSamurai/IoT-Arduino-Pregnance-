<?php
	$servername = "localhost";
	$username = "id5395856_root";
	$password = "admin";
	$dbname = "id5395856_dbbumil";
	$link = mysqli_connect($servername,$username,$password) or die ("can't connect");
	mysqli_select_db($link, $dbname);
	if ($link->connect_error) {
			die("Connection failed: " . $link->connect_error);
	} 
	//echo "Connected successfully";
?>