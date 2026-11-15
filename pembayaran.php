<?php
session_start();
//koneksi kedatabase
include 'koneksi.php';
// jika belum login maka tidak bisa membuka pembayaran
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
    echo "<script>alert('silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

// mendapatkan id_pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

// mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
// mendapatkan id_pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];
if ($id_pelanggan_login !==$id_pelanggan_beli) {
    echo "<script>alert('Cek riwayat');</script>";
    echo "<script>location='riwayat.php';</script>";
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
    <title>Pembayaran</title>
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <h2>Konfirmasi Pembayaran</h2>
        <p>Kirim bukti pembayaran anda disini</p>
        <div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>
        <div class="alert alert-success">
            Silakan melakukan transfer pembayaran ke:<br>
            <strong>Bank BCA: 43167829 a.n. Bakery</strong>
        </div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="name" value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label>jumlah</label>
                <input type="jumlah" class="form-control" name="jumlah" value="<?php echo $detpem["total_pembelian"]; ?>"readonly>
            </div>
            <div class="form-group">
                <label>Foto Bukti</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger">Foto bukti pembayaran</p>
            </div>
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>

    <?php
    // jika tombol kirim diklik
    if (isset($_POST["kirim"])) {
        // upload foto bukti
        $namabukti = $_FILES["bukti"]["name"];
        $lokasibukti = $_FILES["bukti"]["tmp_name"];
        $namafiks = date("YmdHis").$namabukti;
        move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

        $nama = $_POST["name"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        $tanggal = date("Y-m-d");

        // simpan pembayaran
        $koneksi->query("INSERT INTO pembayaran(id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

        // update data pembelian dari pending menjadi sudah kirim pembayaran
        $koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'");
        
        echo "<script>alert('Bukti pembayaran berhasil dikirim');</script>";
        echo "<script>location='nota.php?id=$idpem';</script>";
    }
    ?>

    <script>
      feather.replace();
    </script>
    <script src="js/script.js"></script>
</body>
</html>