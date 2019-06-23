<?php

  session_start();
  // membuat variabel untuk menampung data dari form edit
  $id= $_POST['id_user'] ;
	$pass	= $_POST['password'];
  $password = hash('sha256', $pass);
	  //buat dan jalankan query UPDATE
  include_once("config.php");
    $query = "UPDATE users SET password = '$password' WHERE id_user = '$id'";

   $result = mysqli_query($conn, $query);

  //periksa hasil query apakah ada error
  if(!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
  }

header("location:index.php");
?>