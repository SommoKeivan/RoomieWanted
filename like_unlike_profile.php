<?php
require_once("bootstrap.php");

// Retrieve state and profile ID from POST request
$state = $_POST["state"] ?? null; // Use null coalescing to prevent notices if not set
$profileID = $_POST["profileID"] ?? null; // Use null coalescing for safety
$userID = $_SESSION["userID"] ?? null; // Ensure userID is retrieved safely

// Check if required variables are set
if ($profileID !== null && $userID !== null) {
    if ($state === "on") { // User wants to unlike the profile
        $dbh->unlikeProfile($profileID, $userID);
    } else { // User wants to like the profile
        $dbh->likeProfile($profileID, $userID);
    }
} else {
    // Handle the case where profileID or userID is not set
    // Consider logging this issue or returning an error response
    echo json_encode(["error" => "Invalid request"]);
}
?>
