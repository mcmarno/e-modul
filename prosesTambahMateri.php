<?php
session_start();
$judul = $_POST['judul'];
$text = $_POST['text'];

include("config.php");
$result = mysqli_query($conn, "INSERT INTO materi (nama, isi) VALUES ('$judul', '$text')");
header("location:materi.php");
?>