<?php
require_once("bootstrap.php");
$templateParams["sideMenu"] = true;
$templateParams["footer"] = false;
$templateParams["title"] = "RoomieWanted - Review";
$templateParams["name"] = "review_screen.php";
$templateParams["profile"] = $dbh->getProfileById($_GET['id']);

$templateParams["js"] = array("js/ajaxRequests.js","js/send_review.js","js/likedProfile.js");

require("template/base.php");
?>