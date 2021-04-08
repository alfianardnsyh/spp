<?php include "header.php"; ?>
<div class="container">
	<div class="page-header">
		<h3>Tambah Data Siswa</h3>
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
			<td>NIS</td>
			<td><input class="form-control" type="text" name="nis" maxlength="10"></td>
		</tr>
		<tr>
			<td>Nama Siswa</td>
			<td><input class="form-control" type="text" name="namasiswa" maxlength="40"></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>
				<select class="form-control" name="kelas">
					<option value="" selected>- Pilih Kelas -</option>
					<?php
					$sqlKelas = mysqli_query($konek, "select * from walikelas order by kelas ASC");
					while($k=mysqli_fetch_array($sqlKelas)){
						?>
						<option value="<?php echo $k['kelas']; ?>"><?php echo $k['kelas']; ?></option>
						<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tahun Ajaran</td>
			<td><input class="form-control" type="text" name="tahunajaran" value="2020/2021" readonly /></td>
		</tr>
		<tr>
			<td>Biaya SPP</td>
			<td><input class="form-control" type="text" name="biaya" value="300000" readonly /></td>
		</tr>
		<tr>
			<td>Jatuh Tempo Pertama</td>
			<td><input class="form-control" type="text" name="jatuhtempo" value="2021-07-10" readonly /></td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit" class="btn btn-success" style="" >Simpan <img src="img/tambah.png" style="width: 17px;"></button></td>
		</tr>
	</table>
</form>

<!-- simpan data -->
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//variabel untuk menampung inputan dari form
		$nis 	= $_POST['nis'];
		$nama 	= $_POST['namasiswa'];
		$kelas 	= $_POST['kelas'];
		$tahun 	= $_POST['tahunajaran'];
		$biaya 	= $_POST['biaya'];
		$awaltempo = $_POST['jatuhtempo'];

		// Membuat Array untuk menampung bulan bahasa indonesia
		$bulanIndo = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);


		//proses simpan
		if($nis=='' || $nama=='' || $kelas==''){
			echo "Form belum lengkap...";
		}else{
			$simpan = mysqli_query($konek, "insert into siswa(nis,namasiswa,kelas,tahunajaran,biaya)
					values('$nis','$nama','$kelas','$tahun','$biaya')");
			if(!$simpan){
				echo "Penyimpanan data gagal..";
			}else{
				//ambil data id siswa terakhir
				$ds=mysqli_fetch_array(mysqli_query($konek, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
				$idsiswa = $ds['idsiswa'];

				//membuat tagihan (12 bulan dimulai dari Juli 2017 dan menyimpan tagihan di tabel spp
				for($i=0; $i<12; $i++){
					//membuat tanggal jatuh tempo nya setiap tanggal 10
					$jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

					$bulan = $bulanIndo[date('m', strtotime($jatuhtempo))]." ".date('Y',strtotime($jatuhtempo));

					mysqli_query($konek, "INSERT INTO spp(idsiswa,jatuhtempo,bulan,jumlah)
								values('$idsiswa','$jatuhtempo','$bulan','$biaya')");
				}

				header('location:tampil_siswa.php');
			}
		}

	}
?>
</div>
<?php include "footer.php"; ?>