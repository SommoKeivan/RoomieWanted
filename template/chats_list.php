<h2 class="mt-2">Chats</h2>

<div class="line"></div>
<?php foreach($templateParams["chats"] as $userID): ?>
    <?php $profile = $dbh->getProfileById($userID["userID"]);
    $last_message = $dbh->getLastMessageById($_SESSION["userID"], $profile["userID"]);
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $last_message["date"]);?>
    <div class="profile pl-3 pr-3 pt-3 mb-2 bg-light border border-dark rounded" data-profileid="<?php echo $profile["userID"]; ?>">
    <a href="./chat.php?id=<?php echo $profile["userID"]; ?>">
        <div class="row">
            <div class="col-3">
                <img src="<?php echo PROPIC_DIR.$profile["profile_pic"]; ?>" class="w-100 img-fluid rounded-circle " alt="Profile image">
            </div>

            <div class="col-5"> 
                <h3> <?php echo $profile["name"]; ?>  <?php echo $profile["surname"]; ?> </h3>
            </div>

            <div class="col-4">
                <?php if($date->format('Y-m-d') == date("Y-m-d")):?>
                    <p class="caption"><?php echo $date->format("H:i");?></p>
                <?php else:?>
                    <p class="caption"><?php echo $date->format("Y-m-d");?></p>
                <?php endif?>
            </div>
        </div> 
        <div class='ml-5'>
            <span class="chatText text-muted"><?php if ($last_message["senderID"] == ($_SESSION["userID"])):?>
            <i class="fas fa-check-double"></i>
            <?php endif ?>
            <?php echo $last_message["text"]?></span>
        </div> 
    </a> 
    </div>  
<?php endforeach; ?>