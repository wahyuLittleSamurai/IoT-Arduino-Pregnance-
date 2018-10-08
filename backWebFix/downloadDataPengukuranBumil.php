<?php
	session_start();
	
    header("Content-type: application/vnd-ms-excel");
 
	// Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=Daftar Bumil.xls");
?>
<html>

	<table class="table" border="1">
		<thead>
			<tr class="filters">
				<th>Id</th>
				<th>RFID</th>
				<th>Nama Istri</th>
				<th>NIK Istri</th>
				<th>Nama Suami</th>
				<th>NIK Suami</th>
				<th>Usia</th>
				<th>Alamat</th>
				<th>BB</th>
				<th>Tensi</th>
				<th>GolDar</th>
				<th>Hamil Ke</th>
				<th>Usia Kandungan</th>
				<th>LL</th>
				<th>TB</th>
				<th>Waktu</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include "connect.php";
				$getData = mysqli_query($link, "SELECT * FROM tbldaftarbumil");
				while($valData = mysqli_fetch_array($getData) )
				{
				    $getDataRfidUntukUkur = $valData["rfid"];
			?>
			<tr>
				
			
			
			<?php
			        $getUkur = mysqli_query($link, "SELECT * FROM tblpengukuran WHERE rfid='$getDataRfidUntukUkur'");
			        while($valUkur = mysqli_fetch_array($getUkur))
			        {
			            ?>
        			    <td><?php echo $valData["id"]; ?></td>
        				<td><?php echo $valData["rfid"]; ?></td>
        				<td><?php echo $valData["nama"]; ?></td>
        				<td><?php echo $valData["nikIstri"]; ?></td>
        				<td><?php echo $valData["namaSuami"]; ?></td>
        				<td><?php echo $valData["nikSuami"]; ?></td>
        				<td><?php echo $valData["usia"]; ?></td>
        				<td><?php echo $valData["alamat"]; ?></td>
        				<td><?php echo $valUkur["beratbadan"]; ?></td>
        				<td><?php echo $valUkur["tensi"]; ?></td>
        				<td><?php echo $valUkur["goldar"]; ?></td>
        				<td><?php echo $valUkur["hamilke"]; ?></td>
        				<td><?php echo $valUkur["usiakandungan"]; ?></td>
        				<td><?php echo $valUkur["lingkarlengan"]; ?></td>
        				<td><?php echo $valUkur["tinggibadan"]; ?></td>
        				<td><?php echo $valUkur["waktu"]; ?></td>
        					</tr>
			        <?php
			        }
				}
			?>
		
		</tbody>
	</table>
</html>