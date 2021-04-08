<?php include "header.php"; ?>
<div class="container">
	<div class="page-header">
		<h3><b>Data Admin</b></h3>
	</div>

	<a class="btn btn-primary" style="margin-bottom: 10px" href="tambah_admin.php">Tambah Data</a>
	<table class="table table-bordered table-striped">
		<tr>
			<th>No.</th>
			<th>Username</th>
			<th>Password</th>
			<th>Nama Lengkap</th>
			<th>Aksi</th>
		</tr>

		<?php 
		$sql = mysqli_query($konek,"SELECT * FROM admin ORDER BY idadmin ASC");
		$no=1;
		while($d=mysqli_fetch_array($sql)) : ?>
			<tr>
				<td width='40px' align='center'><?= $no ?></td>
				<td><?= $d['username'] ?></td>
				<td><?= $d['password'] ?></td>
				<td><?= $d['namalengkap'] ?></td>
				<td width='160px' align='center'>
					<a class='btn btn-warning btn-sm' href='edit_admin.php?id=<?= $d['idadmin']?>'>Edit</a> 
					<a class='btn btn-danger btn-sm' href='hapus_admin.php?id=<?= $d['idadmin'] ?>' onclick="return confirm('Yakin menghapus data Ini?')">Hapus</a>
				</td>
			</tr>
			
		
		<?php $no++; endwhile ?>
	</table>
</div>

<?php include "footer.php"; ?>