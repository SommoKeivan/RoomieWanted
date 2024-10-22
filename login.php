<?php
require_once("bootstrap.php");  // Include bootstrap

$templateParams = [
    "sideMenu" => false,  // Disable side menu
    "footer" => false,     // Disable footer
    "title" => "RoomieWanted - Login",  // Set page title
    "name" => "login-template.php",  // Set template file
    "js" => ["js/ajaxRequests.js", "js/onLogin.js"]  // Include JS files
];

require("template/base.php");  // Load base template
?>
