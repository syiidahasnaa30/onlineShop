<!DOCTYPE html>
<html lang="en">

<body>
	<section class="main-content ">
		<div class="row center">
			<h4 class="title"><span class="text"><strong>Login</strong>Akun yang sudah ada </span></h4>
			<form method="post">
				<input type="hidden" name="next" value="/">
				<fieldset>
					<div class="control-group center">
						<label class="control-label">Email</label>
						<div class="controls">
							<input type="email" placeholder="masukkan email yang terdaftar" name="email" id="username"
								class="input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" placeholder="Enter your password" name="password" id="password"
								class="input-xlarge">
						</div>
					</div>
					<div class="actions">
						<input tabindex="9" class="btn btn-inverse large" type="submit" name="login" value="login">
					</div>
				</fieldset>
			</form>
		</div>
	</section>
	</div>
	<?php

			if(isset($_POST['login']))
			{
				$email=$_POST['email'];
				$password=$_POST['password'];
				session_start();
				require_once('connection.php');
				$query="SELECT * FROM pelanggan WHERE email_pelanggan='".$email."' and password_pelanggan='".$password."' ";
				$result=mysqli_query($conn,$query);
				//mengjitung akun yang masuk
				$cek = $result->num_rows;

				//ada data yang cocok
                    if($cek > 0){

						$_SESSION['pelanggan']=$result->fetch_assoc();;
						$_SESSION['status_pelanggan']="login";
						echo "<script>alert('Anda sukses login');</script>";
						echo "<script>location='index.php?halaman=produk';</script>";
					}
				//tidak ada data yang cocok
                    else{
						echo "<script>alert('Anda gagal login');</script>";
						echo "<script>location='index.php?halaman=login';</script>";
                    }
			}
		?>
</body>

</html>