<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$query = "SELECT * FROM hasil_latihan WHERE id_hasil_latihan='$id'";
    $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("latihan/".$data['berkas'])) // Jika foto ada
      unlink("latihan/".$data['berkas']);
$query1 = "DELETE FROM hasil_latihan WHERE id_hasil_latihan = '$id'";

$result = mysqli_query($conn, "$query1");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:hasil-latihan.php");
?>