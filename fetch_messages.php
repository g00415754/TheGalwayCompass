<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "root";
$database = "thegalwaycompass";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Get the last message ID from the URL (if set)
$last_message_id = isset($_GET['last_message_id']) ? (int) $_GET['last_message_id'] : 0;

$sql = "SELECT c.id, c.message, c.message_type, c.sent_at, u.username, c.user_id 
        FROM chat_messages c 
        JOIN users u ON c.user_id = u.id 
        WHERE c.id > ? 
        ORDER BY c.sent_at ASC"; // Ensure messages are returned in order

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $last_message_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

header('Content-Type: application/json');
echo json_encode($messages);

$stmt->close();
$conn->close();
?>