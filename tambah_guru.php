<?php include "header.php"; ?>
<div class="container">
	<div class="page-header">
	<h3>Tambah Data Guru</h3>
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
	<form method="post" action="">
		<table class="table">
			<tr>
				<td width="160px">Nama Guru</td>
				<td><input class="form-control" type="text" name="namaguru" /></td>
			</tr>
			<tr>
				<td></td>
				<td><button type="submit" class="btn btn-success" style="" >Simpan <img src="img/tambah.png" style="width: 17px;"></button></td>
			</tr>
		</table>
	</form>

	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//variabel dari elemen form
		$nama = mysqli_real_escape_string($konek, $_POST['namaguru']);
		
		if($nama==''){
			echo "Form belum lengkap!!!";
		}else{
			//proses simpan data guru
			$simpan = mysqli_query($konek, "INSERT INTO guru(namaguru) VALUES ('$nama')");
			
			if(!$simpan){
				echo "Simpan data gagal!!";
			}else{
				header('location:tampil_guru.php');
			}
		}
	}
	?>
</div>

<?php include "footer.php"; ?>