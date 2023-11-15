<?php
    include "config.php";
    $sql = "SELECT* FROM employees"; 
    $x = mysqli_query($koneksi, $sql);
    $data = "";
    while($r = mysqli_fetch_array($x)){
        $id = $r["employeeNumber"];
        $namadepan = $r["firstName"];
        $namaakhir = $r["lastName"];
        $email = $r["email"];
        //.= (php) += (js)untuk menambah sedangkan = menghasilkan hasil akhir 
        $data .= "$id, $namadepan, $namaskhir, $email//";
    }

    //Encrypted
    $chipher= openssl_encrypt("$data","AES-256-CBC","12345678",0,"abcdefgh");
    echo $chipher;
    $open = openssl_decrypt("$chipher","AES-256-CBC","12345678",0,"abcdefgh");
    echo $open
?>