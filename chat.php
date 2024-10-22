<?php
// Include the bootstrap file to initialize the application
require_once("bootstrap.php");

// Set up the template parameters for the chat screen
$templateParams["sideMenu"] = true; // Enable the side menu
$templateParams["footer"] = false;   // Disable the footer
$templateParams["title"] = "RoomieWanted - Chat"; // Set the page title
$templateParams["name"] = "chat_screen.php"; // Specify the name of the chat screen template

// Fetch the user profile by ID from the database using the provided 'id' parameter
$templateParams["profile"] = $dbh->getProfileById($_GET['id']);

// Include necessary JavaScript files for functionality
$templateParams["js"] = array(
    "js/ajaxRequests.js",   // Handles AJAX requests
    "js/send_message.js",   // Manages sending messages
    "js/likedProfile.js"    // Manages liked profiles
);

// Set the current state of the application to 'chats'
$templateParams["state"] = "chats";

// Enable the back button on the page
$templateParams["backBtn"] = true;

// Load the base template with the specified parameters
require("template/base.php");
?>
