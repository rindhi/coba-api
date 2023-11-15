<?php
    include "config.php";
    if(isset($_REQUEST["data"])){
        $fungsi = $_REQUEST["data"]; 
        if($fungsi == "produk"){
            $sql = "SELECT * FROM products";
        }elseif($fungsi == "karyawan"){
            $sql = "SELECT * FROM employees";
        }elseif($fungsi == "penjualan"){
            if(isset($_REQUEST["tahun"]) && isset($_REQUEST["bulan"])){
                $th = $_REQUEST["tahun"];
                $bln = $_REQUEST["bulan"];
                $sql = "SELECT * FROM orders WHERE YEAR(orderDate) = '$th' AND MONTH(orderDate) = '$bln' ORDER BY orderDate DESC";
            }else{
                echo "error data penjualan"; 
                return;
            }
        }elseif($fungsi == "grafik_tahun"){
            if(isset($_REQUEST["tahun"])){
                $th = $_REQUEST["tahun"];
                $sql = "SELECT SUBSTRING(orderDate, 6, 2)AS bulan, SUBSTRING (orderDate, 1, 4) AS tahun, COUNT(*) AS jumlah FROM orders WHERE YEAR(orderDate) = '$th' GROUP BY MONTH(orderDate), YEAR(orderDate) ORDER BY orderDate";
            }else{
                echo "error grafik penjualan";
                return;
            }
        }else{
            echo "error format salah"; 
            return;
        }
        $x = mysqli_query($koneksi, $sql);
        $data = array();
        while($r = mysqli_fetch_object($x)){
            $data[] = $r;
        }
        echo json_encode($data);
    }else{
        echo "error";
    }
?>