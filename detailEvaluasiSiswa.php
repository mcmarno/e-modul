<?php 
session_start();

    // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:login.php");
}
if($_SESSION['level']!="siswa") {
    header("location:login.php");
}
include "config.php";
$user = $_SESSION['username'];
$ql = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
$sc = mysqli_fetch_array($ql);
$sesi = $sc['sesi'];
if ($sesi == 'ada')
{
    $kode = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM evaluasi WHERE kode_soal = $kode");
    $dat = mysqli_fetch_array($result);
}
else
{
    header("location:nilaiSiswa.php");
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
                                            <a href="hasilSiswa.php"> Hasil Laporan </a>
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
                                        <h3 class="title"> Soal Evaluasi </h3>
                                    </div>
                                    <form id="tambah-form" method="POST" action="cekEvaluasi.php">
                                        <div class="form-group">
                                            <input type="hidden" name="nis" value="<?php echo $_SESSION['username'] ?>">
                                            <input type="text" class="form-control underlined" value="<?php echo $dat['nama_soal'] ?>" readonly="readonly"></div>
                                        <?php
                                        $query1 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '1' ");
                                        $nomer1 = mysqli_fetch_array($query1);
                                        ?>
                                        <form action="cekEvaluasi.php" method="POST">
                                            <input type="hidden" class="form-control underlined" value="<?php echo $dat['kode_soal'] ?>" readonly="readonly" name="kode_soal">
                                            <div class="form-group">
                                                <label class="control-label">1. <?php echo $nomer1['soal'] ?></label>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios1" type="radio" value="A">
                                                        <span>A. <?php echo $nomer1['a'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios1" value="B">
                                                        <span>B. <?php echo $nomer1['b'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios1" type="radio" value="C">
                                                        <span>C. <?php echo $nomer1['c'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios1" value="D">
                                                        <span>D. <?php echo $nomer1['d'] ?></span>
                                                    </label>
                                                </div>
                                            </div>
                                        
                                        <?php
                                        $query2 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '2' ");
                                        $nomer2 = mysqli_fetch_array($query2);
                                        ?>
                                        
                                            <div class="form-group">
                                                <label class="control-label">2. <?php echo $nomer1['soal'] ?></label>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios2" type="radio" value="A">
                                                        <span>A. <?php echo $nomer2['a'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios2" value="B">
                                                        <span>B. <?php echo $nomer2['b'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios2" type="radio" value="C">
                                                        <span>C. <?php echo $nomer2['c'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios2" value="D">
                                                        <span>D. <?php echo $nomer2['d'] ?></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <?php
                                        $query3 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '3' ");
                                        $nomer3 = mysqli_fetch_array($query3);
                                        ?>
                                        
                                            <div class="form-group">
                                                <label class="control-label">3. <?php echo $nomer3['soal'] ?></label>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios3" type="radio" value="A">
                                                        <span>A. <?php echo $nomer3['a'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios3" value="B">
                                                        <span>B. <?php echo $nomer3['b'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios3" type="radio" value="C">
                                                        <span>C. <?php echo $nomer3['c'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios3" value="D">
                                                        <span>D. <?php echo $nomer3['d'] ?></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <?php
                                        $query4 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '4' ");
                                        $nomer4 = mysqli_fetch_array($query4);
                                        ?>
                                        
                                            <div class="form-group">
                                                <label class="control-label">4. <?php echo $nomer4['soal'] ?></label>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios4" type="radio" value="A">
                                                        <span>A. <?php echo $nomer4['a'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios4" value="B">
                                                        <span>B. <?php echo $nomer4['b'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios4" type="radio" value="C">
                                                        <span>C. <?php echo $nomer4['c'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios4" value="D">
                                                        <span>D. <?php echo $nomer4['d'] ?></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <?php
                                        $query5 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '5' ");
                                        $nomer5 = mysqli_fetch_array($query5);
                                        ?>
                                        
                                            <div class="form-group">
                                                <label class="control-label">5. <?php echo $nomer5['soal'] ?></label>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios5" type="radio" value="A">
                                                        <span>A. <?php echo $nomer5['a'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios5" value="B">
                                                        <span>B. <?php echo $nomer5['b'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios5" type="radio" value="C">
                                                        <span>C. <?php echo $nomer5['c'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios5" value="D">
                                                        <span>D. <?php echo $nomer5['d'] ?></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <?php
                                        $query6 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '6' ");
                                        $nomer6 = mysqli_fetch_array($query6);
                                        ?>
                                        
                                            <div class="form-group">
                                                <label class="control-label">6. <?php echo $nomer6['soal'] ?></label>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios6" type="radio" value="A">
                                                        <span>A. <?php echo $nomer6['a'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios6" value="B">
                                                        <span>B. <?php echo $nomer6['b'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios6" type="radio" value="C">
                                                        <span>C. <?php echo $nomer6['c'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios6" value="D">
                                                        <span>D. <?php echo $nomer6['d'] ?></span>
                                                    </label>
                                                </div>
                                            </div>


                                            <?php
                                        $query7 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '7' ");
                                        $nomer7 = mysqli_fetch_array($query7);
                                        ?>
                                        
                                            <div class="form-group">
                                                <label class="control-label">7. <?php echo $nomer7['soal'] ?></label>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios7" type="radio" value="A">
                                                        <span>A. <?php echo $nomer7['a'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios7" value="B">
                                                        <span>B. <?php echo $nomer7['b'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios7" type="radio" value="C">
                                                        <span>C. <?php echo $nomer7['c'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios7" value="D">
                                                        <span>D. <?php echo $nomer7['d'] ?></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <?php
                                        $query8 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '8' ");
                                        $nomer8 = mysqli_fetch_array($query8);
                                        ?>
                                        
                                            <div class="form-group">
                                                <label class="control-label">8. <?php echo $nomer8['soal'] ?></label>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios8" type="radio" value="A">
                                                        <span>A. <?php echo $nomer8['a'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios8" value="B">
                                                        <span>B. <?php echo $nomer8['b'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios8" type="radio" value="C">
                                                        <span>C. <?php echo $nomer8['c'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios8" value="D">
                                                        <span>D. <?php echo $nomer8['d'] ?></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <?php
                                        $query9 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '9' ");
                                        $nomer9 = mysqli_fetch_array($query9);
                                        ?>
                                        
                                            <div class="form-group">
                                                <label class="control-label">9. <?php echo $nomer9['soal'] ?></label>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios9" type="radio" value="A">
                                                        <span>A. <?php echo $nomer9['a'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios9" value="B">
                                                        <span>B. <?php echo $nomer9['b'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios9" type="radio" value="C">
                                                        <span>C. <?php echo $nomer9['c'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios9" value="D">
                                                        <span>D. <?php echo $nomer9['d'] ?></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <?php
                                        $query10 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = '$kode' AND nomer = '10' ");
                                        $nomer10 = mysqli_fetch_array($query10);
                                        ?>
                                        
                                            <div class="form-group">
                                                <label class="control-label">10. <?php echo $nomer10['soal'] ?></label>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios10" type="radio" value="A">
                                                        <span>A. <?php echo $nomer10['a'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios10" value="B">
                                                        <span>B. <?php echo $nomer10['b'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" name="radios10" type="radio" value="C">
                                                        <span>C. <?php echo $nomer10['c'] ?></span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="radio" type="radio" name="radios10" value="D">
                                                        <span>D. <?php echo $nomer10['d'] ?></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2" >
                                            <button type="submit" name="submit" class="btn btn-block btn-primary"> Hasil</button>
                                        </div>
                                        </form>
                                        
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
                            <li> created by
                                <a href="#">Widya Ayuningtyas</a>
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