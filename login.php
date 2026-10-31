<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login pelanggan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container" style= "margin-top: 2rem;">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button class="btn btn-primary" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
// jika ada tompbol simpan ditekan
if(isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // lakukan query (mengecek akun ditabel pelanggan di database)
   $ambil =  $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

   // mencari akun yang cocok
   $akunyangcocok = $ambil->num_rows;

   // jika ada akun yang cocok anda bisa login
   if($akunyangcocok==1) {
    // anda sukses login dan mendapatkan akun dalam bentuk array
    $akun = $ambil->fetch_assoc();
    $_SESSION["pelanggan"] = $akun;
    echo "<script>alert('anda berhasil login');</script>";

    // jika sudah belanja
    if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) {
        echo "<script>location='checkout.php';</script>";
    } else {
        echo "<script>location='riwayat.php';</script>";
    }
   } else {
    // jika tidak punya akun anda gagal login
    echo "<script>alert('Anda gagal login dan lakukan pendaftaran terlebih dahulu');</script>";
    echo "<script>location='daftar.php';</script>";
   }
}

?>

    <script>
      feather.replace();
    </script>
    <script src="js/script.js"></script>

</body>
</html>