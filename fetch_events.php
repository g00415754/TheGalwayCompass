<?php
ob_start(); // Optional but can help with buffering issues

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Return JSON
header('Content-Type: application/json');

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

// Fetch distinct categories from events table (for filtering)
$stmt = $pdo->prepare("SELECT DISTINCT event_category FROM upcoming_events");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get events based on the start and end dates, and optional category filter
$start = isset($_GET['start']) ? $_GET['start'] : null;
$end = isset($_GET['end']) ? $_GET['end'] : null;
$category = isset($_GET['category']) ? $_GET['category'] : null;

// Build SQL query with filters
$sql = "SELECT * FROM upcoming_events WHERE 1=1"; // Default condition to simplify adding more filters

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
