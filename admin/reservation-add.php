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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>USIM - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="sidebar-brand-text mx-3">USIM <sup><span
                            class="badge badge-pill badge-light">BETA</span></sup></div>
            </a>

            <?php include("menu.php"); ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['matric_no']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="href=" logout.php"" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Add New Manual Reservation</h1>

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">DetailForm</h6>
                                </div>
                                <div class="card-body">
                                    <form action="reservation-add.php" method="post">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Location</label>
                                            <select class="form-control" name="location_id">
                                                <option disabled selected> Choose </option>
                                                <?php 
                                                include_once("connect.php");
                                                $sql = "SELECT * FROM location ORDER BY id ASC";
                                                $result = mysqli_query($mysqli, $sql) or die (mysqli_error($mysqli));
                                                while ($data=mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?=$data['id']?>"><?=$data['location_name']?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Sport</label>
                                            <select class="form-control" name="field_id">
                                                <option disabled selected> Choose </option>
                                                <?php 
                                                include_once("connect.php");
                                                $sql = "SELECT field.id, field.location_id, field.field_name, location.location_name FROM field field LEFT JOIN location location ON field.location_id=location.id ORDER BY id ASC";
                                                $result = mysqli_query($mysqli, $sql) or die (mysqli_error($mysqli));
                                                while ($data=mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?=$data['id']?>"><?=$data['location_name']?> -
                                                    <?=$data['field_name']?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="exampleFormControlSelect1">Price</label>
                                            <select class="form-control" name="price_id">
                                                <option disabled selected> Choose </option>
                                                <?php 
                                                include_once("connect.php");
                                                $sql = "SELECT price.id, price.category, price.price, price.type, location.location_name, field.field_name 
                                                FROM (price price LEFT JOIN location location ON price.location_id=location.id) 
                                                LEFT JOIN field field ON price.field_id=field.id ORDER BY id ASC";
                                                $result = mysqli_query($mysqli, $sql) or die (mysqli_error($mysqli));
                                                while ($data=mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?=$data['id']?>">
                                                    <?=$data['location_name']?> - <?=$data['field_name']?> (<?=$data['price']?>/<?=$data['type']?>/<?=$data['category']?>) 
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile</label>
                                            <input type="text" class="form-control" name="mobile">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Start Date</label>
                                            <input type="date" class="form-control" name="start_date">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Start Time</label>
                                            <input type="time" class="form-control" name="start_time">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">End Time</label>
                                            <input type="time" class="form-control" name="end_time">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Status</label>
                                            <select class="form-control" name="status">
                                                <option disabled selected> Choose </option>
                                                <!-- <option value="Approved">Approved</option> -->
                                                <option value="Need Confirmation">Need Confirmation</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">matric_no</label>
                                            <select class="form-control" name="matric_no">
                                                <option disabled selected> Choose </option>
                                                <?php 
                                                include_once("connect.php");
                                                $sql = "SELECT * FROM user ORDER BY id ASC";
                                                $result = mysqli_query($mysqli, $sql) or die (mysqli_error($mysqli));
                                                while ($data=mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?=$data['id']?>">
                                                    <?=$data['nama']?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Picture</label>
                                            <input type="text" class="form-control" name="picture" value="#">
                                        </div>
                                        <input type="submit" name="Submit" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Proses Add -->
            <?php
 
                // Check If form submitted, insert form data into users table.
                if(isset($_POST['Submit'])) {

                    $location_id = $_POST['location_id'];
                    $field_id = $_POST['field_id'];
                    // $price_id = $_POST['price_id'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $mobile = $_POST['mobile'];
                    $start_date = $_POST['start_date'];
                    $start_time = $_POST['start_time'];
                    $end_time = $_POST['end_time'];
                    $status = $_POST['status'];
                    $matric_no = $_POST['matric_no'];
                    $picture = $_POST['picture'];
                    
                    // include database connection file
                    include_once("connect.php");
                            
                    // Insert user data into table
                    $result = mysqli_query($mysqli, "INSERT INTO reservation (location_id, field_id, name, email, mobile, start_date,
                    start_time, end_time, status, matric_no, picture) VALUES ('$location_id', '$field_id', '$name', '$email'
                    , '$mobile', '$start_date', '$start_time', '$end_time', '$status', '$matric_no', '$picture')");
                    
                    // Show message when user added
                    echo "<br>";
                    echo "<div class='alert alert-success col-lg-6' role='alert' style='margin-left:10px;'>";
                    echo "<b>Successful!</b> Data has been updated. <a href='reservation.php' class='alert-link'> Click here</a> to go back.";
                    echo "</div>";

                }
                ?>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; USIM 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>