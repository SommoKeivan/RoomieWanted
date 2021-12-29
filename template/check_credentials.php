<?php
    require_once("bootstrap.php");
    
    $res = $dbh->checkCredentials($_POST["username"], $_POST["password"]);
    if($res == null){
        echo "invalid";
    } else{
        echo $res;
    }
?>
