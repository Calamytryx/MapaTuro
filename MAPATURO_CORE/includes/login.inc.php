<?php
// Include the database connection file
require "../includes/db.inc.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if each form field is set in $_POST before accessing it
    $email = isset($_POST['login-email']) ? $_POST['login-email'] : "";
    $password = isset($_POST['login-password']) ? $_POST['login-password'] : "";

    // Check if both email and password are provided
    if (!empty($email) && !empty($password)) {
        // Retrieve user data from the database based on the provided email
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a user with the provided email exists
        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct, user is authenticated
                // You can set up user sessions or cookies here
                // For example, set a session variable like $_SESSION['user_id'] = $user['id'];
                // Then, redirect to a logged-in page
                header("Location: ../dashboard.php");
                exit();
            } else {
                // Password is incorrect
                echo "Incorrect password. Please try again.";
            }
        } else {
            // User with the provided email does not exist
            echo "User not found. Please check your email.";
        }
    } else {
        // Handle the case when not all required fields are filled out
        echo "Please fill out both email and password fields.";
    }
} else {
    // Handle the case when the form was not submitted
    echo "Form not submitted.";
}
?>
