<?php
// Assuming you have a database connection established
$connection = mysqli_connect('localhost','root','','hotel_booking');
if (isset($_POST['stateId'])) {
    $stateId = $_POST['stateId'];

    // Query to retrieve cities based on the selected state
    $query = "SELECT city_id, city FROM city_tb WHERE state_id = '$stateId'";
    $result = mysqli_query($connection, $query) or die('query error');

    $cities = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $city = array(
            'cityId' => $row['city_id'],
            'cityName' => $row['city']
        );
        $cities[] = $city;
    }

    mysqli_close($connection);

    // Return cities as a JSON response
    echo json_encode($cities);
}
?>
