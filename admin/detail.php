<h2>Detail Pembelian</h2>
<?php
require_once("connection.php");
$query = "select * from pembelian join pelanggan on
    pembelian.id_pelanggan=pelanggan.id_pelanggan where pembelian.id_pembelian = '$_GET[id]' ";
$result = mysqli_query($conn,$query);
$detail=mysqli_fetch_assoc($result);
?>
<pre><?php print_r($detail); ?></pre>
<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
<p>
    <?php echo $detail['no_telp_pelanggan']; ?><br>
    <?php echo $detail['email_pelanggan']; ?>
</p>
<p>
    Tanggal : <?php echo $detail['tgl_pembelian']; ?><br>
    Total : <?php echo $detail['total_pembelian']; ?>
</p>
<table class="table-bordered table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            $query = "select * from beli_produk join produk on
            beli_produk.id_produk=produk.id_produk where beli_produk.id_pembelian = '$_GET[id]' ";
            $result = mysqli_query($conn,$query);
            while($detail=mysqli_fetch_assoc($result))
            {
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $detail['nama_produk'];?></td>
            <td><?php echo $detail['harga_produk'];?></td>
            <td><?php echo $detail['jumlah_beli'];?></td>
            <td><?php echo $detail['harga_produk']*$detail['jumlah_beli'];?></td>
        </tr>
            <?php 
                $no++;
                }
            ?>
    </tbody>
</table>