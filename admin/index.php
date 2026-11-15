<?php
session_start();
// Set zona waktu ke Indonesia WIB (Jakarta)
date_default_timezone_set('Asia/Jakarta');

//koneksi kedatabase
include "../koneksi.php";

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
          <a class="navbar-brand" href="index.php"><i class="bi bi-cake-fill"></i> Toko Kue Seruni 88.</a>
        </div>
        <div
          style="
            color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;
          "
        >
        </div>
      </nav>
      
      
      <!-- NAV SIDEBAR / COLLAPSIBLE MENU -->
      <nav class="navbar-default navbar-side " role="navigation">
        <div class="sidebar-collapse navbar-collapse">
          <ul class="nav" id="main-menu">

            <!-- Bagian Profil / Ikon di bawah Logo -->
            <li class="text-center" style="padding: 25px 0; background: #222; border-bottom: 1px solid #333;">
              <div style="background: #e74c3c; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 10px auto; line-height: 60px;">
                <i class="bi bi-cake2-fill" style="font-size: 30px; color: #ffffff;"></i>
              </div>
              <h5 style="color: #ffffff; margin: 0 0 5px 0; font-weight: bold; font-size: 16px;">Administrator</h5>
              <span style="font-size: 12px; color: #aaaaaa; letter-spacing: 0.5px;">Toko Kue Seruni 88</span>
            </li>

            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="index.php?halaman=produk"><i class="fa fa-desktop"></i> Produk</a></li>
            <li><a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i> Pembelian</a></li>
            <li><a href="index.php?halaman=laporan_pembelian"><i class="fa fa-file"></i> Laporan</a></li>
            <li><a href="index.php?halaman=pelanggan"><i class="fa fa-users"></i> Pelanggan</a></li>
            <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a></li>
            <li class="visible-xs visible-sm" style="padding: 15px 20px; color: #777; border-top: 1px solid #e7e7e7; margin-top: 10px; font-size: 13px;">
              <i class="fa fa-clock-o"></i> Last access : <?php echo date('d M Y | H:i'); ?>
            </li>
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
            elseif ($_GET['halaman']=="pembayaran")
            {
              include 'pembayaran.php';
            }
            elseif ($_GET['halaman']=="laporan_pembelian")
            {
              include 'laporan_pembelian.php';
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
    <script>
      function updateWaktu() {
        const sekarang = new Date();

        // Format Tanggal
        const opsi = { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
        const waktuFormatted = sekarang.toLocaleDateString('id-ID', opsi).replace(/\./g, ':');

        document.getElementById('waktu-realtime').innerText = waktuFormatted;
      }

      // Jalankan fungsi saat pertama dimuat
      updateWaktu();

      // Perbarui waktu setiap 1000ms (1 detik)
      setInterval(updateWaktu, 1000);

    $(document).ready(function () {
      // Reset state collapse saat layar diperbesar ke mode desktop (>= 992px)
      $(window).resize(function () {
          if ($(window).width() >= 992) {
              $('.navbar-side .navbar-collapse').removeClass('in').css('height', '');
          }
      });
    });
    </script>
  </body>
</html>
