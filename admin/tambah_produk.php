<?php
    if(!isset($_SESSION['status'])){
        echo "<script>alert('Anda harus login terlebih dahulu');</script>";
        echo "<script>location='login.php';</script>";
        header('location:login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<body>
<h2>Tambah Produk</h2>
<div class="container container-sm">
<form action="insert_produk.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama Produk:</label>
        <input type="text" class="form-control" placeholder="Masukkan nama produk" name="nama" id="nama">
    </div>
    <div class="form-group ">
        <label for="stok">Stok Prosuk:</label>
        <input type="number" class="form-control" placeholder="Masukkan jumlah stok" name="stok"id="stok">
    </div>
    <div class="form-group">
        <label for="harga">Harga Produk:</label>
        <input type="number" class="form-control" placeholder="Rp..." name="harga"id="harga">
    </div>
    <div class="form-group">
        <label for="berat">Berat Produk:</label>
        <input type="number" class="form-control" placeholder="...gram" name="berat"id="berat">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi Produk:</label>
        <textarea class="form-control" placeholder="isikan deskripsi singkat" name="deskripsi"id="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="fileToUpload">foto Produk</label>
        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
        
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary"value="Save" name="submit">
    </div>
</form>
</div>
</body>
</html>