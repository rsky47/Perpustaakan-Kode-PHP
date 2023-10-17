<?php
error_reporting(E_ALL);
    include "koneksi.php";

    $kd=$_POST['kodebuku'];

    $b=mysqli_query($conn,"DELETE FROM buku where kodebuku='$kd'")or die(mysqli_error($conn));

    if($b)
    {
        echo "<script>alert('Data Buku Berhasil dihapuss..!!')</script>";
        echo "<script>window.location.href='perpustkaan.php';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Buku ";
        
    }

?>