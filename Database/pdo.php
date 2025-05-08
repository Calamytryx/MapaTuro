<?php
// Database credentials
$host = 'localhost';
$dbname = 'mapaturo';
$username = 'root';
$password = '.loliHENTAI69.';

try {
    // Connect to MySQL server
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the database exists
    $stmt = $pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");
    $databaseExists = $stmt->fetchColumn();

    if (!$databaseExists) {
        // If the database doesn't exist, create it
        $pdo->exec("CREATE DATABASE $dbname");
        // Redirect after creating the database
        header("Location: ".$_SERVER['PHP_SELF']);
        exit(); // Ensure to exit after redirect
    }

    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the database has tables
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (count($tables) === 0) {
        // If the database has no tables, execute the SQL file
        $sqlFile = 'database/mapaturo.sql';
        $sql = file_get_contents($sqlFile);

        if ($sql === false) {
             echo "Failed to read SQL file.\n";
        } else {
            $pdo->exec($sql);
            // Redirect after executing SQL file
            header("Location: ".$_SERVER['PHP_SELF']);
            exit(); // Ensure to exit after redirect
        }
    }
} catch (PDOException $e) {
    // Display error message if connection fails
    echo "Error: " . $e->getMessage();
}
?>
