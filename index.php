<?php

include 'konfig.php';
session_start();
if (isset($_SESSION['hak_akses']) == null) {
    ?>
    <html>
        <head>
            <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="font-awesome-4.1.0/css/font-awesome.min.css">
            <style type="text/css">
                body{
                    background-image: url(images/background.jpg);
                }

            </style>
            <title>Login Sistem Informasi Rumah Sakit ( Sirusak )</title>
        </head>
        <body>
            <div align="center">
                <br>
                <h1><label class="label label-info">Sistem Informasi Rumah Sakit</label></h1>


                <div align="center" style="width:320px;margin-top:5%;">
                    <form name="login_form" method="post" class="well well-lg" action="login.php" style="-webkit-box-shadow: 0px 0px 20px #888888;">
                        <i class="fa fa-hospital-o fa-5x fa-inverse" style="background-color: #76b4ff;padding: 20px 28px 20px 28px;border-radius: 50%;box-shadow: #ffffff -1px 2px 1px;"></i>
                        <br>
                        <br>
                        <?php
                        if(isset($_GET['error'])){
                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                      Password atau username kurang tepat
                                    </div>';
                        }
                                ?>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="username" id="username" class="form-control" type="text" placeholder="Username" autocomplete="off" autofocus="" />
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input name="password" id="password" class="form-control" type="password" placeholder="Password" autocomplete="off" />
                        </div>
                        <br />
                        <input name="submit" type="submit" value="Login" class="btn btn-primary btn-block">
                    </form>

                </div>
            </div>
            <br>
            <br>
            <br>

            <footer align="center">
                Copyright © 2024 Anggara Putra Meldyantono. All Rights Reserved 
            </footer>
        </body>
    </html>
    <?php
} else {
    if ($_SESSION['hak_akses'] == "Dokter") {
        header("location:dokter.php");
    } elseif ($_SESSION['hak_akses'] == "Admin") {
        header("location:admin.php");
    } elseif ($_SESSION['hak_akses'] == "Front Office") {
        header("location:front-office.php");
    } elseif ($_SESSION['hak_akses'] == "Departemen") {
        header("location:departemen.php");
    } elseif ($_SESSION['hak_akses'] == "Apoteker") {
        header("location:apoteker.php?view=tampil_obat");
    } elseif ($_SESSION['hak_akses'] == "perawat") {
        header("location:perawat.php");
    } else {
        echo 'user tidak ditemukan';
        session_destroy();
    }
}
?>
