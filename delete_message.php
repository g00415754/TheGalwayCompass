<?php
session_start();

// Database connection
$host = 'localhost';
$dbname = 'thegalwaycompass';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit();
}

if (!isset($_SESSION['user_id']) || !isset($_POST['message_id'])) {
    echo "error";
    exit();
}

$user_id = $_SESSION['user_id'];
$message_id = $_POST['message_id'];

// Only allow deletion if the message belongs to the user
$stmt = $pdo->prepare("DELETE FROM chat_messages WHERE id = :id AND user_id = :user_id");
$stmt->bindParam(':id', $message_id, PDO::PARAM_INT);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

echo $stmt->rowCount() > 0 ? "success" : "error";