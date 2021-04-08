<?php include "header.php"; ?>

<div class="container">
	<div class="page-header">
	<br/>
	<br/>
		<h3>Tambah Data Admin</h3>
	</div>
	<form method="post" action="">
		<table class="table">
			<tr>
				<td width="160px">Username</td>
				<td><input class="form-control" type="text" name="username" maxlength="10"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input class="form-control" type="text" name="password" maxlength="40"></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><input class="form-control" type="text" name="namalengkap" maxlength="40"></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="btn btn-success" type="submit" value="Simpan" /></td>
			</tr>
		</table>
	</form>

	<!-- simpan data -->
	<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			
			//variabel untuk menampung inputan dari form
			$username 	= $_POST['username'];
			$password 	= $_POST['password'];
			$namalengkap 	= $_POST['namalengkap'];


			//proses simpan
			if($username=='' || $password=='' || $namalengkap==''){
				echo "Form belum lengkap...";
			}else{
				//simpan data
			$simpan = mysqli_query($konek, "INSERT INTO admin VALUES ('','$username','$password','$namalengkap')");
			if(!$simpan){
				echo "Simpan data gagal!!!";
			}else{
				header('location:tampil_admin.php');
				}
			}

		}
	?>
</div>

<?php include "footer.php"; ?>