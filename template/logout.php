<?php
require_once("bootstrap.php");

unset($_SESSION["isLogged"]);
unset($_SESSION["username"]);
unset($_SESSION["userID"]);

require("./index.php");
?>