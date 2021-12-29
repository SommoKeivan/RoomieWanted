<?php
require_once("bootstrap.php");
$templateParams["sideMenu"] = true;
$templateParams["footer"] = true;
$templateParams["title"] = "RoomieWanted - Profile Reviews";
$templateParams["name"] = "reviews.php";
$templateParams["username"] = $dbh->getUsernameById($_GET['id']);
$templateParams["reviews"] = $dbh->getReviewsById($_GET['id']);
$templateParams["js"] = array("js/ajaxRequests.js");

require("template/base.php");

?>