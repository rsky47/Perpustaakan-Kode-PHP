<?php
include "koneksi.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  //Script php
  switch ($_GET['act']) {
    default: //kondisi default. kondisi default ini untuk menampilkan tabel yang berisikan semua data
      //kita akan membuat script HTML disini untuk menampilkan tabel, sehingga harus kita tutup script php sebelumnya.


  ?>
      <table id="example" class="table table-striped" style="width:100%">
        <thead>
          <tr align="center">
            <th>No.</th>
            <th>Kode Buku</th>
            <th>Nama Buku</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
          </tr>
        </thead>
        <tbody>


          <?php
          
          $no = 1;

          $res = mysqli_query($conn, "SELECT * FROM buku ORDER BY kodebuku ASC") or die(mysqli_error($conn));
          while ($row = mysqli_fetch_array($res)) { //$res berasal dari baris 35


          ?>
            <tr class="odd gradeX">
              <td align="center"><?php echo $no; ?></td>
              <td align="center"><?php echo $row['kodebuku']; //$row berasal dari baris 36 ?></td>
              <td align="center"><?php echo $row['namabuku']; ?></td>
              <td align="center"><?php echo $row['penerbit']; ?></td>
              <td align="center"><?php echo $row['tahunterbit']; ?></td>
              <td align="center"><a href="?act=edit&id=<?php echo $row['kodebuku']; ?>"> <i title="rubah" class="fa fa-edit">EDIT</i></a> |
                <a href="?act=del&id=<?php echo $row['kodebuku']; ?>"> <i title="hapus" class="fa fa-trash">HAPUS</i></a> | <a href="?act=add&id=<?php echo $row['kodebuku']; ?>"> <i title="menambahkan" class="fa fa-edit">ADD</i></a> 
              </td>


            </tr>
          <?php $no++;
          } ?> <!-- Akhir While-->
        </tbody>

        <?php ?> <!-- Akhir ELSE IF-->

      </table>


    <?php
    break;
    case "add": //menampilkan form untuk menambah data baru
      //kita akan memindahkan script form simpan sebelumnya setelah case "add". script tersebut merupakan script HTML, sehingga harus kita tutup script php sebelumnya.
    ?>
      <!-- FORM TAMBAH DATA BARU -->
      <form name="form1" method="post" action="simpan.php">
        <p>
        <h1>Form Perpustakaan</h1>
        </p>
        <p>Kode :
          <input type="text" name="kodebuku" id="textfield">
        </p>
        <p>Nama Buku :
          <input type="text" name="namabuku" id="textfield">
        </p>
        <p>penerbit :
          <input type="text" name="penerbit" id="textfield">
        </p>
        <p>Tahun Terbit :
          <input type="text" name="tahunterbit" id="textfield">
        </p>
        <p>
          <input type="submit" name="btnsimpan" id="submit" value="SIMPAN">
        </p>
      </form>


    <?php
    break;
    case "del": //menampilkan form untuk menambah data baru
      //kita akan memindahkan script form simpan sebelumnya setelah case "add". script tersebut merupakan script HTML, sehingga harus kita tutup script php sebelumnya.
      $id=$_GET['id']; //id didalam kutip merupakan variabel yang kita kirim dari link di baris 44. Namun $id ssebelum "=" boleh berbeda.
      $q=mysqli_query($conn,"SELECT * FROM buku WHERE kodebuku='$id'") or die(mysqli_error($conn));
      $row=mysqli_fetch_array($q);
    ?>      
      <!-- FORM TAMBAH DATA BARU -->
      <form name="form1" method="post" action="hapus.php">
        <p>
        <h1>Form Hapus</h1>
        </p>
        <p>Kode :
        <input type="text" name="kodebuku" id="textfield" disabled value="<?php echo $row['kodebuku']; ?>">
        <input type="hidden" name="kodebuku" value="<?php echo $row['kodebuku']; ?>">
        </p>
        <p>
          <input type="submit" name="btnsimpan" id="submit" value="DELETE">
        </p>
      </form>

  <?php
  break;
    case "edit": //menampilkan form yang berisikan data yang telah ada

      $id=$_GET['id']; //id didalam kutip merupakan variabel yang kita kirim dari link di baris 44. Namun $id ssebelum "=" boleh berbeda.

    $q=mysqli_query($conn,"SELECT * FROM buku WHERE kodebuku='$id'") or die(mysqli_error($conn));
    $row=mysqli_fetch_array($q);

      ?>
    <form name="form1" method="post" action="ubah.php">
        <p>
        <h1>Form Update Buku Perpustakaan</h1>
        </p>
        <p>Kode :
          <input type="text" name="kodebuku" id="textfield" disabled value="<?php echo $row['kodebuku']; ?>">
          <input type="hidden" name="kodebuku" value="<?php echo $row['kodebuku']; ?>">
        </p>
        <p>nama buku :
          <input type="text" size="30" name="namabuku" id="textfield" value="<?php echo $row['namabuku']; ?>">
        </p>
        <p>Penerbit :
          <input type="text" size="30" name="penerbit" id="textfield" value="<?php echo $row['penerbit']; ?>">
        </p>
        <p>Tahun Terbit :
          <input type="text" size="30" name="tahunterbit" id="textfield" value="<?php echo $row['tahunterbit']; ?>">
        </p>
        <p>
          <input type="submit" name="btnsimpan" id="submit" value="UPDATE">
        </p>
      </form>



<?php
      break;
  }


  ?>


</body>

</html>