<?php

session_start();
include 'connection.php';

if (isset($_POST['bookings'])) {
  $payid = $_POST['payid'];
}

$checkindate = $_SESSION['check-in-date'];
$checkoutdate = $_SESSION['check-out-date'];
$typeid = $_SESSION['typeid'];
$child = $_SESSION['child'];
$adult = $_SESSION['adult'];
$guests = $_SESSION['guests'];
$room_need = $_SESSION['room_need'];
$amount = $_SESSION['amount'];
$hid = $_SESSION['hid'];
$uid = $_SESSION['uid'];
///query 1
$date = date('Y-m-d');
$time =  time();

$query1 = mysqli_query($conn, "INSERT INTO `booking_tb` (`uid`, `hid`, `tid`, `bdate`, `btime`, `check-in-date`, `check-out-date`, `paytype`, `paystatus`, `paymentkey`, `total amount`, `total_rooms`) VALUES ($uid, $hid, $typeid, '$date', '$time', '$checkindate', '$checkoutdate', 'online', 'paid', '$payid', $amount, $room_need)") or die("query 1");

////query 2
$userdetailsfn = $_SESSION['user-details-fn'];
$userdetailsln = $_SESSION['user-details-ln'];
$userdetailsemail = $_SESSION['user-details-email'];
$userdetailsmb = intval($_SESSION['user-details-mb']);
if ($query1) {
  $latestId = mysqli_insert_id($conn);
  echo "Latest ID: " . $latestId;
} else {
  echo "Query execution failed.";
}
if ($query1) {


  $query2 = mysqli_query($conn, "INSERT INTO `user_booking_details`(`uid`, `bid`, `firstname`, `lastname`, `phone`)VALUES($uid,$latestId,'$userdetailsfn','$userdetailsln',$userdetailsmb)") or die("dead");
  if ($query2) {
    $_SESSION['pdf'] = 'yes';
    unset($_SESSION['user-details-fn']);
    unset($_SESSION['user-details-ln']);
    unset($_SESSION['user-details-email']);
    unset($_SESSION['user-details-mb']);
    header("Location:user-dashboard.php");
    echo "successfulll";
  }
}
unset($_SESSION['user-details-fn']);
unset($_SESSION['user-details-ln']);
unset($_SESSION['user-details-email']);
unset($_SESSION['user-details-mb']);
