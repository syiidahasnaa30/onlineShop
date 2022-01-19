<?php
require_once('connection.php');
    if(isset($_POST['submit']))
    {
        if(empty($_POST['nama']) || empty($_POST['stok']) || empty($_POST['harga']) || empty($_POST['berat']) || empty($_POST['deskripsi']) || empty($_FILES["fileToUpload"]["name"]) )
        {
            echo 'Pastikan data telah terisi semua';
        }
        else
        {
            $nama = $_POST['nama'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];
            $berat= $_POST['berat'];
            $deskripsi= $_POST['deskripsi'];
            $foto=$_FILES["fileToUpload"]["name"];
            $lokasi=$_FILES["fileToUpload"]["tmp_name"];
            move_uploaded_file($lokasi,"fotoProduk/".$foto);
            $query="INSERT INTO produk (nama_produk, harga_produk, stok_produk,berat_produk,foto_produk,deskripsi )
            VALUES ('$nama',
            '$harga',
            '$stok',
            '$berat',
            '$foto',
            '$deskripsi')";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:index1.php?halaman=produk");
            }
            else
            {
                echo 'Please Check Your Query';
            }
        }
    }
    else
    {
        header("location:index1.php?halaman=produk");
    }
?>