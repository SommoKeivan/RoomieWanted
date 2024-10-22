<?php
require_once("bootstrap.php");  // Include bootstrap

$id = $_GET['id'];  // Store user ID for easier reference

$templateParams = [
    "sideMenu" => true,  // Enable side menu
    "footer" => true,    // Enable footer
    "title" => "RoomieWanted - Profile Reviews",  // Set page title
    "name" => "reviews.php",  // Set template file
    "username" => $dbh->getUsernameById($id),  // Fetch username
    "reviews" => $dbh->getReviewsById($id),  // Fetch reviews
    "js" => ["js/ajaxRequests.js"]  // Include JS files
];

require("template/base.php");  // Load base template
?>
