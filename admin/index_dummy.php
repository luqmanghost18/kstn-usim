<?php 
	session_start();
    
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
        header("location:index.php?pesan=gagal");
	}
    
	?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Admin Page</h1>
 
	<p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	<a href="logout.php">LOGOUT</a>
</body>
</html>