<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
<link rel="apple-touch-startup-image" href="images/apple-touch-startup-image-640x920.png">
<title>USIM's Sport Facilities Reservation</title>
<link rel="shortcut icon" href="https://www.shareicon.net/data/2015/09/07/97275_volleyball_512x512.png" type="image/x-icon">
<link rel="stylesheet" href="css/swiper.css">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,900" rel="stylesheet"> 
</head>
<body id="mobile_wrap">

    <div class="panel-overlay"></div>

    <div class="panel panel-left panel-reveal">
                  <!-- Slider -->
                 <div class="swiper-container-subnav multinav">
                    <div class="swiper-wrapper">
                    <div class="swiper-slide">		
				<nav class="main_nav_underline">
				<ul>
				<li><a href="index.php"><img src="images/icons/gray/home.png" alt="" title="" /><span>Home</span></a></li>
				<li><a href="blog.php"><img src="images/icons/gray/tabs.png" alt="" title="" /><span>Blog</span></a></li>
				<li><a href="dribbble.php"><img src="images/icons/gray/dribbble.png" alt="" title="" /><span>Reservation</span></a></li>
				<!-- <li><a href="message.php"><img src="images/icons/gray/message.png" alt="" title="" /><span>Pesan</span></a></li> -->
				<li><a href="#" data-panel="right" class="open-panel"><img src="images/icons/gray/user.png" alt="" title="" /><span>User</span></a></li>
				</ul>
				</nav>
			</div>
			
		    </div>
		</div>
    </div>

    <div class="panel panel-right panel-reveal">
      <div class="user_login_info">
	  
                <div class="user_thumb">
           
                  <div class="user_details">
                  <p>Welcome, <span><?php //echo $_SESSION['username']; ?></span></p>
                  </div>  
                  <div class="user_avatar"><img src="images/avatar3.jpg" alt="" title="" /></div>       
                </div>
				
                  <nav class="user-nav">
                    <ul>
                    <li><a href="index.php"><img src="images/icons/gray/home.png" alt="" title="" /><span>Home</span></a></li>
						<li><a href="blog.php"><img src="images/icons/gray/tabs.png" alt="" title="" /><span>Blog</span></a></li>
						<li><a href="reserve.php"><img src="images/icons/gray/dribbble.png" alt="" title="" /><span>Reservation</span></a></li>
						<li><a href="more.php"><img src="images/icons/gray/more.png" alt="" title="" /><span>History</span></a></li>
                        <li><a href="logout.php"><img src="images/icons/gray/lock.png" alt="" title="" /><span>Logout</span></a></li>
                    </ul>
                  </nav>
      </div>
    </div>

    <div class="views">

      <div class="view view-main">
<div class="pages">
  <div data-page="form" class="page">
    <div class="page-content">
    
		<div class="navbar navbar--fixed navbar--fixed-top navbar--bg">
			<div class="navbar__col navbar__col--title">
				<a href="index.php">USIM</a>
			</div>
			<div class="navbar__col navbar__col--icon navbar__col--icon-right">
				<a href="#" data-panel="left" class="open-panel"><img src="images/icons/white/menu.png" alt="" title="" /></a>
			</div>
                </div>
	
     <div id="pages_maincontent">
     
              <h2 class="page_title">CUSTOM FORM</h2> 
     
     <div class="page_single layout_fullwidth_padding">

                <div class="contactform">
                <form action="book-futsal-bronze.php" class="" id="CustomForm" method="post">
                <div class="form_row">
                <label>Name:</label>
                <input type="text" name="name" value="" class="form_input">
                </div>
                
                <div class="form_row">
                <label>Email:</label>
                <input type="text" name="email" value="" class="form_input required email">
                </div>

                <div class="form_row">
                <label>Mobile:</label>
                <input type="text" name="mobile" value="" class="form_input">
                </div>
				
                <div class="form_row">
                <label>Date:</label>
                <input type="date" name="start_date" value="" class="form_input">
                </div>
                
                <div class="form_row">
                <label>Start Time:</label>
                <input type="time" name="start_time" value="" class="form_input">
                </div>

                <div class="form_row">
                <label>End Time:</label>
                <input type="time" name="end_time" value="" class="form_input">
                </div>
                
                <!-- <div class="form_row">
                <label>Qty:</label>
                <input type="number" name="qty" value="" class="form_input">
                </div> -->
                
                <input type="submit" name="Submit" class="form_submit" id="submit" value="Send">
                </form>

                <?php
 
                // Check If form submitted, insert form data into users table.
                if(isset($_POST['Submit'])) {

                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $mobile = $_POST['mobile'];
                    $start_date = $_POST['start_date'];
                    $start_time = $_POST['start_time'];
                    $end_time = $_POST['end_time'];
                    $field_id = 1;
                    $price_id = 1;
                    // $qty = $start_time-$end_time;
                    $status = "Need Confirmation";
                    $username = $_SESSION['username'];
                    $picture = "";
                    
                    // include database connection file
                    include_once("koneksi.php");
                            
                    // Insert user data into table
                    $result = mysqli_query($mysqli, "INSERT INTO reservation (name, email, mobile, start_date, start_time, end_time, field_id, price_id, status, username, picture) VALUES('$name', '$email', '$mobile', '$start_date', '$start_time', '$end_time', '$field_id', '$price_id', '$status', '$username', '$status')");
                    
                    // Show message when user added
                    // echo "<center>Data berhasil di tambahkan. <a href='index.php'>Lihat Daftar</a><center>";
                    echo "<br>";
                    echo "<h4><center><strong>Selamat!</strong> data reservasi sudah disimpan, mohon lakukan pembayaran.</center></h4>";
                    echo "<a href='pembayaran.php' class='btn btn--full'>CARA PEMBAYARAN</a>";
                    echo "<a href='index.php' class='btn btn--full'>KEMBALI</a>";
                }
                ?>
                </div>
              </div>
      
      </div>
      
      
    </div>
  </div>
</div>

         </div>
    </div>
    
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery.validate.min.js" ></script>
<script src="js/swiper.min.js"></script>

<script src="js/jquery.custom.js"></script>
  </body>
</html>