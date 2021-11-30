<?php 
    if($_GET['id_produk']){
        include "koneksii.php";
        $qry_hapus_produk=mysqli_query($conn,"delete from produk where id_produk='".$_GET['id_produk']."'");
        if($qry_hapus_produk){
            echo "<script>alert('Sukses hapus produk');location.href='tampil_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus produk');location.href='tampil_produk.php';</script>";
        }
    }
?>