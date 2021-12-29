<?php if ($templateParams["type"] == "result"):?>
    <h2 class="mt-2">Last research result</h2>
<?php elseif ($templateParams["type"] == "liked"):?>
    <h2 class="mt-2">Liked profiles</h2>
<?php endif?>

<div class="line"></div>
<?php foreach($templateParams["users_found"] as $profile): ?>
    <?php
        $templateParams["tags"] = $dbh->getTagsFromUser($profile["userID"]);
        if(isset($templateParams["event"])){
            require($templateParams["event"]);
        }
    ?>
<?php endforeach; ?>