<div class="profile p-3 mb-2 bg-light border border-dark rounded" data-profileid="<?php echo $profile["userID"]; ?>">
    <a href="./profile.php?id=<?php echo $profile["userID"]; ?>">
        <div class="row">
            <div class="col-3">
                <img src="<?php echo PROPIC_DIR.$profile["profile_pic"]; ?>" class="img-fluid rounded-circle img-miniatura" alt="Profile image">
            </div>

            <div class="col-5">
                <h3> <?php echo $profile["name"]; ?>  <?php echo $profile["surname"]; ?> </h3>
                <p class="caption"> <i class="fas fa-university"></i> <?php echo $profile["field_of_study"]; ?></p>
            </div>

            <div class="col-4">
                <p class="caption"> <i class="fas fa-map-marker-alt"></i> <?php echo $profile["location"]; ?></p>
                <p class="caption"> 
                    <?php if(strcmp($profile["gender"], "Male") == 0):?>
                        <i class="fas fa-mars"></i> Male    
                    <?php elseif(strcmp($profile["gender"], "Female") == 0):?>
                        <i class="fas fa-venus"></i> Female
                    <?php endif ?></p> 
                <p class="caption"> <i class="fas fa-user-friends"></i> <?php echo "match: 100%"; ?></p>
            </div>
        </div>  
    </a>                 
    
    <div class="line d-md-none"></div>

    <div class="row ml-1 mr-1">
        <?php foreach($templateParams["tags"] as $tag): ?>
            <div class="border border-dark pl-1 pr-1 mr-1 mt-1 chatText"><?php echo $tag["name"]?></div>
        <?php endforeach; ?>
    </div>

    <div class="line d-md-none"></div>

    <div class="row"> 
        <div class="col-3 alignCenter heartLike">
            <?php $state = ($dbh->isLiked($profile["userID"], $_SESSION['userID']) ? "on" : "off");?>
            <em data-state="<?php echo $state?>" class="<?php echo ($state == "on" ? "fas " : "far ");?> 
            fa-heart" aria-hidden="true" title="Interested button" style="cursor:pointer"></em>
            <p class="caption"><?php echo ($state == "on" ? "Saved" : "Save");?></p>
        </div>
        <div class="col-3 alignCenter" onclick="location.href = './profile_reviews.php?id=<?php echo $profile['userID']; ?>'">
            <em class="fas fa-pen-square" aria-hidden="true" title="Reviews button" style="cursor:pointer"></em><p class="caption">Reviews</p>
        </div>
        <div class="col-3 alignCenter" onclick="location.href = './profile_photos.php?id=<?php echo $profile['userID']; ?>'">
            <em class="fas fa-images" aria-hidden="true" title="Photos button" style="cursor:pointer"></em><p class="caption">Photos</p>
        </div>
        <div class="col-3 alignCenter" onclick="location.href = './chat.php?id=<?php echo $profile['userID']; ?>'">
            <em class="far fa-comment-dots" aria-hidden="true" title="Start chat button" style="cursor:pointer"></em><p class="caption">Chat</p>
        </div>
    </div>  
</div>