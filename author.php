<?php 
session_start();

    // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:login.php");
}
if($_SESSION['level']!="guru") {
    header("location:login.php");
}

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
                <article class="content dashboard-page">
                    <section>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <p class="title"> Widya Ayuningtyas</p>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="container" style="text-align: center;" >
                                            <img src="images/auth.jpg" height="400" width="300">
                                        </div>
                                        <div class="">
                                        
                                        </div>
                                        <div align="justify">
                                            <p><b>Pendidikan:</b> Sarjana (S1) Pendidikan Teknologi Informasi 2015. Fakultas Psikologi dan Ilmu Pendidikan Universitas Muhammadiyah Sidoarjo.</p>
                                            <p><b>Aktivitas non-akademik:</b> aktif di organisasi kepemudaan dan makan - makan.</p>
                                            <p>Pengalaman pertama di Fakultas Psikologi dan Ilmu Pendidikan di Universitas Muhammadiyah, Sidoarjo. Saya mendapat kesempatan untuk menjadi ketua himpunan mahasiswa prodi pendidikan teknologi informasi pada semester 3.</p>
                                            <p>Saya juga diberi kesempatan oleh almarhum bapak kaprodi untuk dapat mengikuti semua kegiatan internasional yaitu KKN-PPl internasional di Negara Thailand Selatan tepatnya di Provinsi Yala pada tahun 2018.</p>
                                            <p>Pada kali ini saya akan membuat suatu pengembangan dan penelitian yang berjudul Pengembangan E-Modul Interaktif untuk Meningkatkan Motivasi Belajar Siswa Pada Mata Pelajaran Pemrograman Dasar Kelas X TKJ di Smk Negeri 1 Gempol.</p>
                                            <p>Saya membuat E-Modul interaktif ini bertujuan untuk mempermudah siswa dalam belajar dan mendalami materi pada mata pelajaran pemrograman dasar dan untuk menggerakkan gerakan adiwiyata untuk meminimalisir penggunaan kertas.</p> 
                                        </div>
                                    </div>
                                    
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