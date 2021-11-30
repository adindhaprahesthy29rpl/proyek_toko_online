<?php 
    session_start();
    include "koneksii.php";
    $cart=@$_SESSION['cart'];
    if(count($cart)>0){
        $tgl=date('Y-m-d');

        mysqli_query($conn,"insert into transaksi(id_pelanggan, id_petugas, tgl_transaksi) value('".$_SESSION['id_pelanggan']."','1','".$tgl."')");
        
        //untuk membuat id dalam detail transaksi
        $id=mysqli_insert_id($conn);
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($conn,"insert into detail_transaksi (id_transaksi ,id_produk, qty, subtotal) value('".$id."','".$val_produk['id_produk']."','".$val_produk['qty']."','".$val_produk['subtotal']."')");
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Anda berhasil membeli produk");location.href="histori_pembelian.php"</script>';
    }
?>