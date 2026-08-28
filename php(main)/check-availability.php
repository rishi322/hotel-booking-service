<?php
// Assuming you have a database connection established
$connection = mysqli_connect('localhost', 'root', '', 'hotel_booking');
if (isset($_POST['checkin'])) {
    $checkin = $_POST['checkin'];

    session_start();
    $hid = $_SESSION['hid'];


    // Query to retrieve cities based on the selected state

    $checkin_nums = array();

    $fully_available = mysqli_query($connection, "select * from room_master where hid = $hid") or die('query error');
    if (mysqli_num_rows($fully_available)>0) {
        while ($rows = mysqli_fetch_assoc($fully_available)) {
            $checkin_num = array(
                'tid' => $rows['tid'],
                'total_rooms' => 0
            );
            
            $checkin_nums[] = $checkin_num;
        }
    }

    $query = "SELECT tid, SUM(total_rooms) AS total_addition
    FROM booking_tb
    WHERE `check-in-date` = '$checkin' AND hid = 39;";
    $result = mysqli_query($connection, $query) or die('query1 error');


    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Suppose you want to update the 'total_rooms' value for 'tid' = 2
            $newTotalRooms = 10;

            foreach ($checkin_nums as &$checkin_num) {
                if ($checkin_num['tid'] == $row['tid']) {
                    $checkin_num['total_rooms'] = $row['total_addition'];
                    break; // Assuming 'tid' is unique, you can exit the loop after finding the desired element
                }
            }
            unset($checkin_num); // Unset the reference to avoid potential side effects

        }
    }




    


    $query3 = "SELECT tid, SUM(total_rooms) AS total_addition
    FROM booking_tb
    WHERE `check-out-date` > '$checkin' AND uid != 1 AND hid = 39 AND tid = 2;";
    $result3 = mysqli_query($connection, $query3) or die('query3 error');

    $stays = array();

    if (mysqli_num_rows($result3)) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Suppose you want to update the 'total_rooms' value for 'tid' = 2
            $newTotalRooms = 10;

            foreach ($checkin_nums as &$checkin_num) {
                if ($checkin_num['tid'] == $row['tid']) {
                    $checkin_num['total_rooms'] = $checkin_num['total_rooms']+$row['total_addition'];
                    break; // Assuming 'tid' is unique, you can exit the loop after finding the desired element
                }
            }
            unset($checkin_num); // Unset the reference to avoid potential side effects

        }
    }

    $query2 = "SELECT tid, SUM(total_rooms) AS total_addition
    FROM booking_tb
    WHERE `check-out-date` = '$checkin' AND hid = 39 AND tid = 2;";
    $result2 = mysqli_query($connection, $query2) or die('query2 error');

    $checkout_nums = array();

    if (mysqli_num_rows($result2)) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Suppose you want to update the 'total_rooms' value for 'tid' = 2
            $newTotalRooms = 10;

            foreach ($checkin_nums as &$checkin_num) {
                if ($checkin_num['tid'] == $row['tid']) {
                    $checkin_num['total_rooms'] = $checkin_num['total_rooms']-$row['total_addition'];
                    break; // Assuming 'tid' is unique, you can exit the loop after finding the desired element
                }
            }
            unset($checkin_num); // Unset the reference to avoid potential side effects

        }
    }





    mysqli_close($connection);

    // Return cities as a JSON response
    echo json_encode($checkin_nums);
}
