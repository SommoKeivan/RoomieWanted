<?php
require_once("bootstrap.php");

//Base template
$templateParams["title"] = "RoomieWanted - Search Result";
$templateParams["event"] = "profile_miniature.php";
$templateParams["name"] = "search_result_screen.php";

$templateParams["type"] = "result";
$templateParams["sideMenu"] = true;
$templateParams["footer"] = true;

$templateParams["search_string"] = null; //TODO: here the string resulting from the application of the filters must be entered.
                                         // Currently all users in the database are shown;

//Particular template
if(isset($_SESSION["isLogged"])){
    $templateParams["users_found"] = $dbh->getUsersFromResearch($templateParams["search_string"]);
}
$templateParams["js"] = array("js/ajaxRequests.js","js/likedProfile.js");
require("template/base.php");
?>