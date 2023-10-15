<?php 
require('../../../Asset\Setup\db.inc.php');
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['login-username']) && isset($_POST['login-password'])) {
        $username = $_POST['login-username'];
        $password = $_POST['login-password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            session_start();
            $_SESSION['username'] = $username;
            echo "Login successful!";
            header("Location: ../../../");
        } else {
            echo "Invalid username or password";
        }
    }
    $conn->close();
?>