<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM evaluasi WHERE kode_soal = $id");
$result = mysqli_query($conn, "DELETE FROM soal WHERE kode_soal = $id");
header("location:evaluasi.php");
?>