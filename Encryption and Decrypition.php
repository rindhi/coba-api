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
        $data .= "$id|$namadepan|$namaskhir|$email##";
    }

//Encrypted
//Define cipher 
$cipher = "aes-256-cbc"; 

//Generate a 256-bit encryption key 
$encryption_key = openssl_random_pseudo_bytes(32); 

// Generate an initialization vector 
$iv_size = openssl_cipher_iv_length($cipher); 
$iv = openssl_random_pseudo_bytes($iv_size); 

//Data to encrypt 
$encrypted_data = openssl_encrypt($data, $cipher, $encryption_key, 0, $iv); 

 
$datafix = rtrim($data, "##");
echo "Encrypted Text: " . $encrypted_data;


//Decrypted
//Define cipher 
$cipher = "aes-256-cbc"; 

//Decrypt data 
$decrypted_data = openssl_decrypt($encrypted_data, $cipher, $encryption_key, 0, $iv); 

echo "Decrypted Text: " . $decrypted_data; 
?>