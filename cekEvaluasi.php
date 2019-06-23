<?php
session_start();
if(isset($_POST['submit'])){
$user = $_POST['nis'];
$kode = $_POST['kode_soal'];
$a = $_POST['radios1'];
$b = $_POST['radios2'];
$c = $_POST['radios3'];
$d = $_POST['radios4'];
$e = $_POST['radios5'];
$f = $_POST['radios6'];
$g = $_POST['radios7'];
$h = $_POST['radios8'];
$i = $_POST['radios9'];
$j = $_POST['radios10'];

include_once("config.php");
$sql1 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = $kode AND nomer = 1");
$jawab1 = mysqli_fetch_array($sql1);
$j1 = $jawab1['kunci'];
if($a == $j1)
	{
		$n1 = 10;
	}else{
		$n1 = "";
	}

$sql2 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = $kode AND nomer = 2");
$jawab2 = mysqli_fetch_array($sql2);
$j2 = $jawab2['kunci'];
if($b == $j2)
	{
		$n2 = 10;
	}else{
		$n2 = "";
	}

$sql3 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = $kode AND nomer = 3");
$jawab3 = mysqli_fetch_array($sql3);
$j3 = $jawab3['kunci'];
if($c == $j3)
	{
		$n3 = 10;
	}else{
		$n3 = "";
	}

$sql4 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = $kode AND nomer = 4");
$jawab4 = mysqli_fetch_array($sql4);
$j4 = $jawab4['kunci'];
if($d == $j4)
	{
		$n4 = 10;
	}else{
		$n4 = "";
	}

$sql5 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = $kode AND nomer = 5");
$jawab5 = mysqli_fetch_array($sql5);
$j5 = $jawab5['kunci'];
if($e == $j5)
	{
		$n5 = 10;
	}else{
		$n5 = "";
	}

$sql6 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = $kode AND nomer = 6");
$jawab6 = mysqli_fetch_array($sql6);
$j6 = $jawab6['kunci'];
if($f == $j6)
	{
		$n6 = 10;
	}else{
		$n6 = "";
	}

$sql7 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = $kode AND nomer = 7");
$jawab7 = mysqli_fetch_array($sql7);
$j7 = $jawab7['kunci'];
if($g == $j7)
	{
		$n7 = 10;
	}else{
		$n7 = "";
	}

$sql8 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = $kode AND nomer = 8");
$jawab8 = mysqli_fetch_array($sql8);
$j8 = $jawab8['kunci'];
if($h == $j8)
	{
		$n8 = 10;
	}else{
		$n8 = "";
	}

$sql9 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = $kode AND nomer = 9");
$jawab9 = mysqli_fetch_array($sql9);
$j9 = $jawab9['kunci'];
if($i == $j9)
	{
		$n9 = 10;
	}else{
		$n9 = "";
	}

$sql10 = mysqli_query($conn, "SELECT * FROM soal WHERE kode_soal = $kode AND nomer = 10");
$jawab10 = mysqli_fetch_array($sql10);
$j10 = $jawab10['kunci'];
if($j == $j10)
	{
		$n10 = 10;
	}else{
		$n10 = "";
	}

$nilai = $n1 + $n2 + $n3 + $n4 + $n5 + $n6 + $n7 + $n8 + $n9 + $n10;


$cari = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
$data = mysqli_fetch_array($cari);
$nis = $data['nis'];

$query = mysqli_query($conn, "UPDATE nilai SET nilai_evaluasi = '$nilai' WHERE no_induk = '$nis'");
header("location:nilaiSiswa.php");
}
?>
