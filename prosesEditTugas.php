<?php
session_start();
$id_tugas = $_POST['id_tugas'];
$nama_tugas = $_POST['nama_tugas'];
$isi = $_POST['isi'];
include("config.php");
$result = mysqli_query($conn, "UPDATE tugas SET nama_tugas = '$nama_tugas', isi = '$isi' WHERE id_tugas = '$id_tugas'");
header("location:tugas.php");
?>