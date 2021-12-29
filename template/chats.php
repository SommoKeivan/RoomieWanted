<?php
require_once("bootstrap.php");
$templateParams["sideMenu"] = true;
$templateParams["footer"] = true;
$templateParams["title"] = "RoomieWanted - Open Chats";
$templateParams["chats"] =  $dbh->getUsersWithOpenChats($_SESSION["userID"]);
$templateParams["name"] = "chats_list.php";

$templateParams["js"] = array("js/ajaxRequests.js");

require("template/base.php");
?>