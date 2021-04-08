<?php include "header.php"; ?>

<div class="container">
	<div class="page-header">
	<h3>Tambah data Kelas dan Wali Kelas</h3>
	</div>
		<style type="text/css">
		.btn-primary {
    color: #fff;
    background-color: #37457e;
    border-color: #37457e;
}		
	.btn-warning {
    color: #fff;
    background-color: #ffce6c;
    border-color: #ffce6c;
}
	.btn-danger {
    color: #fff;
    background-color: #ff5a3c;
    border-color: #ff5a3c;
}
	</style>
<form method="POST" action="">
	<table class="table">
		<tr>
			<td width="160px">Kelas</td>
			<td><input class="form-control" type="text" name="kelas" maxlength="40" /></td>
		</tr>
		<tr>
			<td>Pilih Guru / Wali Kelas</td>
			<td>
				<select class="form-control" name="guru">
					<option value="" selected>- Pilih Guru -</option>
					<?php
					$sqlGuru=mysqli_query($konek, "SELECT * FROM guru ORDER BY idguru ASC");
					while($g=mysqli_fetch_array($sqlGuru)){
						echo "<option value='$g[idguru]'>$g[namaguru]</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit" class="btn btn-success" style="" >Simpan <img src="img/tambah.png" style="width: 17px;"></button></td>
		</tr>
	</table>	
</form>

<!-- untuk memproses form -->
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$kelas = $_POST['kelas'];
	$guru = $_POST['guru'];
	
	if($kelas=='' || $guru==''){
		echo "Form belum lengkap!!!";		
	}else{
		//simpan data
		$simpan = mysqli_query($konek, "INSERT INTO walikelas(kelas,idguru)
						VALUES ('$kelas','$guru')");
		
		if(!$simpan){
			echo "Simpan data gagal!!!";
		}else{
			header('location:tampil_walikelas.php');
		}
	}
}
?>
</div>
<?php include "footer.php"; ?>