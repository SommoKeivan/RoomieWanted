<?php
require_once("bootstrap.php");
$templateParams["sideMenu"] = false;
$templateParams["footer"] = false;

//Base template
$templateParams["title"] = "RoomieWanted - Login";
$templateParams["name"] = "login-template.php";
$templateParams["js"] = array("js/ajaxRequests.js","js/onLogin.js");

require("template/base.php");
?>