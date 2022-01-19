<?php
require_once('connection.php');
$idProduk=$_GET['id'];
$query="SELECT * FROM produk where id_produk='".$idProduk."'";
$result=mysqli_query($conn,$query);
$produk=mysqli_fetch_assoc($result);
?>
<html>

<head>
</head>

<body>
    <section class="header_text sub">
        <h4 class="title">
            <span class="pull"><span class="text"><span class="line">Detail
                        <strong>Produk</strong></span></span></span>
        </h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span4">
                        <a href="admin/fotoProduk/<?php echo $produk['foto_produk']; ?>" class="thumbnail"
                            data-fancybox-group="group1" title="Description 1"><img alt=""
                                src="admin/fotoProduk/<?php echo $produk['foto_produk']; ?>"></a>
                    </div>
                    <div class="span5">
                        <address>
                            <strong>Nama Produk:</strong> <span><?php echo $produk['nama_produk'];?></span><br>
                            <strong>Berat Produk:</strong> <span><?php echo $produk['berat_produk']; ?> gram</span><br>
                            <strong>Stok produk:</strong> <span><?php echo $produk['stok_produk']; ?></span><br>
                            <strong>Deskripsi:</strong><br> <span><?php echo $produk['deskripsi']; ?></span><br>
                        </address>
                        <h4><strong>Harga: Rp. <?php echo number_format($produk['harga_produk']); ?></strong></h4>
                    </div>
                    <div class="span5">
                        <form class="form-inline" method="post">
                            <label>Jumlah:</label>
                            <input type="number" class="span1" name="jumlah" max="<?php echo $produk['stok_produk']; ?>"><br>
                            <button class="btn btn-primary" type="submit" name="kembali">kembali</button>
                            <button class="btn btn-inverse" type="submit" name="beli">Beli</button>

                        </form>
                        <?php
                        //jika tombol beli ditekan
                        if(isset($_POST['beli']))
                        {
                            //mendapatkan jumlah produk
                                $jumProduk=$_POST['jumlah'];

                            //masukkan keranjang
                            $_SESSION['keranjang'][$idProduk]=$jumProduk;
                            echo "<script>location='beli.php';</script>";
                        }elseif (isset($_POST['kembali'])) {
                            echo "<script>location='index.php';</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>