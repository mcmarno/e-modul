<?php
session_start();
$id_latihan = $_POST['id_latihan'];
$nama_latihan = $_POST['nama_latihan'];
$isi = $_POST['isi'];
include("config.php");
$result = mysqli_query($conn, "UPDATE latihan SET nama_latihan = '$nama_latihan', isi = '$isi' WHERE id_latihan = '$id_latihan'");
header("location:latihan.php");
?>