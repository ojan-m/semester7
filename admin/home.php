<?php
// Mengambil ringkasan data dari database
$ambil_produk = $koneksi->query("SELECT COUNT(*) AS total FROM produk");
$total_produk = $ambil_produk->fetch_assoc()['total'];

$ambil_pembelian = $koneksi->query("SELECT COUNT(*) AS total FROM pembelian");
$total_pembelian = $ambil_pembelian->fetch_assoc()['total'];

$ambil_pelanggan = $koneksi->query("SELECT COUNT(*) AS total FROM pelanggan");
$total_pelanggan = $ambil_pelanggan->fetch_assoc()['total'];

$ambil_omset = $koneksi->query("SELECT SUM(total_pembelian) AS total FROM pembelian WHERE status_pembelian != 'batal'");
$total_omset = $ambil_omset->fetch_assoc()['total'] ?? 0;
?>

<!-- Header / Welcome Banner -->
<div class="row">
    <div class="col-md-12">
        <div class="well style-welcome" style="background: linear-gradient(135deg, #e94646); color: white; border-radius: 1px; padding: 25px;">
            <h2 style="color: #ffffff"><i class="fa fa-dashboard"></i> Selamat Datang, Administrator!</h2>
            <p style="font-size: 11px; margin-top: 10px;">
                Panel Kelola Admin <strong>Toko Kue Seruni 88</strong>. Pantau statistik produk, pesanan pelanggan, dan laporan keuangan dalam satu tempat.
            </p>
        </div>
    </div>
</div>

<!-- Cards Dashboard Info -->
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-red set-icon">
                <i class="fa fa-desktop"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><?php echo number_format($total_produk); ?></p>
                <p class="text-muted">Total Produk</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-green set-icon">
                <i class="fa fa-shopping-cart"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><?php echo number_format($total_pembelian); ?></p>
                <p class="text-muted">Total Pesanan</p>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue set-icon">
                <i class="fa fa-users"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><?php echo number_format($total_pelanggan); ?></p>
                <p class="text-muted">Pelanggan</p>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-brown set-icon">
                <i class="fa fa-money"></i>
            </span>
            <div class="text-box">
                <p class="main-text" style="font-size: 18px; font-weight: bold;">Rp <?php echo number_format($total_omset); ?></p>
                <p class="text-muted">Total Omset</p>
            </div>
        </div>
    </div>
</div>

<hr />

<!-- Tabel Transaksi Terbaru & Quick Actions -->
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list"></i> <strong>Transaksi Terbaru</strong>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor = 1;
                            $ambil_terbaru = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan ORDER BY id_pembelian DESC LIMIT 5");
                            while ($pecah = $ambil_terbaru->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo htmlspecialchars($pecah['nama_pelanggan']); ?></td>
                                <td><?php echo date('d-m-Y', strtotime($pecah['tanggal_pembelian'])); ?></td>
                                <td>
                                    <?php if ($pecah['status_pembelian'] == 'sudah kirim pembayaran'): ?>
                                        <span class="label label-warning">Sudah Bayar</span>
                                    <?php elseif ($pecah['status_pembelian'] == 'lunas'): ?>
                                        <span class="label label-success">Lunas</span>
                                    <?php else: ?>
                                        <span class="label label-default"><?php echo htmlspecialchars($pecah['status_pembelian']); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>Rp <?php echo number_format($pecah['total_pembelian']); ?></td>
                                <td>
                                    <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-xs btn-info">Detail</a>
                                </td>
                            </tr>
                            <?php 
                            $nomor++;
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
                <a href="index.php?halaman=pembelian" class="btn btn-default btn-block">Lihat Semua Pembelian <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Quick Shortcuts / Pintasan Cepat -->
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bolt"></i> <strong>Pintasan Cepat</strong>
            </div>
            <div class="panel-body">
                <a href="index.php?halaman=tambahproduk" class="btn btn-primary btn-block text-left" style="text-align: left; margin-bottom: 10px;">
                    <i class="fa fa-plus-circle"></i> Tambah Produk Baru
                </a>
                <a href="index.php?halaman=produk" class="btn btn-success btn-block" style="text-align: left; margin-bottom: 10px;">
                    <i class="fa fa-desktop"></i> Kelola Kelengkapan Produk
                </a>
                <a href="index.php?halaman=laporan_pembelian" class="btn btn-info btn-block" style="text-align: left; margin-bottom: 10px;">
                    <i class="fa fa-file-text"></i> Lihat Laporan Penjualan
                </a>
                <a href="index.php?halaman=pelanggan" class="btn btn-warning btn-block" style="text-align: left;">
                    <i class="fa fa-users"></i> Data Pelanggan Registered
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function updateWaktuHome() {
        const sekarang = new Date();
        const opsi = { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
        document.getElementById('waktu-realtime-home').innerText = sekarang.toLocaleDateString('id-ID', opsi).replace(/\./g, ':');
    }
    updateWaktuHome();
    setInterval(updateWaktuHome, 1000);
</script>