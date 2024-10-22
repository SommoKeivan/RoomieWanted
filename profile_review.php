<?php
require_once("bootstrap.php");  // Include bootstrap

$id = $_GET['id'];  // Store user ID for easier reference

$templateParams = [
    "sideMenu" => true,  // Enable side menu
    "footer" => false,    // Disable footer
    "title" => "RoomieWanted - Review",  // Set page title
    "name" => "review_screen.php",  // Set template file
    "profile" => $dbh->getProfileById($id),  // Fetch profile data
    "js" => ["js/ajaxRequests.js", "js/send_review.js", "js/likedProfile.js"]  // Include JS files
];

require("template/base.php");  // Load base template
?>
