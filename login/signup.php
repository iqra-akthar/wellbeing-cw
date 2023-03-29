<?php
// connect to database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // collect form data
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // hash password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // insert user into database
  $sql = "INSERT INTO users (fullname, email, username, password) VALUES ('$fullname', '$email', '$username', '$hashed_password')";

  if (mysqli_query($conn, $sql)) {
    echo "New user created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// close database connection
mysqli_close($conn);
?>
