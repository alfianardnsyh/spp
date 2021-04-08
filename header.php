<?php
ob_start();
session_start();
if(!isset($_SESSION['login'])){
    header('location:login.php');
}

include "koneksi.php";
?>

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
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/sticky-footer-navbar/">

    <title>| Aplikasi Pembayaran SPP</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">


    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">


    <link href="./assets/style.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <style type="text/css">
      .navbar-inverse{
        background-color : #18807a;
        border-color: #18807a;
      }
      .navbar-inverse .navbar-brand {
        color: #ffffff;
}
      .navbar-inverse .navbar-nav>li>a {
        color: #ffffff;
}

      .zoom:hover {
      transform: scale(1.5);
      transition: transform .2s;
}     /* Style the buttons */

    </style>

</head>
<body>

    <!-- Fixed navbar -->
     <nav style="margin-bottom: -75px" class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a  class="navbar-brand" href="index.php">  Aplikasi Pembayaran SPP</a>
          </div>                                                                                                                    
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav nav-pills pull-right">
              <li><a class="zoom" href="tampil_guru.php">Tampil Guru <img src="img/admin.png" style="width: 10px; margin-left: 2px"></a></li>
              <li><a class="zoom" href="tampil_walikelas.php">Tampil Walikelas <img src="img/admin.png" style="width: 10px; margin-left: 2px"></a></li>
              <li><a class="zoom" href="tampil_siswa.php">Tampil Siswa <img src="img/siswa.png" style="width: 14px; margin-left: 2px"></a></li>
              <li><a class="zoom" href="transaksi.php">Transaksi <img src="img/transaksi.png" style="width: 14px; margin-left: 2px"></a></li>
              <li><a class="zoom" href="laporan.php">Laporan <img src="img/laporan.png" style="width: 14px; margin-left: 2px"></a></li>
              <li><a class="zoom" href="logout.php">Logout <img src="img/logout.png" style="width: 14px; margin-left: 2px"></a></li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
          $('ul li a').click(function(){
            $('li a').removeClass("active");
            $(this).addClass("active");
        });
    });
    // Get the container element
var btnContainer = document.getElementById("myDIV");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("btn");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");

    // If there's no active class
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    this.className += " active";
  });
}
</script>