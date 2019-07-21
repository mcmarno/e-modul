<?php

$no_induk = $_POST['no_induk'];
$nilai_latihan = $_POST['nilai_latihan'];
$nilai_tugas = $_POST['nilai_tugas'];

include('config.php');
$sql = mysqli_query($conn, "UPDATE nilai SET nilai_latihan = '$nilai_latihan', nilai_tugas='$nilai_tugas' WHERE no_induk = '$no_induk'");
header('location:nilai.php');

?>