<?php
session_start();

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $password = hash('sha256', $nama);
    $level = "siswa";

        // include database connection file
    include_once("config.php");
    $query = "INSERT INTO siswa(nis, nama) VALUES('$nis', '$nama')";
    $query1 = "INSERT INTO users(nis, username, password, level) VALUES('$nis', '$nama', '$password', '$level')";

        // Insert user data into table
    $result = mysqli_query($conn, $query);
    $result = mysqli_query($conn, $query1);
    $result = mysqli_query($conn, "INSERT INTO nilai (no_induk) VALUES ('$nis')");


        // Show message when user added
    header("location:siswa.php");
?>