<?php
    require_once("bootstrap.php");
    
    $text = $_POST["text"];
    $profileID = $_POST["profileID"];
    $userID = $_SESSION["userID"];
    $dbh->newMessage($userID, $profileID, $text);
?>