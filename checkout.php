<?php
session_start();
include 'koneksi.php';

// jika belum login
if(!isset($_SESSION["pelanggan"])){
    echo "<script>alert('anda belum login');</script>";
    echo "<script>location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
</head>
<body>
    
    <?php include 'menu.php'; ?>
        
<section class="konten-checkout">
        <div class="container">
            <h1><i data-feather="shopping-cart" style="width: 35px; height: 35px; vertical-align: middle; margin-right: 10px;"></i>Keranjang belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach($_SESSION["keranjang"] as $id_produk=> $jumlah): ?>
                    <!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
                    <?php $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["harga_produk"]*$jumlah;
                    // echo "<pre>";
                    // print_r($pecah);
                    // echo "</pre>";
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["nama_produk"]; ?></td>
                        <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($subharga); ?></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php $totalbelanja+=$subharga; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja); ?></th>
                </tfoot>
            </table>
            
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="id_ongkir">
                                <option value="">Pilih Ongkos Kirim</option>
                                <?php
                                $ambil = $koneksi->query("SELECT * FROM ongkir");
                                while($perongkir = $ambil->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $perongkir["id_ongkir"]; ?>">
                                    <?php echo $perongkir['nama_ekspedisi'] ?>
                                    Rp. <?php echo number_format($perongkir['tarif']) ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap Pengirim</label>
                        <textarea name="alamat_pengiriman" class="form-control" placeholder="Masukan alamat lengkap anda" required><?php echo $_SESSION["pelanggan"]['alamat_pelanggan']; ?></textarea>
                    </div>
                </div>
                <button class="btn btn-primary" name="checkout">Checkout</button>
            </form>

            <?php
            if(isset($_POST["checkout"])) {
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $id_ongkir = $_POST["id_ongkir"];
                $tanggal_pembelian = date("y-m-d");
                $alamat_pengiriman = $_POST["alamat_pengiriman"];

                $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                $arrayongkir = $ambil->fetch_assoc();
                $nama_ekspedisi = $arrayongkir['nama_ekspedisi'];
                $tarif = $arrayongkir['tarif'];

                $total_pembelian = $totalbelanja + $tarif;

                //jika ongkos kirim belum dipilih
                if (empty($id_ongkir)) {
                    echo "<script>alert('Anda belum memilih ongkos kirim! Silakan pilih terlebih dahulu.');</script>";
                    echo "<script>location='checkout.php';</script>";
                    exit(); 
                }

                //menyimpan data ketable pembelian
                $koneksi->query("INSERT INTO pembelian(id_pelanggan,id_ongkir, tanggal_pembelian, total_pembelian, nama_ekspedisi, tarif, alamat_pengiriman, resi_pengiriman) VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_ekspedisi', '$tarif', '$alamat_pengiriman', '')");

                //mendapatkan id_pembelian yang telah terjadi
                $id_pembelian_barusan = $koneksi->insert_id;

                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                    //mendapatkan data produk berdasarkan id_produk
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'") or die($koneksi->error);
                    $perproduk = $ambil->fetch_assoc();

                    $nama = $perproduk['nama_produk'];
                    $harga = $perproduk['harga_produk'];
                        
                    $subharga = $perproduk['harga_produk']*$jumlah;
                    $koneksi->query("INSERT INTO pembelian_produk(id_pembelian, id_produk, nama, harga, subharga, jumlah) VALUES ('$id_pembelian_barusan', '$id_produk', '$nama', '$harga', '$subharga', '$jumlah')");

                    // skrip stok
                    $koneksi->query("UPDATE produk SET stok_produk=stok_produk - $jumlah WHERE id_produk='$id_produk'");
                }

                //mengkosongkan keranjang belanja
                unset($_SESSION["keranjang"]);

                //tampilkan dialihkan ke halaman nota
                echo "<script>alert('pembelian sukses');</script>";
                echo "<script>location='pembayaran.php?id=$id_pembelian_barusan';</script>";
            }
            ?>

        </div>
    </section>

    <!-- Script Feather Icons & Javascript Custom -->
    <script>
      feather.replace();
    </script>
    <script src="js/script.js"></script>

<!-- <pre><?php print_r($_SESSION['keranjang'])?></pre> -->
</body>
</html>