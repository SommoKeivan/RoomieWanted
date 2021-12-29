<?php
require_once("bootstrap.php");

$templateParams["title"] = "RoomieWanted - Liked User";
$templateParams["event"] = "profile_miniature.php";
$templateParams["name"] = "search_result_screen.php";

$templateParams["type"] = "liked";
$templateParams["sideMenu"] = true;
$templateParams["footer"] = true;

if(isset($_SESSION["isLogged"])){
    $templateParams["users_found"] = $dbh->getLikedProfiles($_SESSION["userID"]);
}
$templateParams["js"] = array("js/ajaxRequests.js","js/likedProfile.js");
require("template/base.php");
?>