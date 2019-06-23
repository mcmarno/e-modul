<?php
// Load file koneksi.php
include_once "config.php";
// Ambil Data yang Dikirim dari Form
$nis = $_POST['nis'];
$nama_tugas = $_POST['nama_tugas'];
$file = $_FILES['berkas']['name'];
$tmp = $_FILES['berkas']['tmp_name'];
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$filebaru = $nis."_".$nama_tugas."_".$file;
// Set path folder tempat menyimpan fotonya
$path = "tugas/".$filebaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO hasil (nis, nama_tugas, berkas) VALUES('$nis', '$nama_tugas', '$filebaru')";
  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location:tugasSiswa.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='hasilSiswa.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='hasilSiswa.php'>Kembali Ke Form</a>";
}
?>