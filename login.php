<?php
  // Retrieve the form data from the request body
  $data = json_decode(file_get_contents('php://input'), true);
  $username = $data['username'];
  $password = $data['password'];
  
  // Check if the username and password are correct
  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) > 0) {
    // The username and password are correct
    $response = array('success' => true);
  } else {
    // The username and password are incorrect
    $response = array('success' => false, 'message' => 'Invalid username or password');
  }
  
  // Send the response back to the client
  header('Content-Type: application/json');
  echo json_encode($response);
?>
