<?php
    session_start();
    $idProduk=$_GET['id'];
    unset($_SESSION['keranjang'][$idProduk]);
    echo "<script>alert('produk dihapus dari keranjang');</script>";
	echo "<script>location='index.php?halaman=keranjang';</script>";

?>