<?php
session_start();
//koneksi kedatabase
include 'koneksi.php';

// jika belum login maka tidak bisa membuka riwayat
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
    echo "<script>alert('silahkan login');</script>";
    echo "<script>location='login.php';</script>";
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
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <title>riwayat</title>
</head>
<body>
    <?php include 'menu_riwayat.php'; ?>
    
    <!-- <pre><?php print_r($_SESSION) ?></pre> -->
    <section class="riwayat">
        <div class="container">
            <h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Mendapatkan id_pelanggan yang login secara benar dari array sesi
                    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];

                    // Cek apakah pelanggan sudah pernah melakukan pembelian atau belum
                    $cek_pembelian = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                    $jumlah_transaksi = $cek_pembelian->num_rows;

                    // Jika belum ada pembelian sama sekali, alihkan kembali dan beri peringatan
                    if ($jumlah_transaksi == 0) {
                        echo "<script>alert('Anda belum memiliki riwayat belanja. Silakan lakukan pembelian terlebih dahulu!');</script>";
                        echo "<script>location='index.php';</script>";
                        exit();
                    }

                    $nomor = 1;
                    $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                    while($pecah = $ambil->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["tanggal_pembelian"] ?></td>
                        <td>
                            <?php echo $pecah["status_pembelian"] ?><br>
                            <?php if (!empty($pecah['resi_pengiriman'])): ?>
                                Resi: <?php echo $pecah['resi_pengiriman']; ?>
                            <?php endif ?>
                        </td>
                        <td>Rp. <?php echo number_format($pecah["total_pembelian"])  ?></td>
                        <td>
                            <a href="index.php" class="btn btn-primary">Beli</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

    <script>
      feather.replace();
    </script>
    <script src="js/script.js"></script>
</body>
</html>