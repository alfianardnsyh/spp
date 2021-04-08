<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/signin/">

    <title>| Aplikasi Pembayaran SPP</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./assets/js/ie-emulation-modes-warning.js"></script>
    <style type="text/css">
    html{
    	position: relative;
    }
    body{  	
    	background: #eeeeee;
    }
    .container_login {
    width: 360px;
	background: white;
	margin:50px auto;
    padding: 30px 20px;
    border-radius: 6px;
}
	.separator {
    margin: 20px 0;
    border-top: 1px solid #CCCCCC;
    position: relative;
}
	.separator-text {
    display: block;
    position: absolute;
    top: -11px;
    left: 42%;
    margin-left: -22px;
    padding: 0px 10px;
    background: #FFFFFF;
    color: #8a8a8a;
}
	.btn {border-radius: 40px;
}
	.btn-primary {
    color: #fff;
    background-color: #37457e;
    border-color: #37457e;
}
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>
	<div class="container_login" >
	<img src="img/smklogo.png" style="display: block; width: 120px;  margin: auto;">
<h2 class="tulisan_login" align="center" style="margin-bottom: 10px margin-top:-20px;"><b>SPP SMKN 2 BEKASI</b></h2>
<form method="post" action="" class="form-signin" >
	<table>
		<tr>
			<label for="username" class="sr-only">Username</label>
			<input type="username" name="username" placeholder="Username" class="form-control" required autofocus style="margin-bottom: 3px;" />
		</tr>
		<tr>
			<label for="username" class="sr-only">Username</label>
			<input type="password" name="password" placeholder="Password" class="form-control"/>
		</tr>
		<tr>
			<input type="submit" value="MASUK " class="btn btn-lg btn-block btn-primary" style="margin-top: 10px;" />
		</tr>

<center>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	if($user=='' || $pass==''){
		echo "FORM BELUM LENGKAP";
	}else{
		include "koneksi.php";
		$sqlLogin = mysqli_query($konek, "SELECT * FROM admin 
						WHERE username='$user' AND password='$pass'");
		$jml = mysqli_num_rows($sqlLogin);
		$d=mysqli_fetch_array($sqlLogin);
		if($jml > 0){
			session_start();
			$_SESSION['login']	= true;
			$_SESSION['id']		= $d['idadmin'];
			$_SESSION['username']=$d['username'];
			
			header('location:./index.php');
		}else{
			echo "USERNAME ATAU PASSWORD SALAH";
		}
	}
}
?>
</center>
			<div class="separator">
				<span class="separator-text">Untuk Siswa</span>
			</div>
		<tr>
			<a href="cekpembayaran.php" class="btn btn-success btn-lg btn-block" style="margin-top: 10px">CEK PEMBAYARAN SPP</a>
		</tr>
	</table>
</form>
</div>
</body>
</html>