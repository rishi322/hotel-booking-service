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
FROM `type_master`
ORDER BY `tid` ASC
LIMIT 4;
";
$result = $conn->query($sql) or die("query error");

// Display the data as HTML
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $type = array('type_id' => $row["tid"],
         'name' => $row["tname"],
        
         'image' => $row["timage"]);
         $types[] = $type;
    }
} else {
    echo "No data found.";
}

$conn->close();
echo json_encode($types);
