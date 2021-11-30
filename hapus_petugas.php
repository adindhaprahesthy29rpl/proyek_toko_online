<?php 
    if($_GET['id_petugas']){
        include "koneksii.php";
        $qry_hapus_petugas=mysqli_query($conn,"delete from petugas where id_petugas='".$_GET['id_petugas']."'");
        if($qry_hapus_petugas){
            echo "<script>alert('Sukses hapus petugas');location.href='tampil_petugas.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus petugas');location.href='tampil_petugas.php';</script>";
        }
    }
?>