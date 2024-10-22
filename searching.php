<?php 
require_once("bootstrap.php"); 

// Set up the template parameters for the search screen
$templateParams["sideMenu"] = true; // Enable side menu
$templateParams["footer"] = true; // Enable footer
$templateParams["title"] = "RoomieWanted - Searching"; // Page title
$templateParams["name"] = "search_screen.php"; // Main content template

// Fetch neighborhoods and tags based on the provided ID from the query string
$templateParams["neighborhoods"] = $dbh->getNeighborhoods($_GET['id']); 
$templateParams["tags"] = $dbh->getTags($_GET['id']); 

// JavaScript files needed for this page
$templateParams["js"] = array("js/ajaxRequests.js"); 

// Load the base template
require("template/base.php"); 
?>
