<?php
session_start();
//koneksi kedatabase
$koneksi = new mysqli("localhost", "root", "", "semester7");

if (!isset($_SESSION['admin']))
  {
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
  }
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toko Kue</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  </head>
  <body>
    <div id="wrapper">
      <nav
        class="navbar navbar-default navbar-cls-top"
        role="navigation"
        style="margin-bottom: 0"
      >
        <div class="navbar-header">
          <button
            type="button"
            class="navbar-toggle"
            data-toggle="collapse"
            data-target=".sidebar-collapse"
          >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><i class="bi bi-cake-fill"></i> Toko Kue</a>
        </div>
        <div
          style="
            color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;
          "
        >
          Last access : 27 sep 2026 &nbsp;
          <a href="login.html" class="btn btn-danger square-btn-adjust"
            >Logout</a
          >
        </div>
      </nav>
      <!-- /. NAV TOP  -->
      <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
          <ul class="nav" id="main-menu">

            <li><a href="index.php"> Home</a></li>
            <li><a href="index.php?halaman=produk"> Produk</a></li>
            <li><a href="index.php?halaman=pembelian"> Pembelian</a></li>
            <li><a href="index.php?halaman=pelanggan"> Pelanggan</a></li>
            <li><a href="index.php?halaman=logout"> Logout</a></li>
            
          </ul>
        </div>
      </nav>
      <!-- /. NAV SIDE  -->
      <div id="page-wrapper">
        <div id="page-inner">
          <?php 
          if (isset($_GET['halaman']))
          {
            if($_GET['halaman']=="produk")
              {
                include 'produk.php';
              }
            elseif ($_GET['halaman']=="pembelian")
            {
              include 'pembelian.php';
            }
            elseif ($_GET['halaman']=="pelanggan")
            {
              include 'pelanggan.php';
            }
            elseif ($_GET['halaman']=="detail")
            {
              include 'detail.php';
            }
            elseif ($_GET['halaman']=="tambahproduk")
            {
              include 'tambahproduk.php';
            }
            elseif ($_GET['halaman']=="tambahpelanggan")
            {
              include 'tambahpelanggan.php';
            }
            elseif ($_GET['halaman']=="hapusproduk")
            {
              include 'hapusproduk.php';
            }
            elseif ($_GET['halaman']=="ubahproduk")
            {
              include 'ubahproduk.php';
            }
            elseif ($_GET['halaman']=="hapuspelanggan")
            {
              include 'hapuspelanggan.php';
            }
            elseif ($_GET['halaman']=="logout")
            {
              include 'logout.php';
            }
          }
          else {
            include'home.php';
          } ?>
        </div>
        <!-- /. PAGE INNER  -->
      </div>
      <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
  </body>
</html>
