<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$sql = "SELECT * FROM siswa WHERE id_siswa = $id";
$hasil = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($hasil);
$nis = $data['nis'];

$result = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa=$id");
$result = mysqli_query($conn, "DELETE FROM users WHERE nis = $nis");
$result = mysqli_query($conn, "DELETE FROM nilai WHERE no_induk = $nis");


// After delete redirect to Home, so that latest user list will be displayed.
header("Location:siswa.php");
?>