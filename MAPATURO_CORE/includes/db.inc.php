<?php
// Database connection parameters
$host = "127.0.0.1"; // Change to your database host if it's not local
$database = "mapaturo"; // Replace with your actual database name
$username = "Calamyty"; // Replace with your database username
$password = "Mytryx"; // Replace with your database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optionally, set character encoding (UTF-8)
    $pdo->exec("SET NAMES utf8mb4");
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>