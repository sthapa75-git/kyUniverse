<?php
// Database connection settings
$servername = "localhost"; // Host name
$username = "root";        // MySQL username
$password = "";            // MySQL password
$dbname = "contact_us";    // Database name

try {
    // Establish a connection using PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Securely get form data
        $name = htmlspecialchars($_POST['name']);
        $phone_number = htmlspecialchars($_POST['phone_number']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // SQL query with placeholders
        $sql = "INSERT INTO contact_data (name, phone_number, email, message) VALUES (:name, :phone_number, :email, :message)";
        
        // Prepare and execute the statement
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':phone_number' => $phone_number,
            ':email' => $email,
            ':message' => $message,
        ]);

        // Success message and redirection
        echo "<script>alert('Thank you for contacting us!'); window.location.href='contact.html';</script>";
    }
} catch (PDOException $e) {
    // Handle database errors
    echo "<script>alert('Database Error: " . $e->getMessage() . "');</script>";
}
?>
