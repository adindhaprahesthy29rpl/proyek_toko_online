<?php

if($_POST){
    
    if(empty($_POST['nama_produk'])){
        echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } elseif(empty($_POST['deskripsi'])){
        echo "<script>alert('deskripsi tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } elseif(empty($_POST['harga'])){
        echo "<script>alert('harga tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } else {
        include "koneksii.php";

        // upload image
        $target_dir = "foto_produk/";
        $target_file = $target_dir . basename($_FILES["foto_produk"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
            echo "The file " .htmlspecialchars( basename( $_FILES["foto_produk"]["name"])). " has been uploaded.";
            
            $insert=mysqli_query($conn,"insert into produk (nama_produk, deskripsi, harga, foto_produk) value ('".$_POST['nama_produk']."','".$_POST['deskripsi']."','".$_POST['harga']."','".basename($_FILES["foto_produk"]["name"])."')");
            if($insert == !false){
            echo "<script>alert('Sukses menambahkan produk');location.href='tampil_produk.php';</script>";
            } else {
            echo "<script>alert('Gagal menambahkan produk');location.href='tampil_produk.php';</script>";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }
    }

} else {
    echo "404 not found";
}

?>