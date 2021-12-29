<?php
    require_once("bootstrap.php");
    
    $state = $_POST["state"];
    $profileID = $_POST["profileID"];
    $userID = $_SESSION["userID"];

    if($state == "on"){ //unlike
        $dbh->unlikeProfile($profileID, $userID);
    } else { //like
        $dbh->likeProfile($profileID, $userID);
    }
?>