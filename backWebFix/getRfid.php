<?php
	include "connect.php";
	date_default_timezone_set("Asia/Jakarta");
	$getTime = date("h:i:s Y/m/d");
	if(!empty($_GET["rfid"]) )
	{
	    if(!empty($_GET["berat"]))
	    {
	        $grabRfid = $_GET["rfid"];
	        $grabBerat = $_GET["berat"];
    		$sqlFile = "INSERT INTO tblgetrfidukur (rfid,berat,time) 
    					VALUES ('$grabRfid','$grabBerat','$getTime')";
    		
    		$queryFile = mysqli_query($link, $sqlFile);
	    }
	    else
	    {
	        $grabRfid = $_GET["rfid"];
	        $commandCek = mysqli_query($link, "SELECT * FROM tblgetrfid WHERE rfid = '$grabRfid'");
	        $foundIt = mysqli_num_rows($commandCek);
	        $commandCekDaftar = mysqli_query($link, "SELECT * FROM tbldaftarbumil WHERE rfid = '$grabRfid'");
	        $foundItDaftar = mysqli_num_rows($commandCekDaftar);
	        
	        if($foundIt == 0 && $foundItDaftar == 0)
	        {
	            $sqlFile = "INSERT INTO tblgetrfid (rfid,time) 
    					    VALUES ('$grabRfid','$getTime')";
    		
    		    $queryFile = mysqli_query($link, $sqlFile);    
	        }
    		
	    }
	
		
		
	}
?>