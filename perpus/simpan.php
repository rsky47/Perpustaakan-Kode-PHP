<?php
error_reporting(E_ALL);
    include "koneksi.php";

    $kd=$_POST['kodebuku'];
    $buku=$_POST['namabuku'];
    $perbit=$_POST['penerbit'];
    $tarbit=$_POST['tahunterbit'];

    $b=mysqli_query($conn,"INSERT INTO buku VALUES('$kd','$buku','$perbit','$tarbit')")or die(mysqli_error($conn));

    if($b)
    {
        echo "<script>alert('Data Buku Berhasil ditambahkan..!!')</script>";
        echo "<script>window.location.href='perpustkaan.php';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Buku ";
        
    }

?>