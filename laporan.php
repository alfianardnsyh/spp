</<?php include "header.php"; ?>
<div class="container">
	<div class="page-header">
		<h3><b>Laporan</b></h3>
		
          <div style="margin-top: 10px" class="list-group">
            <a href="laporan_data_guru.php" class="list-group-item">
              Laporan Data Guru
            </a>
            <a href="laporan_data_siswa.php" class="list-group-item">Laporan Data Siswa</a>
            <a href="laporan_tunggakan.php" class="list-group-item">Laporan Tunggakan</a>
          </div>
          	<style type="text/css">
		.btn-primary {
    color: #fff;
    background-color: #37457e;
    border-color: #37457e;
}		
	</style>
		<h2 style="margin-bottom: 10px" >Laporan Pembayaran</h2><br/>
		<form method="GET" action="laporan_pembayaran.php" target="_blank">
			<table class="table">
			<strong style="margin-bottom: 10px">Mulai Tanggal</strong> <input class="form-control" type="date" name="tgl1" value="<?php echo date('Y-m-d'); ?>" />
			<strong style="margin-bottom: 10px"> Sampai Tanggal </strong> <input class="form-control" type="date" name="tgl2" value="<?php echo date('Y-m-d'); ?>"/>
			<button type="submit" class="btn btn-primary" style="margin-top: 5px; " >Tampilkan <img src="img/tampilkan.png" style="margin-left: 5px; width: 17px ;"></button>
			</table>		
		</form>
</div>
</div>
<?php include "footer.php"; ?>