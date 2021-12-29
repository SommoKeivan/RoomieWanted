<?php
    require_once("bootstrap.php");
    
    $text = $_POST["text"];
    $score = $_POST["score"];
    $profileID = $_POST["profileID"];
    $alreadyRev = $_POST["alreadyRev"];
    $userID = $_SESSION["userID"];
    if ($alreadyRev) 
        $dbh->updateReview($userID, $profileID, $text, $score);
    else
        $dbh->newReview($userID, $profileID, $text, $score);
?>