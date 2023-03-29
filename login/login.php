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
  $username = $_POST['username'];
  $password = $_POST['password'];

  // get user from database
  $sql = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];
    if (password_verify($password, $hashed_password)) {
      // start session and redirect to dashboard
      session_start();
      $_SESSION['username'] = $username;
      header("Location: dashboard.php");
      exit();
    } else {
      // display error message
      $error_message = "Invalid username or password";
    }
  } else {
    // display error message
    $error_message = "Invalid username or password";
  }
}

// close database connection
mysqli_close($conn);
?>