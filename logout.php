<?php
session_start();
unset($_SESSION['id_pelanggan']);
unset($_SESSION['nama_pelanggan']);
$_SESSION['status_login_pelanggan']=false;
session_destroy();
header("location: home_pelanggan.php");
?>