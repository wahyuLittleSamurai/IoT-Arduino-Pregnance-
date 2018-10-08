<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Data Excel dengan PHP</title>

    <!-- Load File bootstrap.min.css yang ada difolder css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Style untuk Loading -->
    <style>
        #loading{
      background: whitesmoke;
      position: absolute;
      top: 140px;
      left: 82px;
      padding: 5px 10px;
      border: 1px solid #ccc;
    }
    </style>
    
    <!-- Load File jquery.min.js yang ada difolder js -->
    <script src="js/jquery.min.js"></script>
    
    <script>
    $(document).ready(function(){
      // Sembunyikan alert validasi kosong
      $("#kosong").hide();
    });
    </script>
  </head>
  <body>
    
    <!-- Content -->
    <div style="padding: 0 15px;">
      <!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
      <a href="index.php" class="btn btn-danger pull-right">
        <span class="glyphicon glyphicon-remove"></span> Cancel
      </a>
      
      <h3>Form Import Data</h3>
      <hr>
      
      <!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
      <form method="post" action="" enctype="multipart/form-data">
        
        <!-- 
        -- Buat sebuah input type file
        -- class pull-left berfungsi agar file input berada di sebelah kiri
        -->
        <input type="file" name="file" class="pull-left">
        
        <button type="submit" name="preview" class="btn btn-success btn-sm">
          <span class="glyphicon glyphicon-eye-open"></span> Preview
        </button>
      </form>
      
      <hr>
      
      <!-- Buat Preview Data -->
      <?php
      // Jika user telah mengklik tombol Preview
      if(isset($_POST['preview'])){
        $nama_file_baru = 'data.xlsx';
        
        // Cek apakah terdapat file data.xlsx pada folder tmp
        if(is_file('files/'.$nama_file_baru)) // Jika file tersebut ada
          unlink('files/'.$nama_file_baru); // Hapus file tersebut
        
        $tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
        $tmp_file = $_FILES['file']['tmp_name'];
        
        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
        if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
          // Upload file yang dipilih ke folder tmp
          move_uploaded_file($tmp_file, 'files/'.$nama_file_baru);
          
          // Load librari PHPExcel nya
          require_once 'PHPExcel/PHPExcel.php';
          
          $excelreader = new PHPExcel_Reader_Excel2007();
          $loadexcel = $excelreader->load('files/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
          $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
          
          // Buat sebuah tag form untuk proses import data ke database
          echo "<form method='post' action='prosesImportToDatabase.php'>";
          
          // Buat sebuah div untuk alert validasi kosong
          echo "<div class='alert alert-danger' id='kosong'>
          Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
          </div>";
          
          echo "<table class='table table-bordered'>
          <tr>
            <th colspan='16' class='text-center'>Preview Data</th>
          </tr>
          <tr>
            <th>Id</th>
            <th>Rfid</th>
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
            <th>Usia Ke</th>
            <th>LL</th>
            <th>TB</th>
            <th>Waktu</th>
          </tr>";
          
          $numrow = 1;
          $kosong = 0;
          foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
            // Ambil data pada excel sesuai Kolom
            $Id = $row['A']; // Ambil data NIS
            $Rfid = $row['B']; // Ambil data nama
            $NamaIstri = $row['C']; // Ambil data jenis kelamin
            $NIKIstri = $row['D']; // Ambil data telepon
            $NamaSuami = $row['E']; // Ambil data alamat
            $NIKSuami = $row['F'];
            $Usia = $row['G'];
            $Alamat = $row['H'];
            $BB = $row['I'];
            $Tensi = $row['J'];
            $GolDar = $row['K'];
            $HamilKe = $row['L'];
            $UsiaKe = $row['M'];
            $LL = $row['N'];
            $TB = $row['O'];
            $Waktu = $row['P'];
            
            
            // Cek jika semua data tidak diisi
            //if(empty($Id) && empty($nama) && empty($jenis_kelamin) && empty($telp) && empty($alamat))
              //continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
            
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if($numrow > 1){
              // Validasi apakah semua data telah diisi
              //$nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
              //$nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
              //$jk_td = ( ! empty($jenis_kelamin))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
              //$telp_td = ( ! empty($telp))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
              //$alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              
              // Jika salah satu data ada yang kosong
              //if(empty($nis) or empty($nama) or empty($jenis_kelamin) or empty($telp) or empty($alamat)){
                //$kosong++; // Tambah 1 variabel $kosong
              //}
              
              echo "<tr>";
              echo "<td>".$Id."</td>";
              echo "<td>".$Rfid."</td>";
              echo "<td>".$NamaIstri."</td>";
              echo "<td>".$NIKIstri."</td>";
              echo "<td>".$NamaSuami."</td>";
              echo "<td>".$NIKSuami."</td>";
              echo "<td>".$Usia."</td>";
              echo "<td>".$Alamat."</td>";
              echo "<td>".$BB."</td>";
              echo "<td>".$Tensi."</td>";
              echo "<td>".$GolDar."</td>";
              echo "<td>".$HamilKe."</td>";
              echo "<td>".$UsiaKe."</td>";
              echo "<td>".$LL."</td>";
              echo "<td>".$TB."</td>";
              echo "<td>".$Waktu."</td>";
              echo "</tr>";
            }
            
            $numrow++; // Tambah 1 setiap kali looping
          }
          
          echo "</table>";
          
          // Cek apakah variabel kosong lebih dari 1
          // Jika lebih dari 1, berarti ada data yang masih kosong
          if($kosong > 1){
          ?>	
            <script>
            $(document).ready(function(){
              // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
              $("#jumlah_kosong").html('<?php echo $kosong; ?>');
              
              $("#kosong").show(); // Munculkan alert validasi kosong
            });
            </script>
          <?php
          }else{ // Jika semua data sudah diisi
            echo "<hr>";
            
            // Buat sebuah tombol untuk mengimport data ke database
            echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
          }
          
          echo "</form>";
        }else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
          // Munculkan pesan validasi
          echo "<div class='alert alert-danger'>
          Hanya File Excel 2007 (.xlsx) yang diperbolehkan
          </div>";
        }
      }
      ?>
    </div>
  </body>
</html>