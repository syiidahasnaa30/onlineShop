<h2>Data Pembelian</h2>
<?php
if(!isset($_SESSION['status'])){
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}else{
    require_once("connection.php");
    $query = "select * from pembelian join pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan ";
    $result = mysqli_query($conn,$query);
}
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pembeli</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
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
            <td><?php echo $row['nama_pelanggan'];?></td>
            <td><?php echo $row['tgl_pembelian'];?></td>
            <td><?php echo $row['total_pembelian'];?></td>
            <td>
                <a href="index1.php?halaman=detail&id=<?php echo $row['id_pembelian'];?>" class="btn-primary btn">Detail</a>
            </td>
        </tr>
        <?php 
            $no++;
            }
        ?>
    </tbody>
</table>