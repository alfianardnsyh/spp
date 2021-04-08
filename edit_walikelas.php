<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM walikelas WHERE kelas='$_GET[kls]'");
$e=mysqli_fetch_array($sqlEdit);
?>
<div class="container">
	<div class="page-header">
	<h3>Edit data Kelas dan Wali Kelas</h3>
	</div>

<form method="POST" action="">
	<table class="table">
		<tr>
			<td>Kelas</td>
			<td><input class="form-control" type="text" name="kelas" value="<?php echo $e['kelas']; ?>" maxlength="40" readonly /></td>
		</tr>
		<tr>
			<td>Pilih Guru / Wali Kelas</td>
			<td>
				<select class="form-control" name="guru">
					<?php
					$sqlGuru=mysqli_query($konek, "SELECT * FROM guru ORDER BY idguru ASC");
					while($g=mysqli_fetch_array($sqlGuru)){
						if($g['idguru'] == $e['idguru']){
							$selected = "selected";
						}else{
							$selected = "";
						}
						
						echo "<option value='$g[idguru]' $selected>$g[namaguru]</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit" class="btn btn-success" style="" >Update <img src="img/update.png" style="width: 17px;"></button></td>
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
		//update data
		$update = mysqli_query($konek, "UPDATE walikelas SET idguru='$guru' WHERE kelas='$kelas'");
		
		if(!$update){
			echo "Update data gagal!!!";
		}else{
			header('location:tampil_walikelas.php');
		}
	}
}
?>
</div>

<?php include "footer.php"; ?>