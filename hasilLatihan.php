<?php 
session_start();

    // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:login.php");
}
if($_SESSION['level']!="siswa") {
    header("location:login.php");
}
include_once("config.php");
$result = mysqli_query($conn, "SELECT * FROM latihan ORDER BY nama_latihan ASC");

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
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
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
                                    <a class="dropdown-item" href="gantiPasswordSiswa.php">
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
                                    <a href="indexSiswa.php">
                                        <i class="fa fa-home"></i> Beranda </a>
                                </li>
                                <li class="">
                                    <a href="materiSiswa.php">
                                        <i class="fa fa-book"></i> Materi </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-th-large"></i> Praktikum
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="latihanSiswa.php"> Latihan </a>
                                        </li>
                                        <li>
                                            <a href="tugasSiswa.php"> Tugas </a>
                                        </li>
                                        <li>
                                            <a href="hasilSiswa.php"> Upload Hasil Tugas </a>
                                        </li>
                                        <li>
                                            <a href="hasilLatihan.php"> Upload Hasil Latihan </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="evaluasiSiswa.php">
                                        <i class="fa fa-bar-chart"></i> Evaluasi </a>
                                </li>
                                <li class="">
                                    <a href="nilaiSiswa.php">
                                        <i class="fa fa-file-text"></i> Nilai </a>
                                </li>
                                <li class="">
                                    <a href="auth.php">
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
                            <div class="col-md-6">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Upload Hasil Latihan </h3>
                                    </div>
                                    <form id="tambah-form" action="prosesTambahHasilLatihan.php" method="POST" enctype="multipart/form-data">
                                        <?php
                                        $username = $_SESSION['username'];
                                        $cari = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
                                        $value = mysqli_fetch_array($cari);
                                        ?>
                                        <input type="hidden" name="nis" value="<?php echo $value['nis'] ?>">
                                        <div class="">
                                            <label class="control-label">Pilih latihan</label></div>
                                        <div class="form-group">
                                            <select name="nama_latihan">
                                                <?php if (mysqli_num_rows($result) > 0) { 
                                                    while ($data = mysqli_fetch_array($result)) {?>
                                                        <option> <?php echo $data['nama_latihan'] ?></option>
                                                        <?php
                                                        }
                                                    }
                                                        ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">File pdf</label>
                                            <input type="file" class="form-control underlined" name="berkas"></div>
                                        <div class="form-group col-md-4" >
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
        <script src="js/data-table-act.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
    </body>
</html>