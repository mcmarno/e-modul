<?php
session_start();
$nama = $_POST['nama_tugas'];
$isi = $_POST['isi'];

include("config.php");
$result = mysqli_query($conn, "INSERT INTO tugas (nama_tugas, isi) VALUES ('$nama', '$isi')");
header("location:tugas.php");
?>