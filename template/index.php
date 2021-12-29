<?php
require_once("bootstrap.php");

//Login
if(isset($_POST["username"])){
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["userID"] = $dbh->getIDFromUsername($_SESSION["username"])["userID"];
    $_SESSION["isLogged"] = $dbh->checkCredentials($_POST["username"], $_POST["password"]);
}

//Base template
$templateParams["title"] = "RoomieWanted - Home";
$templateParams["sideMenu"] = true;
$templateParams["footer"] = true;

//Particular template
if(isset($_SESSION["isLogged"])){
    $templateParams["name"] = "search_screen.php";
} else { //User not logged in
    $templateParams["name"] = "homepage_not_logged.php";
}

require("template/base.php");
?>