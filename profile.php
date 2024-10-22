<?php
require_once("bootstrap.php");  // Include setup

$id = $_GET['id'];  // Store the user ID for easier reference

$templateParams = [
    "sideMenu" => true,  // Enable side menu
    "footer" => true,    // Enable footer
    "title" => "RoomieWanted - Profile",  // Set page title
    "name" => "profile_open.php"  // Set template file
];

// Fetch all profile-related data
$templateParams["profile"] = $dbh->getProfileById($id);
$templateParams["tags"] = $dbh->getTagsFromUser($id);
$templateParams["languages"] = $dbh->getLanguagesById($id);
$templateParams["neighborhoods"] = $dbh->getNeighborhoodsById($id);
$templateParams["pics"] = $dbh->getTopNPhotosById($id, '3');

// Check if the profile has been reviewed
$templateParams["isReviewed"] = $dbh->isReviewed($id);
if ($templateParams["isReviewed"]) {
    $lastReview = $dbh->getLastReviewById($id);  // Fetch last review
    $templateParams["lastReview"] = $lastReview;
    $templateParams["lastReviewSender"] = $dbh->getProfileById($lastReview["senderID"]);  // Get review sender profile
}

$templateParams["js"] = ["js/ajaxRequests.js", "js/likedProfile.js"];  // Include JS files

require("template/base.php");  // Load base template
?>
