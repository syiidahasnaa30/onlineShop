<?php
    require_once('connection.php');
    //jika belum login
    if(!isset($_SESSION['pelanggan']))
    {
        echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		echo "<script>location='index.php?halaman=login';</script>";
    }
?>
<html>

<body>
    <div id="wrapper" class="container">
        <section class="main-content">
            <div class="row">
                <div class="span11">
                    <h4 class="title"><span class="text"><strong>checkout</strong></span></h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th class="right">Harga</th>
                                <th class="right">Jumlah</th>
                                <th class="right">SubTotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $no=1;
                                    $total=0;
                                    foreach($_SESSION['keranjang'] as $idProduk => $jumlah) {
                                    $query="SELECT * FROM produk WHERE id_produk='".$idProduk."'";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                    $subtotal=$row['harga_produk']*$jumlah;
                                    $total+=$subtotal;
                                ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row['nama_produk'];?></td>
                                <td class="right">Rp. <?php echo number_format($row['harga_produk']); ?></td>
                                <td class="right"><?php echo $jumlah ?></td>
                                <td class="right">Rp. <?php echo number_format($subtotal); ?></td>
                            </tr>
                            <?php
                                    }
                                    $no++;
                                    }
                                ?>
                        </tbody>
                    </table>
                    <p class="cart-total right">
                        <strong>Total</strong>: Rp. <?php echo number_format($total); ?><br>
                    </p>
                    <hr />
                    <form method="post">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" readonly
                                    value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>">
                            </div>
                            <div class="col">
                                <input type="text" readonly
                                    value="<?php echo $_SESSION['pelanggan']['no_telp_pelanggan']; ?>">
                            </div>
                            <div class="col">
                                <select class="form-control" name="id_ongkir">
                                    <option value="">ongkos kirim</option>
                                    <?php
                                        $query="SELECT * FROM ongkir";
                                        $result=mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <option value="<?php echo $row['id_ongkir']; ?>">
                                        <?php echo $row['kota']; ?>-
                                        Rp. <?php echo number_format($row['harga']); ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>`
    
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap Pengiriman:</label>
                           <textarea name="alamat_lengkap" rows="5"></textarea>
                            </div>
                        <button class="btn btn-primary" name="checkout">Checkout</button>
                    </form>
                    <?php
                    if(isset($_POST['checkout']))
                    {
                        $idPelanggan=$_SESSION['pelanggan']['id_pelanggan'];
                        $idOngkir=$_POST['id_ongkir'];
                        $alamat_pengiriman=$_POST['alamat_lengkap'];
                        $tgl_pembelian=date('y-m-d');
                        $query="SELECT * FROM ongkir WHERE id_ongkir='".$idOngkir."' ";
                        $result=mysqli_query($conn,$query);
                        $row=mysqli_fetch_assoc($result);
                        $tarif=$row['harga'];
                        $totalbayar=$total+$tarif;
                        //penyimpan data ke tabel pembelian
                        $query="INSERT into pembelian(id_pelanggan,id_ongkir,tgl_pembelian,total_pembelian,alamat)
                        VALUES('".$idPelanggan."','".$idOngkir."','".$tgl_pembelian."','".$totalbayar."','".$alamat_pengiriman."') ";
                        $result=mysqli_query($conn,$query);

                        //mendapatkan id pembelian yang barusan terjadi
                        $idPembelian_new=$conn->insert_id;
                        foreach ($_SESSION['keranjang'] as $idProduk => $jumlah) {
                            $query="SELECT * FROM produk WHERE id_produk='".$idProduk."' ";
                            $result=mysqli_query($conn,$query);
                            $perproduk=mysqli_fetch_assoc($result);
                            $nama=$perproduk['nama_produk'];
                            $harga=$perproduk['harga_produk'];
                            $berat=$perproduk['berat_produk'];
                            $sub_berat=$perproduk['berat_produk']*$jumlah;
                            $sub_harga=$perproduk['harga_produk']*$jumlah;
                            $query="INSERT INTO beli_produk(id_pembelian,id_produk,jumlah_beli,nama,harga,berat,sub_berat,sub_harga)
                            VALUES('".$idPembelian_new."','".$idProduk."','".$jumlah."','".$nama."','".$harga."','".$berat."','".$sub_berat."','".$sub_harga."')";
                            $beli=mysqli_query($conn,$query);

                            $query="UPDATE produk SET stok_produk=stok_produk-$jumlah WHERE id_produk='".$idProduk."'";
                            $result=mysqli_query($conn,$query);
                        }
                        //mengkosongkan keranjang belanja
                        unset($_SESSION['keranjang']);
                        //tampilan dialihkan ke halaman nota, dari pembelian yang baru terjadi
                        if($beli){
                            echo "<script>alert('Pembelian sukses');</script>";
                            echo "<script>location='index.php?halaman=nota&id=$idPembelian_new';</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>

</html>