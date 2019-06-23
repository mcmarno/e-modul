<?php

  session_start();
  // membuat variabel untuk menampung data dari form edit
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $password = hash('sha256', $nama);
  $level = "siswa";
	  //buat dan jalankan query UPDATE
  include_once("config.php");
  $sql = "SELECT * FROM users WHERE nis = '$nis'";
  $has = mysqli_query($conn, $sql);
  $dat  = mysqli_fetch_array($has);
  $ni = $dat['nis'];

  if($ni == $nis){
    $query = "UPDATE users SET username = '$nama', password = '$password' WHERE nis = '$nis'";
   } else{
    $query = "INSERT INTO users (nis, username, password, level) VALUES ('$nis', '$nama', '$password', '$level')";
   }
  $query1 = "UPDATE siswa SET nama = '$nama' WHERE nis = '$nis'";

  $result = mysqli_query($conn, $query);
  $result = mysqli_query($conn, $query1);

  //periksa hasil query apakah ada error
  if(!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
  }

header("location:siswa.php");
?>