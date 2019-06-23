<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM materi WHERE id_materi = $id");
header("location:materi.php");
?>