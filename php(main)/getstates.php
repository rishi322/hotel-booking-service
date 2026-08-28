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
FROM `state_tb`
ORDER BY `state_id` ASC
LIMIT 12;
";
$result = $conn->query($sql) or die("query error");

// Display the data as HTML
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $state = array(
         'stateid' => $row["state_id"],
         'name' => $row["state"],
         'image' => $row["state_img"]);
         $states[] = $state;
    }
} else {
    echo "No data found.";
}

$conn->close();
echo json_encode($states);
