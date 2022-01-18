<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
<link rel="apple-touch-startup-image" href="images/apple-touch-startup-image-640x920.png">
<title>SUSIM's Sport Facilities Reservation</title>
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
                  <p>Welcome, <span><?php echo $_SESSION['username']; ?></span></p>
                  </div>  
                  <div class="user_avatar"><img src="data:image/png;base64,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.jpg" alt="" title="" /></div>       
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
  <div data-page="tables" class="page">
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
     
              <h2 class="page_title"></h2> 
     
     <div class="page_single layout_fullwidth_padding">
              
                <h3>Price table</h3>
                <ul class="responsive_table">
                     <li class="table_row">
                        <div class="table_section_small">&nbsp;</div>
                        <div class="table_section">Member Category</div>
                        <div class="table_section">Price</div> 
                     </li>
                    <?php
                    // Create database connection using config file
                    include_once("koneksi.php");

                    // Fetch all users data from database
                    $sql = "SELECT * FROM price WHERE field_id='1' ORDER BY id ASC";
                    $result = mysqli_query($mysqli, $sql) or die (mysqli_error($mysqli));
                        
                        while($price = mysqli_fetch_array($result)) {         
                            echo "<li class='table_row'>";
                            echo "<div class='table_section_small'>#</div>";
                            echo "<div class='table_section'>".$price['category']."</div>";
                            echo "<div class='table_section'>".$price['price']." / ".$price['type']."</div>";
                            echo "</li>";
                        }
                        
                    ?>
                </ul>

                <p>*Harga dapat berubah sewaktu-waktu.</p>
                
                <h3 style="padding-top:1cm;">Choose Your Court</h3>
                <ul class="responsive_table">
                    <?php
                    // Create database connection using config file
                    include_once("koneksi.php");

                    // Fetch all users data from database
                    $result = mysqli_query($mysqli, "SELECT * FROM price WHERE field_id='1' ORDER BY id ASC");
                        
                        while($price = mysqli_fetch_array($result)) {   
                            echo "<a href='".$price['url']."' class='btn btn--full'>".$price['category']."</a> ";
                        }
                        
                    ?>
                </ul>
              
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