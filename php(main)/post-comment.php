<?php
include 'connection.php';
session_start();

$cmt = $_SESSION['comment'];
$uid = $_SESSION['uid'];
$hid = $_SESSION['hid'];
echo $uid. $hid.$cmt;
$comment= mysqli_query($conn,"INSERT INTO `comment_master`( `uid`, `hid`, `comment`) VALUES ($uid,$hid,'$cmt')") or die("query errors");
if($comment){
    header("Location: ".$_SESSION['prev-page']);
}
echo $_SESSION['prev-page'];
?>