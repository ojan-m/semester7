<?php
session_start();
//koneksi kedatabase
include 'koneksi.php';

if (!isset($_SESSION['pelanggan']))
  {
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <title>Toko kue</title>
</head>
<body>
    <?php include 'menu.php'; ?>

    <!--konten -->
    <section class="hero" id="index.php">
        <main class="content">
            <h1>Setiap Gigitan Membawa Kebahagiaan</h1>
            <a href="#produk" class="cta">Beli Sekarang</a>
        </main>
    </section>

    <!-- about section -->
    <section id="about" class="about">
        <h2><span>Tentang</span> Kami</h2>
        <div class="row">
            <div class="about-img">
                <img src="foto_produk/about.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Kenapa memilih produk kami</h3>
                <p>Kami percaya bahwa kebahagiaan sejati dimulai dari gigitan pertama roti yang hangat dan lembut. Setiap produk di toko kami dibuat menggunakan bahan-bahan pilihan berkualitas tinggi, diproses secara higienis, dan dipanggang setiap hari demi menjaga kesegaran rasa yang autentik di setiap suapan.</p>
                <p>Dari aroma mentega pilihan yang harum hingga tekstur kue yang lumer di mulut, kami hadir untuk melengkapi setiap momen spesial bersama orang-orang tersayang.</p>
            </div>
        </div>
    </section>

    <!-- Bagian produk -->
    <section class="menu" id="produk">
        <h2>Menu <span>Produk Kami</span></h2>
        <div class="row">
                <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
                <?php while($perproduk = $ambil->fetch_assoc()){ ?>
                <!-- <pre><?php print_r($perproduk) ?></pre> -->
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
                            <div class="caption">
                                <h3><?php echo $perproduk['nama_produk']; ?></h3>
                                <h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
                                <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
                                <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-default">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>   
            </div>
    </section>

    <!-- Contact section -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Kami selalu siap mendengarkan dan membantu Anda. Hubungi kami untuk pemesanan khusus, kerja sama, atau kritik dan saran demi kenyamanan berbelanja Anda.</p>

        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126907.03761317559!2d106.80207945000002!3d-6.2841065499999935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1ec2422b0b3%3A0x39a0d0fe47404d02!2sJakarta%20Selatan%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1793023919998!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" class="map"></iframe>

            <form action="">
                <div class="input-group">
                    <!-- Menggunakan SVG langsung agar tidak gagal render -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <input type="text" placeholder="nama">
                </div>
                <div class="input-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    <input type="text" placeholder="email">
                </div>
                <div class="input-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    <input type="text" placeholder="no hp">
                </div>
                <button type="submit" class="btn">Kirim pesan</button>
            </form>
        </div>
    </section>

    <!-- footer -->
    <footer>
        <div class="socials">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
        </div>

        <div class="links">
            <a href="index.php">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#produk">Produk</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="credit">
            <p>Created by <a href="">GrupC</a>. | 2026.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
      });
    </script>
    <script src="js/script.js"></script>

</body>
</html>