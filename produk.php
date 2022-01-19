<?php
    require_once('connection.php');
?>

<section class="main-content">
	<div class="row">
		<div class="span12">
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull"><span class="text"><span class="line">Produk
									<strong>Terbaru</strong></span></span></span>
					</h4>
					<!--isi produk !-->
					<div id="myCarousel-2" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<div class="active-item">
								<ul class="thumbnails">
									<?php
                                                    $query="SELECT * FROM produk";
                                                    $result=mysqli_query($conn,$query);
                                                    while($produk=mysqli_fetch_assoc($result)){
                                    ?>
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p><a href="product_detail.html"><img
														src="admin/fotoProduk/<?php echo $produk['foto_produk']; ?>"
														width="200" height="300" /></a></p>
											<a href="index.php?halaman=detail&id=<?php echo $produk['id_produk'];?>"
												class="title"><?php echo $produk['nama_produk']; ?></a><br />
											<p class="price">Rp<?php echo $produk['harga_produk']; ?></p>
											<a href="beli.php?id=<?php echo $produk['id_produk']; ?>"
												class="category">Beli</a>
										</div>
									</li>
									<?php
                                                    }
                                                ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>