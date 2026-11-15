<?php
include 'koneksi.php';
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
    <title>Document</title>
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container" style="margin-top: 130px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-7">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>         
                            <div class="form-group">
                                <label class="control-label col-md-3">Alamat</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" name="alamat" required></textarea>
                                </div>
                            </div>         
                            <div class="form-group">
                                <label class="control-label col-md-3">Telp/HP</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="telepon" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button class="btn btn-primary" name="daftar">Daftar</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        // jika tombol daftar diklik
                        if (isset($_POST["daftar"])) {
                            $nama = $_POST["nama"];
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $alamat = $_POST["alamat"];
                            $telepon = $_POST["telepon"];

                            // cek apakah email sudah digunakan
                            $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok==1) {
                                echo "<script>alert('Email sudah digunakan');</script>";
                                echo "<script>location='daftar.php';</script>";
                            } else {
                                // query insert ketable pelanggan
                                $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES('$email', '$password', '$nama', '$telepon', '$alamat')");
                                echo "<script>alert('Silahkan login');</script>";
                                echo "<script>location='login.php';</script>";
                            }            
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
      feather.replace();
    </script>
    <script src="js/script.js"></script>
</body>
</html>