<?php
    include "config.php";
    $sql = "SELECT * FROM offices";
    $x = mysqli_query($koneksi,$sql);
    $data = array();
    while($r = mysqli_fetch_object($x)){
        $data[] = $r;
    }
    echo json_encode($data);
?>