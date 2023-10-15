<?php
    session_start(); // Start the session

    function logout() {
        // Unset all of the session variables
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();

        // Redirect to the login page or any other desired page after logout.
        header("Location: ../.."); // Change the URL to your login page.
        exit();
    }

    // Call the logout function whenever you need to log the user out.
    // Example usage: 
    // if ($logout_condition) {
    //     logout();
    // }
    logout();
    
?>
