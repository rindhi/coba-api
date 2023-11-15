<?php
     include "config.php";
     $sql = "SELECT * FROM employees"; 
     $x = mysqli_query($koneksi, $sql); 
     $data = "";
     while($r = mysqli_fetch_array($x)){ 
          $id = $r["employeeNumber"];
          $namadepan = $r["firstName"];
          $namaakhir = $r["lastName"];
          $email = $r["email"];
          $data .= "$id|$namadepan|$namaakhir|$email##";
    }    
     $datafix = rtrim($data, "##"); 
     echo base64_encode($datafix);
?>