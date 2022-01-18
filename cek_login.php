<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$matric_no = mysqli_real_escape_string($koneksi, $_POST['matric_no']);
$password = sha1($_POST['password']);
 
 
// menyeleksi data user dengan matric_no dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where matric_no='$matric_no' and password= '$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah matric_no dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan matric_no
		$_SESSION['matric_no'] = $matric_no;
		$_SESSION['nama'] = $nama;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['level']=="user"){
		// buat session login dan matric_no
		$_SESSION['matric_no'] = $matric_no;
		$_SESSION['nama'] = $nama;
		$_SESSION['level'] = "user";
		// alihkan ke halaman dashboard pegawai
		header("location:user/index.php");
 
	// cek jika user login sebagai pengurus
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>