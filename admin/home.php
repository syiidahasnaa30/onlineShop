<?php
    if(!isset($_SESSION['status'])){
        echo "<script>alert('Anda harus login terlebih dahulu');</script>";
        echo "<script>location='login.php';</script>";
        header('location:login.php');
        exit();
    }
?>
<h2>Selamat Datang Administrator</h2>
<pre><?php print_r($_SESSION['admin']); ?> </pre>