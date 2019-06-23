<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'config.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$pass = $_POST['password'];
$password = hash('sha256', $pass);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="guru"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "guru";
		// alihkan ke halaman dashboard admin
		header("location:index.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['level']=="siswa"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "siswa";
		// alihkan ke halaman dashboard pegawai
		header("location:indexSiswa.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php");
	}	
}else{
	header("location:login.php");
}
 
?>