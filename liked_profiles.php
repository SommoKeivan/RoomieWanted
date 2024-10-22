<?php
require_once("bootstrap.php");

// Set up the template parameters for the liked users page
$templateParams["title"] = "RoomieWanted - Liked User";
$templateParams["event"] = "profile_miniature.php"; // Event for profile display
$templateParams["name"] = "search_result_screen.php"; // Main content template

$templateParams["type"] = "liked"; // Type of profiles to display
$templateParams["sideMenu"] = true; // Enable side menu
$templateParams["footer"] = true; // Enable footer
$templateParams["state"] = "likedProfiles"; // Current state identifier
$templateParams["backBtn"] = false; // Disable back button

// Check if the user is logged in and fetch liked profiles
if (isset($_SESSION["isLogged"])) {
    $templateParams["users_found"] = $dbh->getLikedProfiles($_SESSION["userID"]); // Get liked profiles for the logged-in user
}

// JavaScript files needed for this page
$templateParams["js"] = array("js/ajaxRequests.js", "js/likedProfile.js");

// Load the base template
require("template/base.php");
?>
