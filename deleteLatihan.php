<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM latihan WHERE id_latihan = $id");
header("location:latihan.php");
?>