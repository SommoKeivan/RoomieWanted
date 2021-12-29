<?php $profile = $templateParams["profile"];
$messages = $dbh->getChatMessages($_SESSION["userID"], $profile["userID"])?>

<div class="profile" data-profileid="<?php echo $profile["userID"];?>">
    <div class="row p-3 profileChat">
        <div class="col-2" onclick="location.href = './profile.php?id=<?php echo $profile['userID']; ?>'">
            <img src="<?php echo PROPIC_DIR.$profile["profile_pic"]; ?>" class="img-fluid rounded-circle " alt="Profile image">
        </div>
        <div class="col-8" onclick="location.href = './profile.php?id=<?php echo $profile['userID']; ?>'">
            <h3> <?php echo $profile["name"]; ?>  <?php echo $profile["surname"]; ?> </h3>
        </div>
        <div class="col-2 alignCenter heartLike">
            <?php $state = ($dbh->isLiked($profile["userID"], $_SESSION['userID']) ? "on" : "off");?>
            <em data-state="<?php echo $state?>" class="<?php echo ($state == "on" ? "fas " : "far ");?> 
            fa-heart" aria-hidden="true" title="Interested button" style="cursor:pointer"></em>
        </div>
    </div>

    <div class = "messagesChat">
        <?php foreach($messages as $message):?> 
            <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $message["date"]);?>
            <?php if ($message["senderID"] == ($_SESSION["userID"])):?>
                <div class="profile pl-3 pr-3 pt-1 mb-1 ml-5 mr-2 bg-light border border-dark rounded ">
            <?php else: ?>
                <div class="profile pl-3 pr-3 pt-1 mb-1 mr-5 bg-light border border-dark rounded">
            <?php endif?>
                    <span class="chatText"> <?php echo $message["text"]?></span>  
                    <div class="chatText text-muted font-weight-light text-right">
                        <?php echo $date->format("H:i").str_repeat('&nbsp;', 3).$date->format("Y-m-d"); 
                        if ($message["senderID"] == ($_SESSION["userID"])):?>
                            <?php echo str_repeat('&nbsp;', 1)?><i class="fas fa-check-double"></i>
                        <?php endif ?></div>
                </div> 
        <?php endforeach; ?>
    </div> 

    <form class="row newMessagesChat">
        <div class="col-10 form-group">
            <input id="messageText" class="form-control" placeholder="Message..." required="" autofocus="">
        </div>
        <div class="col-2" >
            <button id="sendMessage" type="submit" class="btn">
            <a class="fas fa-location-arrow" aria-hidden="true" title="send message"></a></button> 
    </div>        
    </form>
</div>