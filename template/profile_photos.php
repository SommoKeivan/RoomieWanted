<?php
require_once("bootstrap.php");
$templateParams["sideMenu"] = true;
$templateParams["footer"] = true;
$templateParams["title"] = "RoomieWanted - Profile Photos";
$templateParams["name"] = "photos.php";
$templateParams["username"] = $dbh->getUsernameById($_GET['id']);
$templateParams["pics"] = $dbh->getPhotosById($_GET['id']);
$templateParams["js"] = array("js/ajaxRequests.js");

require("template/base.php");

?>