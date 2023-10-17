<?php
error_reporting(E_ALL);
    include "koneksi.php";

    $kd=$_POST['kodebuku'];
    $spesialis=$_POST['namabuku'];
    $perbit=$_POST['penerbit'];
    $tarbit=$_POST['tahunterbit'];

    $b=mysqli_query($conn,"UPDATE buku SET namabuku='$spesialis', penerbit='$perbit', tahunterbit='$tarbit' where kodebuku='$kd'")or die(mysqli_error($conn));//text warna merah diluar kutip = nama tabel dan field di database kita.
    //text $spesialis dan $kd yang berada di dalam kutip berasal dari baris 5 dan 6.

    if($b)
    {
        echo "<script>alert('Data Buku Berhasil dirubah..!!')</script>";
        echo "<script>window.location.href='perpustkaan.php';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Spesialis ";
        
    }

?>