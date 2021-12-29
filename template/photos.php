<?php $username = $templateParams['username'];
$isUser = ($username['username'] == $_SESSION["username"]);?>
<div >
    <?php if ($isUser):?>
        <h2 class="mt-2">My photos</h2> 
    <?php else:?>
        <h2 class="mt-2"><?php echo $username["username"]?>'s photo</h2> 
    <?php endif?>

    <div class="line d-md-none"></div>

    <div class="row ml-1 mr-1">
        <?php foreach($templateParams["pics"] as $pic): ?>
            <div class="border border-dark m-1">
                <img src="<?php echo PHOTOS_DIR.$pic["name"]; ?>" class="img-fluid img-miniatura" alt="User photo">
            </div>
        <?php endforeach; ?>
        <?php if ($isUser):?>
            <div class="border border-dark pl-2 pr-2 pt-4 pb-4 mr-1 mt-1 chatText"> + </div>
        <?php endif ?>
    </div>
</div>