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
    <div style="text-align: center; margin-top: 3rem; margin-bottom: 0rem;">
        <h1 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 3.5rem; color: #333; margin: 0;">
            <span style="font-style: italic; color: #e67e22; font-weight: 900;">Toko Kue</span> 
            <span style="font-weight: 900; color: #2c3e50;">Seruni 88.</span>
        </h1>
    </div>

    <div class="container" style="margin-top: 5rem; display: flex; justify-content: center; align-items: flex-start; min-height: auto; padding-bottom: 3rem;">
        <div style="width: 100%; max-width: 450px; padding: 0 15px;">
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
                            <div class="text-center" style="display: flex; justify-content: space-between; margin-top: 10px;">
                                <!-- <a href="lupa_password.php">Lupa Password?</a> -->
                                <a href="daftar.php">Belum punya akun? Daftar</a>
                            </div>
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
        echo "<script>location='index.php';</script>";
    }
   } else {
    // jika gagal login, tetap di halaman login.php dan beri peringatan
        echo "<script>alert('Gagal login, Email atau Password Anda salah!');</script>";
        echo "<script>location='login.php';</script>";
    }
}

?>

    <script>
      feather.replace();
    </script>
    <script src="js/script.js"></script>

</body>
</html>