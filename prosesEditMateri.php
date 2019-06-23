<?php
session_start();
$id_materi = $_POST['id_materi'];
$judul = $_POST['judul'];
$isi = $_POST['text'];
include("config.php");
$result = mysqli_query($conn, "UPDATE materi SET nama = '$judul', isi = '$isi' WHERE id_materi = '$id_materi'");
header("location:materi.php");
?>