
<?php
if(!isset($_SESSION['status'])){
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
else{
        require_once("connection.php");
        $idProduk = $_GET['id'];
        $query = " select * from produk where id_produk ='".$idProduk."'";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $nama=$row['nama_produk'];
            $stok=$row['stok_produk'];
            $harga=$row['harga_produk'];
            $berat=$row['berat_produk'];
            $foto=$row['foto_produk'];
            $deskripsi=$row['deskripsi'];
        }
}
?>
<html>

<body>
    <h2>Ubah Data Produk</h2>
<div class="container container-sm">
<form  method="post" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="nama">Nama Produk:</label>
        <input type="text" class="form-control"  value="<?php echo $nama ?>"name="nama" id="nama">
    </div>
    <div class="form-group">
        <label for="stok">Stok Produk:</label>
        <input type="number" class="form-control" value="<?php echo $stok ?>" name="stok"id="stok">
    </div>
    <div class="form-group">
        <label for="harga">Harga Produk:</label>
        <input type="number" class="form-control" value="<?php echo $harga ?>" name="harga"id="harga">
    </div>
    <div class="form-group">
        <label for="berat">Berat Produk:</label>
        <input type="number" class="form-control" value="<?php echo $berat ?>"name="berat"id="berat">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi Produk:</label>
        <textarea class="form-control" name="deskripsi" rows="10"> <?php echo $deskripsi ?></textarea>
    </div>
    <div class="form-group">
        <img src="fotoProduk/<?php echo $foto ?>" width="200">
    </div>
    <div class="form-group">
        <label for="fileToUpload">Ganti Foto</label>
        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">  
    </div>
    <div class="form-group">
    <br>
    <button class="btn btn-primary" name="ubah">Simpan</button>
    </div>
</body>
</html>
<?php
require_once('connection.php');
    if(isset($_POST['ubah']))
    {       
            $nama = $_POST['nama'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];
            $berat= $_POST['berat'];
            $deskripsi= $_POST['deskripsi'];
            $foto=$_FILES["fileToUpload"]["name"];
            $lokasi=$_FILES["fileToUpload"]["tmp_name"];
            if (!empty($lokasi)) {
                move_uploaded_file($lokasi,"fotoProduk/".$foto);
                $query="UPDATE produk SET nama_produk='".$nama."',stok_produk='".$stok."', harga_produk='".$harga."',berat_produk='".$berat."',
                        deskripsi='".$deskripsi."', foto_produk='".$foto."' WHERE id_produk='".$idProduk."'";
                $result = mysqli_query($conn,$query);
            }else
            {
                $query="UPDATE produk SET nama_produk='".$nama."',stok_produk='".$stok."', harga_produk='".$harga."',berat_produk='".$berat."',
                        deskripsi='".$deskripsi."' WHERE id_produk='".$idProduk."'";
                $result = mysqli_query($conn,$query);
            }
            echo "<script>alert('data telah diubah');</script>";
            echo "<script>location='index1.php?halaman=produk';</script>";
    }
?>