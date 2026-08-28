<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $name = $_POST['hname'];
 
  $street = $_POST['street'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $pincode = $_POST['pincode'];
//   $pic = $_FILES["file"]["name"];

//   $targetDir = "uploads/"; // Directory where the file will be moved
//   $targetFile = $targetDir . basename($_FILES["file"]["name"]); // Path of the target file


    $conn = mysqli_connect('localhost','root','','hotel_booking');
    $result = mysqli_query($conn,"INSERT INTO hotel_master(hname,street,state_id,city_id,location,pincode,photos)VALUES('$name','$street',$state,$city,'Surat',$pincode,'images/sample.jpg')") ;
    // if ($result) {
    //     // Move the uploaded file to the target directory
    //     if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    //         echo "File uploaded and moved successfully!";
    //     } else {
    //         echo "Failed to move the file.";
    //     }
    // } else {
    //     echo "Error uploading the file.";
    // }

  // Process the form data (perform any desired operations)

  // Prepare the response
  if($result){
    $response = array(
        'status' => 'success',
        'message' => 'Form submitted successfully',
        'data' => array(
          'hname' => $name,
        
          'street'=>$street,
          'state'=>$state,
          'city'=>$city,
          'pincode'=>$pincode,
        )
      );
    
  } else{
    $response = array(
        'status' => 'unsuccessful',
        'message' => 'error in query'
      );
  }
 
  // Send the JSON response
  header('Content-Type: application/json');
  echo json_encode($response);
} else {
  // Invalid request method
  $response = array(
    'status' => 'error',
    'message' => 'Invalid request method'
  );

  // Send the JSON response
  header('Content-Type: application/json');
  echo json_encode($response);
}
?>