<?php
require_once("bootstrap.php");  // Include bootstrap

// Clear user session data
unset($_SESSION["isLogged"], $_SESSION["username"], $_SESSION["userID"]);

require("./index.php");  // Redirect to index
?>
