<?php
require_once("bootstrap.php");  // Include bootstrap for necessary initializations

// Retrieve posted data with default values for safety
$text = $_POST["text"] ?? '';  // Get review text or default to an empty string
$score = $_POST["score"] ?? 0;  // Get review score or default to 0
$profileID = $_POST["profileID"] ?? '';  // Get profile ID or default to an empty string
$alreadyRev = $_POST["alreadyRev"] ?? false;  // Check if the review already exists
$userID = $_SESSION["userID"] ?? null;  // Get user ID from session

// Ensure user is logged in before proceeding
if ($userID) {
    // Update or create review based on existence
    if ($alreadyRev) {
        $dbh->updateReview($userID, $profileID, $text, $score);  // Update existing review
    } else {
        $dbh->newReview($userID, $profileID, $text, $score);  // Create new review
    }
} else {
    echo json_encode(['error' => 'User not authenticated.']);   // Handle error
}
?>
