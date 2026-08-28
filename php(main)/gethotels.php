<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_booking";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the type_master table
$sql = "SELECT *
FROM `hotel_master`
ORDER BY `hid` ASC
LIMIT 1;
";
$result = $conn->query($sql) or die("query error");

// Display the data as HTML
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $hotel = array(
         'hid' => $row["hid"],
         'name' => $row["hname"],
         'image' => $row["photos"]);
         $hotels[] = $hotel;
    }
} else {
    echo "No data found.";
}

$conn->close();
echo json_encode($hotels);
