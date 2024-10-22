<?php
require_once("bootstrap.php");  // Include bootstrap

// Base template configuration
$templateParams = [
    "title" => "RoomieWanted - Search Result",  // Set page title
    "event" => "profile_miniature.php",  // Set profile miniature template
    "name" => "search_result_screen.php",  // Set template file name
    "type" => "result",  // Set type for the template
    "sideMenu" => true,  // Enable side menu
    "footer" => true,    // Enable footer
    "search_string" => null  // Placeholder for search string
];

// Load users based on search criteria if the user is logged in
if (isset($_SESSION["isLogged"])) {
    $templateParams["users_found"] = $dbh->getUsersFromResearch($templateParams["search_string"]);
}

$templateParams["js"] = ["js/ajaxRequests.js", "js/likedProfile.js"];  // Include necessary JS files

require("template/base.php");  // Load base template
?>
