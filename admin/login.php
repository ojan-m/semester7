<?php  
session_start();
// skrip koneksi
include "../koneksi.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div style="text-align: center; margin-top: 9rem; margin-bottom: 0rem;">
        <h1 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 3.5rem; color: #333; margin: 0;">
            <span style="font-style: italic; color: #e67e22; font-weight: 900;">Toko Kue</span> 
            <span style="font-weight: 900; color: #2c3e50;">Seruni 88.</span>
        </h1>
    </div>
         <div class="row" style="margin-top: 5rem;">
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Login Admin</strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="user" />
                                        </div>
                                        <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="pass" />
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                            <span class="pull-right">
                                                   <a href="#" >Forget password ? </a> 
                                            </span>
                                        </div>
                                     
                                    <button class="btn btn-primary" name="login">Login</button> 
                                    </form>
                                    <?php
                                    if (isset($_POST['login']))
                                        {
                                            $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
                                            $yangcocok = $ambil->num_rows;
                                            if ($yangcocok==1) {
                                                $_SESSION['admin']=$ambil->fetch_assoc();
                                                echo "<div class='alert alert-info'>Login sukses</div>";
                                                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                            } // jika login gagal
                                            else {
                                                echo "<div class='alert alert-info'>Login gagal</div>";
                                                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                            }
                                        }
                                    ?>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
