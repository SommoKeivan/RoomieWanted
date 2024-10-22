<?php
// Start the session to manage user sessions
session_start();

// Define constants for upload directories
define("UPLOAD_DIR", "upload/");                // General upload directory
define("PROPIC_DIR", "upload/profile_pics/");  // Directory for profile pictures
define("PHOTOS_DIR", "upload/user_pics/");     // Directory for user-uploaded pictures

// Include the database helper class
require_once("db/database.php");

// Initialize the DatabaseHelper with connection parameters
$dbh = new DatabaseHelper("localhost", "root", "", "roomiedb");
?>
