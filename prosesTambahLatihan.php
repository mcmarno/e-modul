<?php
session_start();
$nama = $_POST['nama_latihan'];
$isi = $_POST['isi'];

include("config.php");
$result = mysqli_query($conn, "INSERT INTO latihan (nama_latihan, isi) VALUES ('$nama', '$isi')");
header("location:latihan.php");
?>