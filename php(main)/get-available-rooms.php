<?php
$conn = mysqli_connect('localhost', 'root', '', 'hotel_booking');
session_start();
$hid = $_SESSION['hid'];
$tid = $_POST['tid'];
$total_rooms = $_POST['total_rooms'];
$guests = $_POST['guests'];
$adults = $_POST['adult'];
$child = $_POST['child'];

$rooms_need = mysqli_query($conn,"select (adults + childeren) as guests from room_master where hid = $hid and tid = $tid");
if(mysqli_num_rows($rooms_need)>0){
  $req_room =  mysqli_fetch_assoc($rooms_need);
  $need = $guests / $req_room['guests'];
  if($need < 1){
    $need = 1;
    $total_rooms = $total_rooms + $need;
  } else {
    $need = round($need);
    $total_rooms = $total_rooms + $need;
  }
}
$getroomtypes = mysqli_query($conn, "SELECT r.tid, r.price_per_room, r.hid, r.description, t.tid, t.tname, t.timage
FROM type_master t
JOIN room_master r ON t.tid = r.tid
WHERE r.total_rooms > $total_rooms
  AND r.hid = $hid
  AND t.tid = $tid ");
$rooms = array();

if (mysqli_num_rows($getroomtypes)>0) {

  while ($gettypes = mysqli_fetch_assoc($getroomtypes)) {
    $room = array(
      'tid' => $gettypes['tid'],
      'ppr' => $gettypes['price_per_room'],
      'description' => $gettypes['description'],
      'image' => $gettypes['timage'],
      'tname' => $gettypes['tname'],
      'need' => $need
    );
    $rooms[] = $room;
  }
  echo json_encode($rooms);
} else {

  
}
