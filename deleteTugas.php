<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM tugas WHERE id_tugas = $id");
header("location:tugas.php");
?>