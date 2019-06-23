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

$query = "INSERT INTO evaluasi (kode_soal, nama_soal) VALUES ('$kode_soal', '$nama_soal')";
$query1 = "INSERT INTO soal (kode_soal, nomer, soal, a, b, c, d, kunci)VALUES('$kode_soal', '1', '$soal1', '$jawab1a', '$jawab1b', '$jawab1c', '$jawab1d', '$kunci1')";
$query2 = "INSERT INTO soal (kode_soal, nomer, soal, a, b, c, d, kunci)VALUES('$kode_soal', '2', '$soal2', '$jawab2a', '$jawab2b', '$jawab2c', '$jawab2d', '$kunci2')";
$query3 = "INSERT INTO soal (kode_soal, nomer,  soal, a, b, c, d, kunci)VALUES('$kode_soal', '3', '$soal3', '$jawab3a', '$jawab3b', '$jawab3c', '$jawab3d', '$kunci3')";
$query4 = "INSERT INTO soal (kode_soal, nomer, soal, a, b, c, d, kunci)VALUES('$kode_soal', '4', '$soal4', '$jawab4a', '$jawab4b', '$jawab4c', '$jawab4d', '$kunci4')";
$query5 = "INSERT INTO soal (kode_soal, nomer, soal, a, b, c, d, kunci)VALUES('$kode_soal', '5', '$soal5', '$jawab5a', '$jawab5b', '$jawab5c', '$jawab5d', '$kunci5')";
$query6 = "INSERT INTO soal (kode_soal, nomer, soal, a, b, c, d, kunci)VALUES('$kode_soal', '6', '$soal6', '$jawab6a', '$jawab6b', '$jawab6c', '$jawab6d', '$kunci6')";
$query7 = "INSERT INTO soal (kode_soal, nomer, soal, a, b, c, d, kunci)VALUES('$kode_soal', '7' '$soal7', '$jawab7a', '$jawab7b', '$jawab7c', '$jawab7d', '$kunci7')";
$query8 = "INSERT INTO soal (kode_soal, nomer, soal, a, b, c, d, kunci)VALUES('$kode_soal', '8', '$soal8', '$jawab8a', '$jawab8b', '$jawab8c', '$jawab8d', '$kunci8')";
$query9 = "INSERT INTO soal (kode_soal, nomer, soal, a, b, c, d, kunci)VALUES('$kode_soal', '9', '$soal9', '$jawab9a', '$jawab9b', '$jawab9c', '$jawab9d', '$kunci9')";
$query10 = "INSERT INTO soal (kode_soal, nomer, soal, a, b, c, d, kunci)VALUES('$kode_soal', '10', '$soal10', '$jawab10a', '$jawab10b', '$jawab10c', '$jawab10d', '$kunci10')";

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