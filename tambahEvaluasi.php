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
$carikode = mysqli_query($conn, "SELECT kode_soal from evaluasi") or die (mysqli_error());
  // menjadikannya array
$datakode = mysqli_fetch_array($carikode);
$jumlah_data = mysqli_num_rows($carikode);
  // jika $datakode
if ($datakode) {
   // membuat variabel baru untuk mengambil kode barang mulai dari 1
   $nilaikode = substr($jumlah_data[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $jumlah_data + 1;
   // hasil untuk menambahkan kode 
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
   $kode_otomatis = "".str_pad($kode, STR_PAD_LEFT);
} else {
   $kode_otomatis = "1";
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
                <article class="content forms-page">
                 <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title"> Tambah Data Evaluasi </h3>
                                        <p>Perhatikan dengan baik pemilihan soal dan jawaban</p>
                                    </div>
                                    <form id="tambah-form" action="prosesTambahEvaluasi.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="control-label">Kode</label>
                                            <input type="text" class="form-control underlined" name="kode_soal" value="<?php echo $kode_otomatis; ?>" readonly="readonly"></div>
                                        <div class="form-group">
                                            <label class="control-label">Nama</label>
                                            <input type="text" class="form-control underlined" name="nama_soal"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 1</label>
                                            <input type="text" class="form-control underlined" name="soal1" placeholder="soal nomer 1"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 1</label>
                                            <input type="text" class="form-control underlined" name="kunci1" placeholder="kunci jawaban (A/B/C/D)"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab1a" placeholder="pilihan jawaban A"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab1b" placeholder="pilihan jawaban B"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab1c" placeholder="pilihan jawaban C"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab1d" placeholder="pilihan jawaban D"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 2</label>
                                            <input type="text" class="form-control underlined" name="soal2" placeholder="soal nomer 2"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 2</label>
                                            <input type="text" class="form-control underlined" name="kunci2" placeholder="kunci jawaban (A/B/C/D)"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab2a" placeholder="pilihan jawaban A"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab2b" placeholder="pilihan jawaban B"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab2c" placeholder="pilihan jawaban C"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab2d" placeholder="pilihan jawaban D"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 3</label>
                                            <input type="text" class="form-control underlined" name="soal3" placeholder="soal nomer 3"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 3</label>
                                            <input type="text" class="form-control underlined" name="kunci3" placeholder="kunci jawaban (A/B/C/D)"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab3a" placeholder="pilihan jawaban A"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab3b" placeholder="pilihan jawaban B"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab3c" placeholder="pilihan jawaban C"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab3d" placeholder="pilihan jawaban D"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 4</label>
                                            <input type="text" class="form-control underlined" name="soal4" placeholder="soal nomer 4"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 4</label>
                                            <input type="text" class="form-control underlined" name="kunci4" placeholder="kunci jawaban (A/B/C/D)"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab4a" placeholder="pilihan jawaban A"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab4b" placeholder="pilihan jawaban B"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab4c" placeholder="pilihan jawaban C"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab4d" placeholder="pilihan jawaban D"></div>
                                            <div class="form-group" >
                                            <label class="control-label">Nomer 5</label>
                                            <input type="text" class="form-control underlined" name="soal5" placeholder="soal nomer 5"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 5</label>
                                            <input type="text" class="form-control underlined" name="kunci5" placeholder="kunci jawaban (A/B/C/D)"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab5a" placeholder="pilihan jawaban A"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab5b" placeholder="pilihan jawaban B"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab5c" placeholder="pilihan jawaban C"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab5d" placeholder="pilihan jawaban D"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 6</label>
                                            <input type="text" class="form-control underlined" name="soal6" placeholder="soal nomer 6"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 6</label>
                                            <input type="text" class="form-control underlined" name="kunci6" placeholder="kunci jawaban (A/B/C/D)"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab6a" placeholder="pilihan jawaban A"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab6b" placeholder="pilihan jawaban B"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab6c" placeholder="pilihan jawaban C"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab6d" placeholder="pilihan jawaban D"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 7</label>
                                            <input type="text" class="form-control underlined" name="soal7" placeholder="soal nomer 7"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 7</label>
                                            <input type="text" class="form-control underlined" name="kunci7" placeholder="kunci jawaban (A/B/C/D)"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab7a" placeholder="pilihan jawaban A"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab7b" placeholder="pilihan jawaban B"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab7c" placeholder="pilihan jawaban C"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab7d" placeholder="pilihan jawaban D"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 8</label>
                                            <input type="text" class="form-control underlined" name="soal8" placeholder="soal nomer 8"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 8</label>
                                            <input type="text" class="form-control underlined" name="kunci8" placeholder="kunci jawaban (A/B/C/D)"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab8a" placeholder="pilihan jawaban A"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab8b" placeholder="pilihan jawaban B"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab8c" placeholder="pilihan jawaban C"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab8d" placeholder="pilihan jawaban D"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 9</label>
                                            <input type="text" class="form-control underlined" name="soal9" placeholder="soal nomer 9"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 9</label>
                                            <input type="text" class="form-control underlined" name="kunci9" placeholder="kunci jawaban (A/B/C/D)"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab9a" placeholder="pilihan jawaban A"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab9b" placeholder="pilihan jawaban B"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab9c" placeholder="pilihan jawaban C"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab9d" placeholder="pilihan jawaban D"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Nomer 10</label>
                                            <input type="text" class="form-control underlined" name="soal10" placeholder="soal nomer 10"></div>
                                        <div class="form-group" >
                                            <label class="control-label">Kunci jawaban nomer 10</label>
                                            <input type="text" class="form-control underlined" name="kunci10" placeholder="kunci jawaban (A/B/C/D)"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab10a" placeholder="pilihan jawaban A"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab10b" placeholder="pilihan jawaban B"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab10c" placeholder="pilihan jawaban C"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawab10d" placeholder="pilihan jawaban D"></div>
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