<!-- navbar khusus halaman nota -->
<nav class="navbar">
    <a href="#" class="navbar-logo">Toko Kue <span>Seruni 88.</span></a>
    <div class="navbar-nav">
        <!-- Menu Home dan Checkout dibuat tidak bisa diklik sesuai permintaan sebelumnya -->
        <!-- <a href="#" onclick="return false;" style="pointer-events: none; color: gray; cursor: default;">Home</a>
         -->
        <a href="index.php">Home</a>
        <!-- Menu Riwayat menggantikan Tentang Kami dan Produk khusus di nota -->
        <a href="riwayat.php">Riwayat</a>

        <!-- jika sudah login ada session pelanggan -->
        <?php if(isset($_SESSION["pelanggan"])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif ?>

        <a href="#" onclick="return false;" style="pointer-events: none; color: gray; cursor: default;">Kontak</a>
    </div>
    <div class="navbar-extra">
        <a href="keranjang.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
</nav>