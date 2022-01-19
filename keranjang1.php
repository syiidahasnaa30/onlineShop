<?php
require_once('connection.php');
if(empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang'])){
    echo "<script>alert('keranjang masih kosong');</script>";
	echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Keranjang belanja</title>
</head>
<body>
<div id="wrapper" class="container">
			<section class="main-content">
				<div class="row">
					<div class="span9">
						<h4 class="title"><span class="text"><strong>Keranjang</strong> Belanja Anda</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Produk</th>
									<th>Harga</th>
									<th>Jumlah</th>
                                    <th>SubTotal</th>
                                    <th>Aksi<th>
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
									<td>Rp<?php echo number_format($row['harga_produk']); ?></td>
									<td><?php echo $jumlah ?></td>
                                    <td>Rp<?php echo number_format($subtotal); ?></td>
                                    <td>
                                        <a href="hapuskeranjang.php?id=<?php echo $idProduk?>" class="btn btn-danger btn-xs">hapus</a>
                                    </td>
								</tr>
                                <?php
                                    }
                                    $no++;
                                    }
                                ?>
							</tbody>
						</table>

						<p class="cart-total right">
							<strong>Total</strong>: Rp<?php echo number_format($total); ?><br>
						</p>
						<hr/>
						<p class="buttons center">
							<button class="btn" type="button">Hapus</button>
							<button class="btn" type="button"><a href="index.php?halaman=produk">Lanjutkan Belanja</a></button>
							<button class="btn btn-inverse" type="submit" id="checkout"><a href="index.php?halaman=checkout">Checkout</a></button>
						</p>
					</div>
				</div>
			</section>
		</div>
</body>
</html>