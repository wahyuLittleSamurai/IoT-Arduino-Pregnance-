<?php
// Load file koneksi.php
include "connect.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
  $nama_file_baru = 'data.xlsx';
  
  // Load librari PHPExcel nya
  require_once 'PHPExcel/PHPExcel.php';
  
  $excelreader = new PHPExcel_Reader_Excel2007();
  $loadexcel = $excelreader->load('files/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
  
  $numrow = 1;
  foreach($sheet as $row){
    // Ambil data pada excel sesuai Kolom
    $Rfid = $row['B']; // Ambil data nama
    $BB = $row['I'];
    $Tensi = $row['J'];
    $GolDar = $row['K'];
    $HamilKe = $row['L'];
    $UsiaKe = $row['M'];
    $LL = $row['N'];
    $TB = $row['O'];
    $Waktu = $row['P'];
            
    
    // Cek jika semua data tidak diisi
    //if(empty($nis) && empty($nama) && empty($jenis_kelamin) && empty($telp) && empty($alamat))
      //continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
    
    // Cek $numrow apakah lebih dari 1
    // Artinya karena baris pertama adalah nama-nama kolom
    // Jadi dilewat saja, tidak usah diimport
    if($numrow > 1){
      // Proses simpan ke Database
      $sqlFile = "INSERT INTO tblpengukuran (rfid,hamilke,usiakandungan,beratbadan,tensi,goldar,lingkarlengan,tinggibadan,waktu) VALUES ('$Rfid','$HamilKe','$UsiaKe','$BB','$Tensi','$GolDar','$LL','$TB','$Waktu')";
      $queryFile = mysqli_query($link, $sqlFile);
    }
    
    $numrow++; // Tambah 1 setiap kali looping
  }
}

header('location: index.php'); // Redirect ke halaman awal
?>