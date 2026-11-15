<!-- navbar -->
<nav class="navbar">
    <a href="#" class="navbar-logo">Toko Kue <span>Seruni 88.</span></a>
    <div class="navbar-nav">
        <a href="index.php">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#produk">Menu</a>
        <!-- jika sudah login ada session pelanggan -->
        <?php if(isset($_SESSION["pelanggan"])): ?>
            <a href="logout.php">Logout</a>
        <!-- selain itu jika belum login belum ada session pelanggan -->
        <?php else: ?>
        <a href="login.php">Login</a>
        <?php endif ?>
        <a href="#contact">Kontak</a>
    </div>
    <div class="navbar-extra">
        <a href="riwayat.php" title="Riwayat Belanja">
            <i data-feather="clock"></i>
        </a>
        <a href="keranjang.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
</nav>