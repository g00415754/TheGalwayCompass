<?php
ob_start(); // Optional but can help with buffering issues

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Return JSON
header('Content-Type: application/json');

// Connect to DB
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

// Get events within range
if (isset($_GET['start']) && isset($_GET['end'])) {
    $start = $_GET['start'];
    $end = $_GET['end'];

    $stmt = $pdo->prepare("SELECT * FROM upcoming_events WHERE event_date BETWEEN :start AND :end ORDER BY event_date ASC");
    $stmt->bindParam(':start', $start);
    $stmt->bindParam(':end', $end);
    $stmt->execute();
} else {
    // Default: show all events from today onward
    $stmt = $pdo->prepare("SELECT * FROM upcoming_events WHERE event_date >= CURDATE() ORDER BY event_date ASC");
    $stmt->execute();
}

// Fetch events
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if events were fetched and return them as JSON
if ($events) {
    echo json_encode($events);
} else {
    echo json_encode(['error' => 'No events found for the given range.']);
}
?>
