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
$kode = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM evaluasi WHERE kode_soal = $kode");
$dat = mysqli_fetch_array($result);


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
                                        <h3 class="title"> Data Evaluasi </h3>
                                    </div>
                                    <form id="tambah-form">
                                        <div class="form-group">
                                            <label class="control-label">Nama</label>
                                            <input type="text" class="form-control underlined" value="<?php echo $dat['nama_soal'] ?>" readonly="readonly"></div>
                                        <?php
                                        $query1 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '1' ");
                                        $nomer1 = mysqli_fetch_array($query1);
                                        
                                        echo "<div><b>1. " .$nomer1['soal']. "</b></div>";
                                        echo "<div ><i>kunci : " .$nomer1['kunci']. "</i></div>";
                                        echo "<div>A. ".$nomer1['a']."</div>";
                                        echo "<div>B. ".$nomer1['b']."</div>";
                                        echo "<div>C. ".$nomer1['c']."</div>";
                                        echo "<div>D. ".$nomer1['d']."</div>";

                                        $query2 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '2' ");
                                        $nomer2 = mysqli_fetch_array($query2);
                                        
                                        echo "<div><b>2. " .$nomer2['soal']. "</b></div>";
                                        echo "<div ><i>kunci : " .$nomer2['kunci']. "</i></div>";
                                        echo "<div>A. ".$nomer2['a']."</div>";
                                        echo "<div>B. ".$nomer2['b']."</div>";
                                        echo "<div>C. ".$nomer2['c']."</div>";
                                        echo "<div>D. ".$nomer2['d']."</div>";

                                        $query3 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '3' ");
                                        $nomer3 = mysqli_fetch_array($query3);
                                        
                                        echo "<div><b>3. " .$nomer3['soal']. "</b></div>";
                                        echo "<div ><i>kunci : " .$nomer3['kunci']. "</i></div>";
                                        echo "<div>A. ".$nomer3['a']."</div>";
                                        echo "<div>B. ".$nomer3['b']."</div>";
                                        echo "<div>C. ".$nomer3['c']."</div>";
                                        echo "<div>D. ".$nomer3['d']."</div>"; 

                                        $query4 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '4' ");
                                        $nomer4 = mysqli_fetch_array($query4);
                                        
                                        echo "<div><b>4. " .$nomer4['soal']. "</b></div>";
                                        echo "<div ><i>kunci : " .$nomer4['kunci']. "</i></div>";
                                        echo "<div>A. ".$nomer4['a']."</div>";
                                        echo "<div>B. ".$nomer4['b']."</div>";
                                        echo "<div>C. ".$nomer4['c']."</div>";
                                        echo "<div>D. ".$nomer4['d']."</div>"; 

                                        $query5 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '5' ");
                                        $nomer5 = mysqli_fetch_array($query5);
                                        
                                        echo "<div><b>5. " .$nomer5['soal']. "</b></div>";
                                        echo "<div ><i>kunci : " .$nomer5['kunci']. "</i></div>";
                                        echo "<div>A. ".$nomer5['a']."</div>";
                                        echo "<div>B. ".$nomer5['b']."</div>";
                                        echo "<div>C. ".$nomer5['c']."</div>";
                                        echo "<div>D. ".$nomer5['d']."</div>"; 

                                        $query6 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '6' ");
                                        $nomer6 = mysqli_fetch_array($query6);
                                        
                                        echo "<div><b>6. " .$nomer6['soal']. "</b></div>";
                                        echo "<div ><i>kunci : " .$nomer6['kunci']. "</i></div>";
                                        echo "<div>A. ".$nomer6['a']."</div>";
                                        echo "<div>B. ".$nomer6['b']."</div>";
                                        echo "<div>C. ".$nomer6['c']."</div>";
                                        echo "<div>D. ".$nomer6['d']."</div>"; 

                                        $query7 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '7' ");
                                        $nomer7 = mysqli_fetch_array($query7);
                                        
                                        echo "<div><b>7. " .$nomer7['soal']. "</b></div>";
                                        echo "<div ><i>kunci : " .$nomer7['kunci']. "</i></div>";
                                        echo "<div>A. ".$nomer7['a']."</div>";
                                        echo "<div>B. ".$nomer7['b']."</div>";
                                        echo "<div>C. ".$nomer7['c']."</div>";
                                        echo "<div>D. ".$nomer7['d']."</div>"; 

                                        $query8 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '8' ");
                                        $nomer8 = mysqli_fetch_array($query8);
                                        
                                        echo "<div><b>8. " .$nomer8['soal']. "</b></div>";
                                        echo "<div ><i>kunci : " .$nomer8['kunci']. "</i></div>";
                                        echo "<div>A. ".$nomer8['a']."</div>";
                                        echo "<div>B. ".$nomer8['b']."</div>";
                                        echo "<div>C. ".$nomer8['c']."</div>";
                                        echo "<div>D. ".$nomer8['d']."</div>";

                                        $query9 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '9' ");
                                        $nomer9 = mysqli_fetch_array($query9);
                                        
                                        echo "<div><b>9. " .$nomer9['soal']. "</b></div>";
                                        echo "<div ><i>kunci : " .$nomer9['kunci']. "</i></div>";
                                        echo "<div>A. ".$nomer9['a']."</div>";
                                        echo "<div>B. ".$nomer9['b']."</div>";
                                        echo "<div>C. ".$nomer9['c']."</div>";
                                        echo "<div>D. ".$nomer9['d']."</div>"; 

                                        $query10 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '10' ");
                                        $nomer10 = mysqli_fetch_array($query10);
                                        
                                        echo "<div><b>10. " .$nomer10['soal']. "</b></div>";
                                        echo "<div ><i>kunci : " .$nomer10['kunci']. "</i></div>";
                                        echo "<div>A. ".$nomer10['a']."</div>";
                                        echo "<div>B. ".$nomer10['b']."</div>";
                                        echo "<div>C. ".$nomer10['c']."</div>";
                                        echo "<div>D. ".$nomer10['d']."</div>";    
                                        ?>
                                        
                                       
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