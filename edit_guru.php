<?php include "header.php"; ?>
<?php
$sqlEdit=mysqli_query($konek, "SELECT * FROM guru WHERE idguru='$_GET[id]'");
$e=mysqli_fetch_array($sqlEdit);
?>
	<div class="container">
	<div class="page-header">
	<h3>Edit Data Guru</h3>
	</div>
<form method="post" action="">
	<input type="hidden" name="idguru" value="<?php echo $e['idguru']; ?>" />
	<table class="table">
		<tr>
			<td>Nama Guru</td>
			<td><input class="form-control" type="text" name="namaguru" value="<?php echo $e['namaguru']; ?>" /></td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit" class="btn btn-success" style="" >Update <img src="img/update.png" style="width: 17px;"></button></td>
		</tr>
	</table>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel dari elemen form
	$id		= $_POST['idguru'];
	$nama 	= $_POST['namaguru'];
	
	if($nama==''){
		echo "Form belum lengkap!!!";
	}else{
		//proses edit data guru
		$edit = mysqli_query($konek, "UPDATE guru SET namaguru='$nama' WHERE idguru='$id'");
		
		if(!$edit){
			echo "Edit data gagal!!";
		}else{
			header('location:tampil_guru.php');
		}
	}
}
?>
</div>
<?php include "footer.php"; ?>