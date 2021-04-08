<?php include "header.php"; ?>
<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM admin WHERE idadmin='$_GET[id]'");
$e=mysqli_fetch_assoc($sqlEdit);

?>

<div class="container">
	<div class="page-header">
		<br/>
		<br/>
		<h3>Edit Data Admin</h3>
	</div>

	<form method="post" action="">
		<input type="hidden" name='idadmin' value="<?php echo $e['idadmin']; ?>" />
		<table class="table">
			<tr>
				
				<td width="160px">Username</td>
				<td><input type="text" class="form-control" name="username" maxlength="10" value="<?php echo $e['username']; ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" class="form-control" name="password" maxlength="40" value="<?php echo $e['password']; ?>"></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><input type="text" class="form-control" name="namalengkap" value="<?php echo $e['namalengkap']; ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="btn btn-success" type="submit" value="Update" /></td>
			</tr>
		</table>
	</form>

	<!-- proses edit data -->
	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){

		//variabel untuk menampung inputan dari form
		$id 	= $_POST['idadmin'];
		$user 	= $_POST['username'];
		$pass 	= $_POST['password'];
		$name   = $_POST['namalengkap'];

		

		if($id=='' || $user =='' || $pass==''){
			echo "Form Belum lengkap....";
		}else{
			$update = mysqli_query($konek, "UPDATE admin SET idadmin='$id', username='$user', password='$pass', namalengkap='$name' WHERE idadmin='$id'");
												

			if(!$update){
				echo "Update data gagal...";

			}else{
				header('location:tampil_admin.php');
			}
		}
	}
	?>
</div>

<?php include "footer.php" ?>