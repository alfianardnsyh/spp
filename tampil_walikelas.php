<?php include "header.php"; ?>
<div class="container">
	<div class="page-header">
		<h3><b>Data Kelas dan Wali Kelas</b></h3>
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
	<a class="btn btn-primary" style="margin-bottom: 10px" href="tambah_walikelas.php">Tambah Data <img src="img/tambah.png" style="width: 14px; margin-left: 2px"></a>
	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Nama Kelas</th>
			<th>Nama Wali Kelas</th>
			<th>Aksi</th>
		</tr>
		<?php
		$sql = mysqli_query($konek, "SELECT walikelas.kelas,guru.namaguru
									FROM walikelas
									INNER JOIN guru ON walikelas.idguru=guru.idguru
									ORDER BY walikelas.kelas ASC");
		$no=1;
		while($d=mysqli_fetch_array($sql)){
			echo "<tr>
				<td width='40px'>$no</td>
				<td>$d[kelas]</td>
				<td>$d[namaguru]</td>
				<td width='160px' align='center'>
					<a class='btn btn-warning btn-sm' href='edit_walikelas.php?kls=$d[kelas]'>Edit </a>
					<a class='btn btn-danger btn-sm' href='hapus_walikelas.php?kls=$d[kelas]'>Hapus</a>
				</td>
			</tr>";
			$no++;
		}
		?>
	</table>
</div>
<?php include "footer.php"; ?>