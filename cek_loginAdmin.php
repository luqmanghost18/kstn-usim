<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$staff_id = $_POST['staff_id'];
$password = sha1($_POST['password']);
 
 
// menyeleksi data user dengan staff_id dan password yang sesuai
$login = mysqli_query($koneksi,"select * from admin where staff_id='$staff_id' and password= '$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah staff_id dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan staff_id
		$_SESSION['staff_id'] = $staff_id;
		$_SESSION['nama'] = $nama;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['level']=="user"){
		// buat session login dan staff_id
		$_SESSION['staff_id'] = $staff_id;
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