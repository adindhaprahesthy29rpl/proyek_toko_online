<?php 

    if($_POST){

        $username=$_POST['username'];

        $password=$_POST['password'];

        if(empty($username)){

            echo "<script>alert('Username tidak boleh kosong');location.href='login_petugas.php';</script>";

        } elseif(empty($password)){

            echo "<script>alert('Password tidak boleh kosong');location.href='login_petugas.php';</script>";

        } else {

            include "koneksii.php";

            $qry_login_petugas=mysqli_query($conn,"select * from petugas where username = '".$username."' and password = '".md5($password)."'");

            if(mysqli_num_rows($qry_login_petugas)>0){

                $dt_login_petugas=mysqli_fetch_array($qry_login_petugas);

                session_start();

                $_SESSION['id_petugas']=$dt_login_petugas['id_petugas'];

                $_SESSION['nama_petugas']=$dt_login_petugas['nama_petugas'];

                $_SESSION['status_login_petugas']=true;

                header("location: home_petugas.php");

            } else {

                echo "<script>alert('Username dan Password tidak benar');location.href='login_petugas.php';</script>";

            }

        }

    }

?>