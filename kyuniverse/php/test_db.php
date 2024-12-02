<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = '127.0.0.1'; // Use 127.0.0.1 for TCP/IP
$port = '3307'; // XAMPP's MySQL port
$dbname = 'user_auth'; // Your database name
$user = 'root'; // MySQL username
$password = ''; // Leave blank as confirmed

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database connection successful!";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>
