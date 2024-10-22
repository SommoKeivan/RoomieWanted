<?php
// Include the bootstrap file to initialize the application
require_once("bootstrap.php");

// Set up the template parameters for the open chats page
$templateParams["sideMenu"] = true; // Enable the side menu
$templateParams["footer"] = true;    // Enable the footer
$templateParams["title"] = "RoomieWanted - Open Chats"; // Set the page title

// Retrieve the list of users with open chats for the current user
$templateParams["chats"] = $dbh->getUsersWithOpenChats($_SESSION["userID"]);

// Specify the name of the template for the chat list
$templateParams["name"] = "chats_list.php"; 

// Set the current state of the application to 'chats'
$templateParams["state"] = "chats";

// Disable the back button on the page
$templateParams["backBtn"] = false;

// Include necessary JavaScript files for functionality
$templateParams["js"] = array("js/ajaxRequests.js"); // Handles AJAX requests

// Load the base template with the specified parameters
require("template/base.php");
?>
