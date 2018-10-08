<?php
	include "connect.php";
	
	$queryData = mysqli_query($link, "SELECT * FROM tblgetrfidukur");
	while($showData = mysqli_fetch_array($queryData))
	{
		$getNamaBumil = $showData["rfid"];
		$getBeratUkur = $showData["berat"];
		$queryNamaBumil = mysqli_query($link, "SELECT * FROM tbldaftarbumil WHERE rfid = '$getNamaBumil'");
		while($showDataBumil = mysqli_fetch_array($queryNamaBumil) )
		{
			$namaBumil = $showDataBumil["nama"];
			echo "{ \"rfid\":\"".$getNamaBumil."\", \"nama\":\"".$namaBumil."\", \"berat\":\"".$getBeratUkur."\"
					}";
		}
	}
?>