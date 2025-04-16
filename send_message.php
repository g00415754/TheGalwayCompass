<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$database = "thegalwaycompass";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];
$message = isset($_POST['message']) ? trim($_POST['message']) : '';
$message_type = 'text';
$upload_dir = 'uploads/';
$file_path = '';

// Check if a file was uploaded
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_name = basename($_FILES['file']['name']);
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed_image = ['jpg', 'jpeg', 'png', 'gif'];
    $allowed_video = ['mp4', 'webm', 'ogg'];

    if (in_array($file_ext, $allowed_image)) {
        $message_type = 'image';
    } elseif (in_array($file_ext, $allowed_video)) {
        $message_type = 'video';
    } else {
        echo json_encode(['error' => 'Unsupported file type']);
        exit;
    }

    $new_filename = uniqid() . '.' . $file_ext;
    $destination = $upload_dir . $new_filename;

    if (!move_uploaded_file($file_tmp, $destination)) {
        echo json_encode(['error' => 'File upload failed']);
        exit;
    }

    $file_path = $destination;
}

// Decide what to insert
$final_message = $message_type === 'text' ? $message : $file_path;

if (empty($final_message)) {
    echo json_encode(['error' => 'Message is empty']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO chat_messages (user_id, message, message_type) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $user_id, $final_message, $message_type);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Database error']);
}

$stmt->close();
$conn->close();
?>
