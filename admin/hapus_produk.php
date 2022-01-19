<?php    
            require_once("connection.php");
            if(isset($_GET['Del']))
            {
                $idProduk= $_GET['Del'];
                $query = "delete from produk where id_produk = '".$idProduk."'";
                $result = mysqli_query($conn,$query);
                if($result)
                {
                    header("location:index1.php?halaman=produk");
                }
                else
                {
                    echo 'Please Check Your Query';
                }
            }
            else
            {
                header("location:index1.php?halaman=produk");
            }
?>