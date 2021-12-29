<?php
require_once("bootstrap.php");
$templateParams["sideMenu"] = true;
$templateParams["footer"] = true;
$templateParams["title"] = "RoomieWanted - Profile";
$templateParams["name"] = "profile_open.php";
$templateParams["profile"] = $dbh->getProfileById($_GET['id']);
$templateParams["tags"] = $dbh->getTagsFromUser($_GET['id']);
$templateParams["languages"] = $dbh->getLanguagesById($_GET['id']);
$templateParams["neighborhoods"] = $dbh->getNeighborhoodsById($_GET['id']);
$templateParams["pics"] = $dbh->getTopNPhotosById($_GET['id'], '3');

$templateParams["isReviewed"] = $dbh->isReviewed($_GET['id']);
if ($templateParams["isReviewed"]){
    $templateParams["lastReview"] = $dbh->getLastReviewById($_GET['id']);
    $templateParams["lastReviewSender"] = $dbh->getProfileById(($templateParams["lastReview"])["senderID"]);
}
$templateParams["js"] = array("js/ajaxRequests.js","js/likedProfile.js");

require("template/base.php");

?>