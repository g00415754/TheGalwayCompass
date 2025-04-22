<?php
ob_start(); // Optional but can help with buffering issues

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Return JSON
header('Content-Type: application/json');

// Include the database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "thegalwaycompass";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch distinct categories from events table (for filtering)
$stmt = $pdo->prepare("SELECT DISTINCT event_category FROM upcoming_events");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get events based on the start and end dates, and optional category filter
$start = isset($_GET['start']) ? $_GET['start'] : null;
$end = isset($_GET['end']) ? $_GET['end'] : null;
$category = isset($_GET['category']) ? $_GET['category'] : null;

// Build SQL query with filters
$sql = "SELECT * FROM upcoming_events WHERE 1=1";

// Add date range filter if available
if ($start && $end) {
    $sql .= " AND event_date BETWEEN :start AND :end";
}

// Add category filter if available
if ($category) {
    $sql .= " AND event_category = :category";
}

$sql .= " ORDER BY event_date ASC";

// Prepare and execute the query
$stmt = $pdo->prepare($sql);

// Bind parameters
if ($start && $end) {
    $stmt->bindParam(':start', $start);
    $stmt->bindParam(':end', $end);
}
if ($category) {
    $stmt->bindParam(':category', $category);
}

$stmt->execute();

// Fetch events
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return events as JSON
if ($events) {
    echo json_encode($events);
} else {
    echo json_encode(['error' => 'No events found for the given filters.']);
}
?>
