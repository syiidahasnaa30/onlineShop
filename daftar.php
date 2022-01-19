<?php
    require_once('connection.php');
?>
<html>
<section class="header_text sub">
    <h4 class="title">
        <span class="pull"><span class="text"><span class="line">Daftar
                    <strong>Akun Baru</strong></span></span></span>
    </h4>
</section>
<section class="main-content">
    <div class="row">
        <div class="span12">
            <form method="post">
                <fieldset class="center">
                    <div class="control-group">
                        <label class="control-label">Nama Lengkap</label>
                        <div class="controls">
                            <input type="text" name="nama"class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Alamat Email:</label>
                        <div class="controls">
                            <input type="email" name="email" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">No Hp:</label>
                        <div class="controls">
                            <input type="text" name="noHp" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Alamat:</label>
                        <div class="controls">
                            <input type="text" name="alamat" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password:</label>
                        <div class="controls">
                            <input type="password" name="password" class="input-xlarge">
                        </div>
                    </div>
                    <hr>
                    <div class="actions"><input tabindex="9"name="daftar" class="btn btn-inverse large" type="submit"
                            value="Daftar Akun"></div>
                </fieldset>
            </form>
           <?php
           //jika pelanggan daftar
            if(isset($_POST['daftar']))
            {
                $nama=$_POST['nama'];
                $email=$_POST['email'];
                $password=$_POST['password'];
                $noHp=$_POST['noHp'];
                $alamat=$_POST['alamat'];
                //apakah email sudah digunakan?
                $query="SELECT * FROM pelanggan WHERE email_pelanggan='".$email."'";
                $result=mysqli_query($conn,$query);
                $cek = $result->num_rows;
                //jika email sudah digunakan
                if($cek==1){
                    echo "<script>alert('Email telah digunakan');</script>";
					echo "<script>location='index.php?halaman=daftar';</script>";
                }
                //jika email belum digunakan
                else{
                    $query="INSERT INTO pelanggan(nama_pelanggan,email_pelanggan,password_pelanggan,no_telp_pelanggan,alamat_pelanggan)
                    VALUES('".$nama."','".$email."','".$password."','".$noHp."','".$alamat."')";
                    $result=mysqli_query($conn,$query);
                    echo "<script>alert('Pendaftaran Sukses');</script>";
					echo "<script>location='index.php?halaman=login';</script>";
                }
                

            }
            ?>
        </div>
    </div>
</section>

<body>
</body>

</html>