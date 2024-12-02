<?php
// Include database connection
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    try {
        // Check if the username already exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $userExists = $stmt->fetchColumn();

        if ($userExists) {
            // Username already exists
            echo "<script>alert('Username already exists. Please choose a different one.'); window.location.href='../createaccount.html';</script>";
            exit;
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert user into the `users` table
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $username, 'password' => $hashed_password]);

        // Success message with a "Go to Homepage" redirect
        echo "<script>
            if (confirm('Account created successfully! Would you like to go to the homepage?')) {
                window.location.href = '../about.html';
            } else {
                window.location.href = '../signin.html';
            }
        </script>";
    } catch (PDOException $e) {
        // Handle database errors
        echo "<script>alert('Database error: " . $e->getMessage() . "'); window.location.href='../createaccount.html';</script>";
    }
}
?>
