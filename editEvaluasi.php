<?php 
session_start();

    // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:login.php");
}
if($_SESSION['level']!="guru") {
    header("location:login.php");
}
include "config.php";
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM evaluasi WHERE kode_soal = $id");
$data = mysqli_fetch_array($query);
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> e-modul pemrograman dasar kelas X TKJ </title>
        <link rel="icon" type="image/png" href="assets/icon.png">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <!-- Theme initialization -->
        <link rel="stylesheet" href="css/app-blue.css">
    </head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div></div>
                                    <span class="name"> <?php echo $_SESSION['username']; ?> </span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="gantiPassword.php">
                                        <i class="fa fa-key icon"></i> Ganti Password </a>
                                    <a class="dropdown-item" href="logout.php">
                                        <i class="fa fa-power-off icon"></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div>
                                    <img src="assets/logosmk.png" width="30" height="30"> E-modul Online
                                </div>
                            </div>
                        </div>
                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                <li class="">
                                    <a href="index.php">
                                        <i class="fa fa-home"></i> Beranda </a>
                                </li>
                                <li class="">
                                    <a href="materi.php">
                                        <i class="fa fa-book"></i> Materi </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-th-large"></i> Praktikum
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="latihan.php"> Latihan </a>
                                        </li>
                                        <li>
                                            <a href="tugas.php"> Tugas </a>
                                        </li>
                                         <li>
                                            <a href="hasil.php"> Hasil Tugas </a>
                                        </li>
                                        <li>
                                            <a href="hasil-latihan.php"> Hasil Latihan </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="evaluasi.php">
                                        <i class="fa fa-bar-chart"></i> Evaluasi  </a>
                                </li>
                                <li class="">
                                    <a href="nilai.php">
                                        <i class="fa fa-list-alt"></i> Nilai </a>
                                </li>
                                <li class="">
                                    <a href="siswa.php">
                                        <i class="fa fa-user"></i> Siswa </a>
                                </li>
                                <li class="">
                                    <a href="users.php">
                                        <i class="fa fa-users"></i> Users </a>
                                </li>
                                <li class="">
                                    <a href="author.php">
                                        <i class="fa fa-phone"></i> Author </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="sidebar-menu metismenu" id="customize-menu">
                            <li>
                                <a href="logout.php">
                                    <i class="fa fa-power-off"></i> Logout </a>
                            </li>
                        </ul>
                    </footer>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content forms-page">
                 <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Edit Data Evaluasi </h3>
                                        <p>Perhatikan dengan baik pemilihan soal dan jawaban</p>
                                    </div>
                                    <form id="tambah-form" action="prosesEditEvaluasi.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="control-label">Kode</label>
                                            <input type="text" class="form-control underlined" name="kode_soal" value="<?php echo $data['kode_soal'] ?>" readonly="readonly"></div>
                                        <div class="form-group">
                                            <label class="control-label">Nama</label>
                                            <input type="text" class="form-control underlined" name="nama_soal" value="<?php echo $data['nama_soal'] ?>"></div>
                                        <?php
                                        $query1 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$id' AND nomer = 1");
                                        $nomer1 = mysqli_fetch_array($query1);
                                        ?>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 1</label>
                                            <input type="text" class="form-control underlined" name="soal1" value="<?php echo $nomer1['soal'] ?>"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 1</label>
                                            <input type="text" class="form-control underlined" name="kunci1" value="<?php echo $nomer1['kunci'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab1a" value="<?php echo $nomer1['a'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab1b" value="<?php echo $nomer1['b'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab1c" value="<?php echo $nomer1['c'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab1d" value="<?php echo $nomer1['d'] ?>"></div>
                                        <?php
                                        $query2 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$id' AND nomer = 2");
                                        $nomer2 = mysqli_fetch_array($query2);
                                        ?>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 2</label>
                                            <input type="text" class="form-control underlined" name="soal2" value="<?php echo $nomer2['soal'] ?>"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 2</label>
                                            <input type="text" class="form-control underlined" name="kunci2" value="<?php echo $nomer2['kunci'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab2a" value="<?php echo $nomer2['a'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab2b" value="<?php echo $nomer2['b'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab2c" value="<?php echo $nomer2['c'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab2d" value="<?php echo $nomer2['d'] ?>"></div>
                                        <?php
                                        $query3 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$id' AND nomer = 3");
                                        $nomer3 = mysqli_fetch_array($query3);
                                        ?>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 3</label>
                                            <input type="text" class="form-control underlined" name="soal3" value="<?php echo $nomer3['soal'] ?>"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 3</label>
                                            <input type="text" class="form-control underlined" name="kunci3" value="<?php echo $nomer3['kunci'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab3a" value="<?php echo $nomer3['a'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab3b" value="<?php echo $nomer3['b'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab3c" value="<?php echo $nomer3['c'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab3d" value="<?php echo $nomer3['d'] ?>"></div>
                                        <?php
                                        $query4 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$id' AND nomer = 4");
                                        $nomer4 = mysqli_fetch_array($query4);
                                        ?>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 4</label>
                                            <input type="text" class="form-control underlined" name="soal4" value="<?php echo $nomer4['soal'] ?>"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 4</label>
                                            <input type="text" class="form-control underlined" name="kunci4" value="<?php echo $nomer4['kunci'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab4a" value="<?php echo $nomer4['a'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab4b" value="<?php echo $nomer4['b'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab4c" value="<?php echo $nomer4['c'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab4d" value="<?php echo $nomer4['d'] ?>"></div>
                                        <?php
                                        $query5 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$id' AND nomer = 5");
                                        $nomer5 = mysqli_fetch_array($query5);
                                        ?>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 5</label>
                                            <input type="text" class="form-control underlined" name="soal5" value="<?php echo $nomer5['soal'] ?>"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 5</label>
                                            <input type="text" class="form-control underlined" name="kunci5" value="<?php echo $nomer5['kunci'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab5a" value="<?php echo $nomer5['a'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab5b" value="<?php echo $nomer5['b'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab5c" value="<?php echo $nomer5['c'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab5d" value="<?php echo $nomer5['d'] ?>"></div>
                                        <?php
                                        $query6 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$id' AND nomer = 6");
                                        $nomer6 = mysqli_fetch_array($query6);
                                        ?>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 6</label>
                                            <input type="text" class="form-control underlined" name="soal6" value="<?php echo $nomer6['soal'] ?>"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 6</label>
                                            <input type="text" class="form-control underlined" name="kunci6" value="<?php echo $nomer6['kunci'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab6a" value="<?php echo $nomer6['a'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab6b" value="<?php echo $nomer6['b'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab6c" value="<?php echo $nomer6['c'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab6d" value="<?php echo $nomer6['d'] ?>"></div>
                                        <?php
                                        $query7 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$id' AND nomer = 7");
                                        $nomer7 = mysqli_fetch_array($query7);
                                        ?>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 7</label>
                                            <input type="text" class="form-control underlined" name="soal7" value="<?php echo $nomer7['soal'] ?>"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 7</label>
                                            <input type="text" class="form-control underlined" name="kunci7" value="<?php echo $nomer7['kunci'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab7a" value="<?php echo $nomer7['a'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab7b" value="<?php echo $nomer7['b'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab7c" value="<?php echo $nomer7['c'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab7d" value="<?php echo $nomer7['d'] ?>"></div>
                                        <?php
                                        $query8 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$id' AND nomer = 8");
                                        $nomer8 = mysqli_fetch_array($query8);
                                        ?>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 8</label>
                                            <input type="text" class="form-control underlined" name="soal8" value="<?php echo $nomer8['soal'] ?>"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 8</label>
                                            <input type="text" class="form-control underlined" name="kunci8" value="<?php echo $nomer8['kunci'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab8a" value="<?php echo $nomer8['a'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab8b" value="<?php echo $nomer8['b'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab8c" value="<?php echo $nomer8['c'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab8d" value="<?php echo $nomer8['d'] ?>"></div>
                                        <?php
                                        $query9 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$id' AND nomer = 9");
                                        $nomer9 = mysqli_fetch_array($query9);
                                        ?>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 9</label>
                                            <input type="text" class="form-control underlined" name="soal9" value="<?php echo $nomer9['soal'] ?>"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 9</label>
                                            <input type="text" class="form-control underlined" name="kunci9" value="<?php echo $nomer9['kunci'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab9a" value="<?php echo $nomer9['a'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab9b" value="<?php echo $nomer9['b'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab9c" value="<?php echo $nomer9['c'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab9d" value="<?php echo $nomer9['d'] ?>"></div>
                                        <?php
                                        $query10 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$id' AND nomer = 10");
                                        $nomer10 = mysqli_fetch_array($query10);
                                        ?>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 10</label>
                                            <input type="text" class="form-control underlined" name="soal10" value="<?php echo $nomer10['soal'] ?>"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 10</label>
                                            <input type="text" class="form-control underlined" name="kunci10" value="<?php echo $nomer10['kunci'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab10a" value="<?php echo $nomer10['a'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab10b" value="<?php echo $nomer10['b'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab10c" value="<?php echo $nomer10['c'] ?>"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab10d" value="<?php echo $nomer10['d'] ?>"></div>

                                        <div class="form-group col-md-2" >
                                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
                <footer class="footer">
                    <div></div>
                    <div class="footer-block author">
                        <ul>
                            <li>
                                Copyright &copy 2019 Pemrograman dasar
                            </li>
                        </ul>
                    </div>
                </footer>
        <script>
            (function(i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function()
                {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-80463319-4', 'auto');
            ga('send', 'pageview');
        </script>
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>