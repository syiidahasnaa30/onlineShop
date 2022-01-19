<?php
session_start();
//mendapatkan id produk dari url
$idProduk=$_GET['id'];
//jika ada produk id..di keranjang
if(isset($_SESSION['keranjang'][$idProduk]))
{
    $_SESSION['keranjang'][$idProduk]+=1;
}
//belum ada produk dengan id .. di keranjang
else{
    $_SESSION['keranjang'][$idProduk]= 1;
}
//produk dialihkan ke keranjang belanja
    echo "<script>alert('Barang telah ditambah ke keranjang');</script>";
    echo "<script>location='index.php?halaman=keranjang';</script>";

?>