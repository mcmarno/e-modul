<?php
$kode_soal = $_POST['kode_soal'];
$nama_soal = $_POST['nama_soal'];

$soal1 = $_POST['soal1'];
$soal2 = $_POST['soal2'];
$soal3 = $_POST['soal3'];
$soal4 = $_POST['soal4'];
$soal5 = $_POST['soal5'];
$soal6 = $_POST['soal6'];
$soal7 = $_POST['soal7'];
$soal8 = $_POST['soal8'];
$soal9 = $_POST['soal9'];
$soal10 = $_POST['soal10'];

$kunci1 = $_POST['kunci1'];
$kunci2 = $_POST['kunci2'];
$kunci3 = $_POST['kunci3'];
$kunci4 = $_POST['kunci4'];
$kunci5 = $_POST['kunci5'];
$kunci6 = $_POST['kunci6'];
$kunci7 = $_POST['kunci7'];
$kunci8 = $_POST['kunci8'];
$kunci9 = $_POST['kunci9'];
$kunci10 = $_POST['kunci10'];

$jawab1a = $_POST['jawab1a'];
$jawab1b = $_POST['jawab1b'];
$jawab1c = $_POST['jawab1c'];
$jawab1d = $_POST['jawab1d'];

$jawab2a = $_POST['jawab2a'];
$jawab2b = $_POST['jawab2b'];
$jawab2c = $_POST['jawab2c'];
$jawab2d = $_POST['jawab2d'];

$jawab3a = $_POST['jawab3a'];
$jawab3b = $_POST['jawab3b'];
$jawab3c = $_POST['jawab3c'];
$jawab3d = $_POST['jawab3d'];

$jawab4a = $_POST['jawab4a'];
$jawab4b = $_POST['jawab4b'];
$jawab4c = $_POST['jawab4c'];
$jawab4d = $_POST['jawab4d'];

$jawab5a = $_POST['jawab5a'];
$jawab5b = $_POST['jawab5b'];
$jawab5c = $_POST['jawab5c'];
$jawab5d = $_POST['jawab5d'];

$jawab6a = $_POST['jawab6a'];
$jawab6b = $_POST['jawab6b'];
$jawab6c = $_POST['jawab6c'];
$jawab6d = $_POST['jawab6d'];

$jawab7a = $_POST['jawab7a'];
$jawab7b = $_POST['jawab7b'];
$jawab7c = $_POST['jawab7c'];
$jawab7d = $_POST['jawab7d'];

$jawab8a = $_POST['jawab8a'];
$jawab8b = $_POST['jawab8b'];
$jawab8c = $_POST['jawab8c'];
$jawab8d = $_POST['jawab8d'];

$jawab9a = $_POST['jawab9a'];
$jawab9b = $_POST['jawab9b'];
$jawab9c = $_POST['jawab9c'];
$jawab9d = $_POST['jawab9d'];

$jawab10a = $_POST['jawab10a'];
$jawab10b = $_POST['jawab10b'];
$jawab10c = $_POST['jawab10c'];
$jawab10d = $_POST['jawab10d'];

$query = "UPDATE evalusi SET nama_soal = '$nama_soal' WHERE kode_soal = $kode_soal";
$query1 = "UPDATE soal SET soal = '$soal1', a = '$jawab1a', b = '$jawab1b', c = '$jawab1c', d = '$jawab1d', kunci = '$kunci1' WHERE kode_soal = '$kode_soal' AND nomer = 1";
$query2 = "UPDATE soal SET soal = '$soal2', a = '$jawab2a', b = '$jawab2b', c = '$jawab2c', d = '$jawab2d', kunci = '$kunci2' WHERE kode_soal = '$kode_soal' AND nomer = 2";
$query3 = "UPDATE soal SET soal = '$soal3', a = '$jawab3a', b = '$jawab3b', c = '$jawab3c', d = '$jawab3d', kunci = '$kunci3' WHERE kode_soal = '$kode_soal' AND nomer = 3";
$query4 = "UPDATE soal SET soal = '$soal4', a = '$jawab4a', b = '$jawab4b', c = '$jawab4c', d = '$jawab4d', kunci = '$kunci4' WHERE kode_soal = '$kode_soal' AND nomer = 4";
$query5 = "UPDATE soal SET soal = '$soal5', a = '$jawab5a', b = '$jawab5b', c = '$jawab5c', d = '$jawab5d', kunci = '$kunci5' WHERE kode_soal = '$kode_soal' AND nomer = 5";
$query6 = "UPDATE soal SET soal = '$soal6', a = '$jawab6a', b = '$jawab6b', c = '$jawab6c', d = '$jawab6d', kunci = '$kunci6' WHERE kode_soal = '$kode_soal' AND nomer = 6";
$query7 = "UPDATE soal SET soal = '$soal7', a = '$jawab7a', b = '$jawab7b', c = '$jawab7c', d = '$jawab7d', kunci = '$kunci7' WHERE kode_soal = '$kode_soal' AND nomer = 7";
$query8 = "UPDATE soal SET soal = '$soal8', a = '$jawab8a', b = '$jawab8b', c = '$jawab8c', d = '$jawab8d', kunci = '$kunci8' WHERE kode_soal = '$kode_soal' AND nomer = 8";
$query9 = "UPDATE soal SET soal = '$soal9', a = '$jawab9a', b = '$jawab9b', c = '$jawab9c', d = '$jawab9d', kunci = '$kunci9' WHERE kode_soal = '$kode_soal' AND nomer = 9";
$query10 = "UPDATE soal SET soal = '$soal10', a = '$jawab10a', b = '$jawab10b', c = '$jawab10c', d = '$jawab10d', kunci = '$kunci10' WHERE kode_soal = '$kode_soal' AND nomer = 10";

include("config.php");
$result = mysqli_query($conn, $query);
$result = mysqli_query($conn, $query1);
$result = mysqli_query($conn, $query2);
$result = mysqli_query($conn, $query3);
$result = mysqli_query($conn, $query4);
$result = mysqli_query($conn, $query5);
$result = mysqli_query($conn, $query6);
$result = mysqli_query($conn, $query7);
$result = mysqli_query($conn, $query8);
$result = mysqli_query($conn, $query9);
$result = mysqli_query($conn, $query10);

header("location:evaluasi.php");
?>