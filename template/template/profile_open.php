<?php $profile = $templateParams["profile"];
$isUser = ($profile['username'] == $_SESSION["username"]);
$alreadyReviewed = $dbh->checkReview($_SESSION["userID"], $profile["userID"]);?>

<div class = "profile" data-profileid="<?php echo $profile["userID"];?>">
    <div class="alignCenter">
        <img src="<?php echo PROPIC_DIR.$profile["profile_pic"]; ?>" class="img-fluid rounded-circle img-miniatura" alt="Profile image">
    </div>
    <div class = "row p-3 mb-2 bg-light border border-dark rounded">
        <div class="col-8">
            <h3> <?php echo $profile["name"]; ?>  <?php echo $profile["surname"]; ?> </h3>
            <p class="caption"> <i class="fas fa-user" title="Username"></i> <?php echo $profile["username"]; ?></p>
            <p class="caption"> <i class="fas fa-university" title="University Course"></i> <?php echo $profile["field_of_study"]; ?></p>
            <p class="caption"> <i class="fas fa-at" title="Email"></i> <?php echo $profile["email"]; ?></p>
        </div>
        <div class="col-4">
            <p class="caption"> <i class="far fa-flag" title="Country"></i> <?php echo ($dbh->getCountryById($profile["userID"]))["country_name"];?></p>
            <p class="caption"> <i class="fas fa-map-marker-alt" title="Location"></i> <?php echo $profile["location"]; ?></p>
            <p class="caption"> 
                <?php if(strcmp($profile["gender"], "Male") == 0):?>
                    <i class="fas fa-mars" title="Gender"></i> Male    
                <?php elseif(strcmp($profile["gender"], "Female") == 0):?>
                    <i class="fas fa-venus" title="Gender"></i> Female
                <?php endif ?></p> 
            <?php if(!$isUser):?>
                <p class="caption"> <i class="fas fa-user-friends" title="Match"></i> <?php echo "match: 100%"; ?></p>
            <?php endif ?>
        </div>
    </div>

    <div class="line d-md-none"></div>

    <?php if ($isUser):?>
        <button class="btn btn-block rounded orange-button">Edit profile</button>

        <div class="line d-md-none"></div>

        <div>
            <div><caption>Already found a roomate?</caption>
            <label class="switch mt-2">
                    <input type="checkbox">
                    <span class="slider round"></span>
            </label></div> 
        </div>
        
        <div class="line d-md-none"></div>

        <caption>My tags</caption> 

    <?php else:?>
        <div class="row"> 
            <div class="col-4 alignCenter heartLike" >
                <?php $state = ($dbh->isLiked($profile["userID"], $_SESSION['userID']) ? "on" : "off");?>
                <em data-state="<?php echo $state?>" class="<?php echo ($state == "on" ? "fas " : "far ");?> 
                fa-heart" aria-hidden="true" title="Interested button" style="cursor:pointer"></em>
                <p class="caption"><?php echo ($state == "on" ? "Saved" : "Save");?></p>
            </div>
            <div class="col-4 alignCenter" onclick="location.href = './profile_review.php?id=<?php echo $profile['userID']; ?>'">
                <em class="fas fa-pen-square" aria-hidden="true" style="cursor:pointer" title="Reviews button"></em><p class="caption">
                    <?php echo ($alreadyReviewed ? "Edit review" : "Write a review")?>
                </p>
            </div>
            <div class="col-4 alignCenter" onclick="location.href = './chat.php?id=<?php echo $profile['userID']; ?>'">
                <em class="far fa-comment-dots" aria-hidden="true" style="cursor:pointer" title="Start chat button"></em><p class="caption">Chat</p>
            </div>
        </div> 

        <div class="line d-md-none"></div>

        <caption>Tags</caption> 

    <?php endif?>

    <div class="row ml-1 mr-1">
        <?php foreach($templateParams["tags"] as $tag): ?>
            <div class="border border-dark pl-1 pr-1 mr-1 mt-1 chatText"><?php echo $tag["name"]?></div>
        <?php endforeach; ?>
        <?php if ($isUser):?>
            <div class="border border-dark pl-1 pr-1 mr-1 mt-1 chatText"> + </div>
        <?php endif ?>
    </div>

    <div class="line d-md-none"></div>

    <?php if ($isUser):?>
        <caption>My known languages</caption> 
    <?php else:?>
        <caption>Known languages</caption> 
    <?php endif?>

    <div class="row ml-1 mr-1">
        <?php foreach($templateParams["languages"] as $language): ?>
            <div class="border border-dark pl-1 pr-1 mr-1 mt-1 chatText"><?php echo $language["name"]?></div>
        <?php endforeach; ?>
        <?php if ($isUser):?>
            <div class="border border-dark pl-1 pr-1 mr-1 mt-1 chatText"> + </div>
        <?php endif ?>
    </div>

    <div class="line d-md-none"></div>

    <?php if ($isUser):?>
        <caption>My favorite areas</caption> 
    <?php else:?>
        <caption>Favorite areas</caption> 
    <?php endif?>

    <div class="row ml-1 mr-1">
        <?php foreach($templateParams["neighborhoods"] as $area): ?>
            <div class="border border-dark pl-1 pr-1 mr-1 mt-1 chatText"><?php echo $area["name"]?></div>
        <?php endforeach; ?>
        <?php if ($isUser):?>
            <div class="border border-dark pl-1 pr-1 mr-1 mt-1 chatText"> + </div>
        <?php endif ?>
    </div>

    <div class="line d-md-none"></div>

    <?php if ($isUser):?>
        <caption>My photos</caption> 
    <?php else:?>
        <caption>Photos</caption> 
    <?php endif?>

    <div class="row ml-1 mr-1">
        <?php foreach($templateParams["pics"] as $pic): ?>
            <div class="border border-dark m-1">
                <img src="<?php echo PHOTOS_DIR.$pic["name"]; ?>" class="img-fluid img-miniatura" alt="User photo">
            </div>
        <?php endforeach; ?>
        <a href="./profile_photos.php?id=<?php echo $profile["userID"]; ?>"><div class="border border-dark pl-2 pr-2 pt-4 pb-4 mr-1 mt-1 chatText">
            View all </div></a>
    </div>

    <div class="line d-md-none"></div>

    <?php if ($templateParams["isReviewed"]):?>
        <caption>Last review</caption>

        <div class="row ml-1 mr-1">
            <div class="p-3 mb-2 bg-light border border-dark rounded">
                <div class="row">
                    <span class="chatText ml-3">Wrote by "<?php echo $templateParams["lastReviewSender"]["username"]?>" on <?php echo $templateParams["lastReview"]["date"]?>
                </div>
                <div class="line d-md-none"></div>
                <div class="row">
                    <div class="col-9">
                        <span class="chatText"><?php echo $templateParams["lastReview"]["text"]?>
                    </div>
                    <div class="col-3">
                        <span class="chatText">Score:</span>
                        <span class="chatText"><?php echo $templateParams["lastReview"]["score"]?>/5
                    </div>
                </div>
            </div>
            <a href="./profile_reviews.php?id=<?php echo $profile["userID"]; ?>"><div class="border border-dark pl-2 pr-2 mr-1 mt-1 chatText">
                    View all </div></a>
        </div>
    <?php endif ?>
</div>

