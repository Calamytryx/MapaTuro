<?php
require "../includes/db.inc.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if each form field is set in $_POST before accessing it
    $fname = isset($_POST['register-fname']) ? $_POST['register-fname'] : "";
    $lname = isset($_POST['register-lname']) ? $_POST['register-lname'] : "";
    $username = isset($_POST['register-username']) ? $_POST['register-username'] : "";
    $email = isset($_POST['register-email']) ? $_POST['register-email'] : "";
    $gender = isset($_POST['register-gender']) ? $_POST['register-gender'] : "";
    $password = isset($_POST['register-password']) ? password_hash($_POST['register-password'], PASSWORD_DEFAULT) : "";

    // Check if all required fields are set
    if (!empty($fname) || !empty($lname) || !empty($username) || !empty($email) || !empty($gender) || !empty($password)) {
        // Create an SQL query to insert data
        $query = "INSERT INTO users (first_name, last_name, username, email, gender, password) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare and execute the query
        $stmt = $pdo->prepare($query);
        $stmt->execute([$fname, $lname, $username, $email, $gender, $password]);

        // Redirect to a success page or provide a success message
        header("Location: ../");
        exit();
    } else {
        // Handle the case when not all required fields are filled out
        echo "Please fill out all required fields.";
    }
} else {
    // Handle the case when the form was not submitted
    echo "Form not submitted.";
}
?>
