<?php
$host = '127.0.0.1';
$port = '3306';
$dbname = 'user_auth'; // Your database name
$username = 'root';    // Your MySQL username
$password = '';        // Your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
