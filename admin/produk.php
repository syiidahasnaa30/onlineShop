<?php

if(!isset($_SESSION['status'])){
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}else{
        require_once("connection.php");
        $query = "select * from produk ";
        $result = mysqli_query($conn,$query);
}
?>
<h2>Data Produk</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Stok</th>
            <th>foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            while($row=mysqli_fetch_assoc($result)){                
        ?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $row['nama_produk'];?></td>
            <td>Rp.<?php echo $row['harga_produk'];?></td>
            <td><?php echo $row['berat_produk'];?> gram</td>
            <td><?php echo $row['stok_produk'];?></td>
            <td>
                <img src="fotoProduk/<?php echo $row['foto_produk'];?>" width="200" >
            </td>
            <td>
                <a href="hapus_produk.php?Del=<?php echo $row['id_produk'];?>" class="btn-danger btn">Hapus</a>
                <a href="index1.php?halaman=ubah&id=<?php echo $row['id_produk'];?>" class="btn-warning btn">Ubah</a>
            </td>
        </tr>
        <?php 
            $no++;
            }
        ?>
    </tbody>
</table>
<a href="index1.php?halaman=tambah" class="btn btn-primary">Tambah Produk </a>