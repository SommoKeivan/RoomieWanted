<?php
require_once("bootstrap.php");  // Include bootstrap for necessary initializations

// Retrieve posted data
$text = $_POST["text"] ?? '';  // Get message text or default to an empty string
$profileID = $_POST["profileID"] ?? '';  // Get profile ID or default to an empty string
$userID = $_SESSION["userID"] ?? null;  // Get user ID from session

// Check if user is logged in before sending the message
if ($userID && !empty($text) && !empty($profileID)) {
    $dbh->newMessage($userID, $profileID, $text);  // Send new message
} else {
    echo json_encode(['error' => 'Message not sent.']); // Handle error
}
?>
