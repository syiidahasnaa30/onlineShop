<?php
    require_once('connection.php');
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <h4 class="title">
        <span class="pull"><span class="text"><span class="line">Nota
                    <strong> Pembelian</strong></span></span></span>
    </h4>
    <section class="main-content">
        <div class="row">
            <di class="span11">
                <?php
                    require_once("connection.php");
                    $query = "SELECT * from pembelian join pelanggan on
                        pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]' ";
                    $result = mysqli_query($conn,$query);
                    $detail=mysqli_fetch_assoc($result);
                    $idOngkir=$detail['id_ongkir'];
                    $totalBayar=$detail['total_pembelian'];
                    $alamat=$detail['alamat'];
                ?>
                <div class="span11">

                    <div class="col-md-4">
                        <h4>Pembelian</h4>
                        <strong>NoPembelian <?php echo $detail['id_pembelian']; ?></strong><br>
                        <p>
                            Tanggal Pembelian: <?php echo $detail['tgl_pembelian']; ?><br>
                            Total Pembelian : <?php echo  $totalBayar ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h4>Pelanggan</h4>
                        <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
                        <p>
                            No Telepon : <?php echo $detail['no_telp_pelanggan']; ?><br>
                            Email Pelanggan: <?php echo $detail['email_pelanggan']; ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h4>Pengiriman</h4>
                        <?php
                        $query="SELECT *FROM ongkir WHERE id_ongkir='".$idOngkir."' ";
                        $result=mysqli_query($conn,$query);
                        $ongkir=mysqli_fetch_assoc($result);
                    ?>
                        <strong><?php echo $ongkir['kota']; ?></strong><br>
                        <p>
                            Ongkos Kirim: <?php echo $ongkir['harga']; ?><br>
                            alamat lengkap:<br>
                            <?php echo $alamat ?>
                        </p>
                    </div>
                </div>
                <table class="table-bordered table">
                    <thead>
                        <tr>
                            <th class="center">No</th>
                            <th class="center">Nama Produk</th>
                            <th class="center">Harga Satuan</th>
                            <th class="center">Jumlah</th>
                            <th class="center">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $no=1;
                                $query = "select * from beli_produk where id_pembelian = '$_GET[id]' ";
                                $result = mysqli_query($conn,$query);
                                while($detail=mysqli_fetch_assoc($result))
                                {
                            ?>
                        <tr>
                            <td class="center"><?php echo $no ?></td>
                            <td class="center"><?php echo $detail['nama'];?></td>
                            <td class="right">Rp. <?php echo number_format($detail['harga']);?></td>
                            <td class="right"><?php echo $detail['jumlah_beli'];?></td>
                            <td class="right">Rp. <?php echo number_format($detail['sub_harga']);?></td>
                        </tr>
                        <?php
                                    $no++;
                                    }
                        ?>
                    </tbody>
                </table>
                <div class="span11">
                    <div class="col">
                        <div class="alert alert-info">
                            <p>
                                <?php
                                     $query = "SELECT * from pembelian join pelanggan on
                                    pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]' ";
                                    $result = mysqli_query($conn,$query);
                                    $detail=mysqli_fetch_assoc($result);
                                    ?>
                                silakan melakukan pembayaran Rp.
                                <?php echo number_format($detail['total_pembelian']); ?> ke<br>
                                <strong>BANK MANDIRI No Rek. 0019383878 A.N. Rosyiidah Hasnaa</strong>
                            </p>
                        </div>
                    </div>
                </div>



        </div>
    </section>
</body>

</html>