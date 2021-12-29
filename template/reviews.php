<?php $username = $templateParams['username'];
$isUser = ($username['username'] == $_SESSION["username"]);?>
<div >
    <?php if ($isUser):?>
        <h2 class="mt-2">My reviews</h2> 
    <?php else:?>
        <h2 class="mt-2"><?php echo $username["username"]?>'s reviews</h2> 
    <?php endif?>

    <div class="line d-md-none"></div>

    <div class="row ml-1 mr-1">
        <?php foreach($templateParams["reviews"] as $review): ?>
            <?php $profile = $dbh->getProfileById($review["senderID"]);?>
            <div class="p-3 mb-2 bg-light border border-dark rounded">
                <div class="row">
                    <span class="ml-3">Wrote by "<?php echo $profile["username"]?>" on <?php echo $review["date"]?>
                </div>
                <div class="line d-md-none"></div>
                <div class="row">
                    <div class="col-9">
                        <span class="chatText"><?php echo $review["text"]?>
                    </div>
                    <div class="col-3">
                        <span class="chatText">Score:</span>
                        <span class="chatText"><?php echo $review["score"]?>/5
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>