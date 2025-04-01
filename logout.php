<?php
// Start the session
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect to the current page or index page if needed
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>
