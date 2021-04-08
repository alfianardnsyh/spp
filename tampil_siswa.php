<?php include "header.php"; ?>
<div class="container">
	<div class="page-header">
	<h3><b>Data Siswa</b></h3>
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
<a class="btn btn-primary" style="margin-bottom: 10px" href="tambah_siswa.php">Tambah Data <img src="img/tambah.png" style="width: 14px; margin-left: 2px"></a> 
<table class="table	table-bordered">
	<tr>
		<th>No.</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Tahun Ajaran</th>
		<th>Biaya</th>
		<th>Aksi</th>
	</tr>

	<?php 
	$sql = mysqli_query($konek,"select * from siswa order by kelas asc");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td width='40px' align='center'>$no</td>
			<td>$d[nis]</td>
			<td>$d[namasiswa]</td>
			<td>$d[kelas]</td>
			<td>$d[tahunajaran]</td>
			<td>$d[biaya]</td>
			<td width='160px' align='center' >
				<a class='btn btn-warning btn-sm' href='edit_siswa.php?id=$d[idsiswa]'>Edit </a>  
				<a class='btn btn-danger btn-sm' href='hapus_siswa.php?id=$d[idsiswa]'>Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	?>
</table>

<p>Menghapus siswa berarti juga menghapus tagihan siswa...</p>
</div>
<?php include "footer.php"; ?>