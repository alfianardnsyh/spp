<?php
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Pembayaran</title>
	<style type="text/css">
		body{
			font-family: Arial;
		}

		@media print{
			.no-print{
				display: none;
			}
		}

		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
<h3>SEKOLAH MENENGAH KEJURUAN <br/>LAPORAN PEMBAYARAN SPP</h3>
<hr/>
<p>Tanggal : <?php echo $_GET['tgl1']." - ". $_GET['tgl2']; ?></p>
<table  width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th>No.</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Np. Bayar</th>
		<th>Pembayaran Bulan</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
	</tr>
	<?php
	$sqlBayar= mysqli_query($konek, "SELECT spp.*,siswa.nis, siswa.namasiswa, siswa.kelas FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa WHERE tglbayar BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]' ORDER BY nobayar ASC");
	$no=1;
	$total = 0;
	while($d=mysqli_fetch_array($sqlBayar)){
		echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$d[nis]</td>
			<td> $d[namasiswa]</td>
			<td align='center'>$d[kelas]</td>
			<td align='center'>$d[nobayar]</td>
			<td>$d[bulan]</td>
			<td align='right'>$d[jumlah]</td>
			<td>$d[ket]</d>
		</tr>";
		$no++;
		$total += $d['jumlah'];
    }
    ?>
    <tr>
    	<td colspan="6" align="right">Total</td>
    	<td align="right"><b><?php echo $total; ?></b></td>
    	<td></td>
    </tr>
</table>

<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>Bekasi, <?php echo date('d/m/Y'); ?><br/>
			Staff Tata Usaha,</p>
			<br/>
			<br/>
			<p>___________________________</p>
		</td>
	</tr>
	
</table>
<a class="btn btn-primary btn-sm" href="#"class="no-print" onclick="window.print();">Cetak/Print</a>
</body>
</html>

<?php
}else{
	header('location:login.php');
}
?>
