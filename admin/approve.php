<?php
// include database connection file
include_once("connect.php");


if (isset($_GET['id'])){

    $id = $_GET['id'];
    $s = "Approved";

    // Fetch all users data from database
    $sql = "UPDATE reservation SET status='$s' WHERE id='$id'";
    $result = mysqli_query($mysqli, $sql) or die (mysqli_error($mysqli));

    echo "<script language='javascript'>alert('Reservation has been approved !')</script>";
    echo "<script>document.location='reservation.php';</script>";

    }
?>