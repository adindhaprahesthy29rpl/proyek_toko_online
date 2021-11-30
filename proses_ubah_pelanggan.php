<?php

if($_POST){

    $id_pelanggan=$_POST['id_pelanggan'];

    $nama=$_POST['nama'];

    $alamat=$_POST['alamat'];

    $telp=$_POST['telp'];

    $username=$_POST['username'];

    $password=$_POST['password'];

    if(empty($nama)){

        echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";


    } elseif(empty($alamat)){

        echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";

    } elseif(empty($telp)){

        echo "<script>alert('no telp tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";

    } elseif(empty($username)){

        echo "<script>alert('username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";

    } elseif(empty($password)){

        echo "<script>alert('password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";


    }else {

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
        
        } else {
        if (move_uploaded_file($_FILES["foto_pelanggan"]["tmp_name"], $target_file)) {
            
            $update=mysqli_query($conn,"update pelanggan set nama='".$nama."', alamat='".$alamat."',telp='".$telp."',foto_pelanggan='".basename($_FILES["foto_pelanggan"]["name"])."',username='".$username."',password='".md5($password)."' where id_pelanggan = '".$id_pelanggan."' ") or die(mysqli_error($conn));

            if($update){

                echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";

            } else {

                echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";

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