<?php
session_start();
// mendapatkan id_produk dari url
$id_produk = $_GET['id'];
// jika sudah ada produk dikeranjang, maka produk itu jumlahnya +1
if(isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk]+=1;
}
// selain itu jika belum ada dikeranjang maka produk itu dianggap dibeli 1
else {
    $_SESSION['keranjang'][$id_produk] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// masukan produk ke keranjang belanja
echo "<script>alert('produk anda tersimpan');</script>";
echo "<script>location='keranjang.php';</script>"
?>