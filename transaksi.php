<?php include "header.php" ?>
<div class="container">
	<div class="page-header">
		<h3><b>Transaksi Pembayaran SPP</b></h3>
	</div>

<form method="get" action="">
	<table class="table">
	NIS: <input class="form-control" type="text" name="nis" />
	<button type="submit" class="btn btn-success" style="margin-top: 5px;" >Cari Siswa <img src="img/Cari.png" style="width: 17px;"></button>
	</table>
</form>

<?php
if(isset($_GET['nis']) && $_GET['nis']!=''){
	$sqlSiswa = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
	$ds=mysqli_fetch_array($sqlSiswa);
	$nis = $ds['nis'];
?>

<h3>Biodata Siswa</h3>
<table class="table">
	<tr>
		<td>NIS</td>
		<td>:</td>
		<td><?php echo $ds['nis']; ?></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td>:</td>
		<td><?php echo $ds['namasiswa']; ?></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>:</td>
		<td><?php echo $ds['kelas']; ?></td>
	</tr>
	<tr>
		<td>Tahun Ajaran</td>
		<td>:</td>
		<td><?php echo $ds['tahunajaran']; ?></td>
	</tr>
</table>

<h3>Tagihan SPP Siswa</h3>
<table class="table table-bordered table-striped">
	<tr>
		<th>No</th>
		<th>Bulan</th>
		<th>Jatuh Tempo</th>
		<th>No. Bayar</th>
		<th>Tgl. Bayar</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
		<th>Bayar</th>
	</tr>

	<?php
	$sql = mysqli_query($konek, "SELECT * FROM spp WHERE idsiswa='$ds[idsiswa]' ORDER BY jatuhtempo ASC");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[bulan]</td>
			<td>$d[jatuhtempo]</td>
			<td>$d[nobayar]</td>
			<td>$d[tglbayar]</td>
			<td>$d[jumlah]</td>
			<td>$d[ket]</td>
			<td align='center'>";
				if($d['nobayar']==''){
					echo "<a class='btn btn-success' href='proses_transaksi.php?nis=$nis&act=bayar&id=$d[idspp]'>Bayar</a>";
				}else{
						echo "<a class='btn btn-danger' href='proses_transaksi.php?nis=$nis&act=batal&id=$d[idspp]'>Batal</a>
							 <a class='btn btn-default' href='cetak_slip_transaksi.php?nis=$nis&act=batal&id=$d[idspp]' target='_blank'>Cetak</a>";
				}
			echo "</td>
		</tr>";
		$no++;
	}
	?>
</table>

<?php
}
?>
<hr/>
<p>Pembayaran SPP dilakukan dengan cara mencari tagihan siswa dengan NIS melalui form di atas, kemudian proses pembayaran</p>
</div>
<?php include "footer.php" ?>