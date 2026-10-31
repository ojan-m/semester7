<?php
session_start();
include 'koneksi.php';

// Jika parameter id tidak ada di URL, alihkan kembali ke index.php
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID Pembelian tidak ditemukan!');</script>";
    echo "<script>location='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota pembelian</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
</head>
<body>
    <?php include 'menu_nota.php'; ?>

    <!-- nota disini diambil dari ahalaman admin/detail.php -->
    <section class="konten-nota">
        <div class="container">
            <h2>Detail Pembelian</h2>
            <?php
            $ambil =$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>
            
            <!-- <pre><?php print_r($detail); ?></pre> -->
            <!-- jika pelanggan yang beli tidak sama dengan pelanggan yang login tidak bisa melihat transaksi orang lain -->
            <?php
            // mendapatkan id_pelanggan yang beli
            $idpelangganyangbeli = $detail["id_pelanggan"];
            // mendapatkan id_pelanggan yang login
            $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];
            if ($idpelangganyangbeli!==$idpelangganyanglogin) {
            echo "<script>alert('periksa kembali akun anda');<script>";
            echo "<script>location='riwayat.php';</script>";
            exit();
            }
            ?>

            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No. Pembelian: <?php echo $detail['id_pembelian'] ?></strong><br>
                    Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
                    Total: Rp. <?php echo $detail['total_pembelian']; ?>
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
                    <p>
                        <?php echo $detail['telepon_pelanggan']; ?><br>
                        <?php  echo $detail['email_pelanggan']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <strong><?php echo $detail['nama_ekspedisi'] ?? 'Ekspedisi Standard' ?></strong><br>
                    Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']);?><br>
                    Alamat: <?php echo $detail['alamat_pengiriman'] ?>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1; ?>
                    <?php $ambil=$koneksi->query("SELECT * FROM  pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                    <?php while($pecah=$ambil->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                        <td><?php echo $pecah['jumlah']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        <p>
                            Pembayaran berhasil 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
      feather.replace();
    </script>
    <script src="js/script.js"></script>

</body>
</html>