<?php $profile = $templateParams["profile"];
$alreadyReviewed = $dbh->checkReview($_SESSION["userID"], $profile["userID"]);
if ($alreadyReviewed) $review = $dbh->getReview($_SESSION["userID"], $profile["userID"]);?>

<div class="profile" data-profileid="<?php echo $profile["userID"];?>" data-alreadyRev ="<?php echo $alreadyReviewed;?>">
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

    <form>
        <div id="scoreRangeSlider">
            <label for="scoreRange" class="form-label">User score: </label>
            <input type="range" class="form-range" min="1" max="5" id="scoreRange" value = "<?php echo ($alreadyReviewed) ? $review['score'] : 3?>" oninput="this.nextElementSibling.value = this.value">
            <output><?php echo ($alreadyReviewed) ? $review['score'] : 3?></output>
        </div>

        <div class="form-group">
            <label for="textArea">Review text:</label>
            <textarea class="form-control rounded-0" <?php if(!$alreadyReviewed) echo "placeholder='Message...'" ?> id="textArea" rows="15"><?php if($alreadyReviewed) echo $review["text"]?></textarea>
        </div>
        <button class="btn btn-block rounded orange-button" type="submit"><?php echo ($alreadyReviewed ? "Edit review" : "Write a review")?></button>
    </form>
</div>