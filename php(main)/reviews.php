<?php
$conn = mysqli_connect('localhost','root','','hotel_booking');
session_start();
$hid = $_SESSION['hid'];
$getroomtypes = mysqli_query($conn, "select u.uid, u.name, u.photo, c.cmtid,c.comment,c.hid from user_master u, comment_master c where c.uid = u.uid and c.hid = $hid");
$rooms = array();
if (mysqli_num_rows($getroomtypes)) {

    while ($rows = mysqli_fetch_assoc($getroomtypes)) {
            $room = array(
                'cmtid' => $rows['cmtid'],
                'uid' => $rows['uid'],
                'uname' => $rows['name'],
                'photo' => $rows['photo'],
                'cmt' => $rows['comment']
            );
            $rooms[] = $room;
    }
    echo json_encode($rooms);
}

?>