<!-- navbar khusus halaman riwayat -->
<nav class="navbar">
    <a href="#" class="navbar-logo">Toko Kue <span>Seruni 88.</span></a>
    <div class="navbar-nav">
        <!-- Menu Home dibuat tidak bisa diklik -->
        <a href="index.php">Home</a>
        
        <!-- Menu Riwayat (aktif/tidak bisa diklik karena sedang berada di halaman riwayat) -->
        <a href="#" onclick="return false;" style="pointer-events: none; color: gray; cursor: default;">Riwayat</a>

        <!-- jika sudah login, hanya tombol Logout yang bisa diklik -->
        <?php if(isset($_SESSION["pelanggan"])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif ?>

        <!-- Menu Checkout dibuat tidak bisa diklik -->
        <a href="#" onclick="return false;" style="pointer-events: none; color: gray; cursor: default;">Kontak</a>
    </div>
    <div class="navbar-extra">
        <a href="keranjang.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
</nav>