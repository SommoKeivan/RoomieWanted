<?php
require_once("bootstrap.php");

// Login process
// If the database handle is invalid, unset the username from the POST data
if ($dbh->valid === false) {
    unset($_POST["username"]);
}

// Check if the username is set in the POST request
if (isset($_POST["username"])) {
    // Store the username in the session
    $_SESSION["username"] = $_POST["username"];
    
    // Retrieve and store the user ID in the session
    $userIdData = $dbh->getIDFromUsername($_SESSION["username"]);
    $_SESSION["userID"] = $userIdData["userID"] ?? null; // Use null coalescing to prevent notices
    
    // Check credentials and store login status in the session
    $_SESSION["isLogged"] = $dbh->checkCredentials($_POST["username"], $_POST["password"]);
}

// Base template parameters
$templateParams["title"] = "RoomieWanted - Home";
$templateParams["sideMenu"] = true;
$templateParams["footer"] = true;
$templateParams["state"] = "index";
$templateParams["backBtn"] = false;

// Set the particular template based on login status
if (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"]) {
    // User is logged in, set the search screen template
    $templateParams["name"] = "search_screen.php";
} else {
    // User is not logged in, set the homepage for non-logged users
    $templateParams["name"] = "homepage_not_logged.php";
}

// Load the base template
require("template/base.php");
?>
