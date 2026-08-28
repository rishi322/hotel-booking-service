<?php

include 'connection.php';
session_start();
$hid = $_SESSION['hid'];
echo $hid;
$review = mysqli_query($conn,"select u.uid, u.name, u.photo, c.cmtid,c.comment,c.hid from user_master u, comment_master c where c.uid = u.uid and c.hid = $hid")or die("query error");

$comments = array();

if(mysqli_num_rows($review)){
    while($rows = mysqli_fetch_assoc($review)){
        $comment = array(
            'cmtid' => $rows['cmtid'],
            'uid' => $rows['uid'],
            'uname' => $rows['name'],
            'photo' => $rows['photo'],
            'cmt' => $rows['comment']
        );
        $comments[] = $comment;
    }
    echo json_encode($comments);
}

?>