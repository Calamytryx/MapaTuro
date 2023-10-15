<?php
// Create connection
require('../../../Asset\Setup\db.inc.php');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetching values from the form
$username = $_POST['register-username'];
$age = $_POST['register-age'];
$gender = $_POST['register-gender'];
$email = $_POST['register-email'];
$password = $_POST['register-password'];
$password1 = $_POST['register-password1'];

if ($password === $password1 ){

// Inserting values into the database
$sql = "INSERT INTO users (username, age, gender, email, password)
    VALUES ('$username', '$age', '$gender', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: ../../login");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
else {
  echo "Error: Passwords dont match";
}
?>