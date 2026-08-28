<?php
$conn = mysqli_connect('localhost','root','','hotel_booking');
session_start();
$hid = $_SESSION['hid'];
$getroomtypes = mysqli_query($conn, "select r.tid,r.price_per_room,r.hid,r.description,t.tid,t.tname,t.timage from type_master t, room_master r where t.tid = r.tid and r.hid = $hid");
$rooms = array();
if (mysqli_num_rows($getroomtypes)) {

    while ($gettypes = mysqli_fetch_assoc($getroomtypes)) {
            $room = array(
                'tid' => $gettypes['tid'],
                'ppr' =>$gettypes['price_per_room'],
                'description' => $gettypes['description'],
                'image' => $gettypes['timage'],
                'tname' => $gettypes['tname']
            );
            $rooms[] = $room;
    }
    echo json_encode($rooms);
}

?>