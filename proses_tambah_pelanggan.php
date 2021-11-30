<?php

if($_POST){
    
    if(empty($_POST['nama'])){
        echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($_POST['alamat'])){
        echo "<script>alert('alamat pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($_POST['telp'])){
        echo "<script>alert('nomor telepon tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($_POST['username'])){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($_POST['password'])){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else {
        include "koneksii.php";

        // upload image
        $target_dir = "foto_pelanggan/";
        $target_file = $target_dir . basename($_FILES["foto_pelanggan"]["name"]);
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
            if (move_uploaded_file($_FILES["foto_pelanggan"]["tmp_name"], $target_file)) {
                echo "The file " .htmlspecialchars( basename( $_FILES["foto_pelanggan"]["name"])). " has been uploaded.";
                
                $insert=mysqli_query($conn,"insert into pelanggan (nama, alamat, telp, foto_pelanggan, username, password) value 
                ('".$_POST['nama']."','".$_POST['alamat']."','".$_POST['telp']."','".basename($_FILES["foto_pelanggan"]["name"])."',
                '".$_POST['username']."','".$_POST['password']."')") or die(mysqli_error($conn));

                if($insert == !false){
                echo "<script>alert('Sukses menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
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