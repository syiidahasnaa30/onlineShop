<h2>Data Pelanggan</h2>
<?php
require_once("connection.php");
$query = "select * from pelanggan ";
$result = mysqli_query($conn,$query);
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Email</th>
            <th>No Telpon</th>
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
            <td><?php echo $row['email_pelanggan'];?></td>
            <td><?php echo $row['no_telp_pelanggan'];?></td>
            <td>
                <a href="" class="btn-danger btn">Hapus</a>
                <a href="" class="btn-warning btn">Ubah</a>
            </td>
        </tr>
        <?php 
            $no++;
            }
        ?>
    </tbody>
</table>