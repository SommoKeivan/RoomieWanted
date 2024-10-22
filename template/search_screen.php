<h2 class="mt-2">Choose your preferences</h2>

<div class="line"></div>

<h3 class="mt-4 mb-0">Choose your preferred living location in Turin...</h3>
<div class= "moreInfoDiv mt-0 pr-2"><a href="#" class="moreInfo">more neighborhood info</a></div>
<div class="tagsBox">   
    <?php $a=NULL;
    $ID=isset($a['ID'])&& !empty($a['ID']) ? $a:0 ;
    $neighborhoods = $dbh->getNeighborhoods($ID)?> 
    <?php if($_POST)?>   
        <div class="border-0 pl-1 pr-1 mr-1 mt-1 mb-1">     
            <?php foreach($neighborhoods as $neighborhood):?>
                <div>
                    <input type='checkbox' name='location' class="mt-2 ml-2"> <?php echo "  "?><?php echo $neighborhood["name"]?></input>
                </div>
            <?php endforeach; ?>
        </div>
    <?php ?>
</div>

<div class="row mt-4">
    <div class="col-9">
        <h3>What are you looking for ...</h3></div>
    <div class= "moreInfoDiv mt-0"><a href="#" class="moreInfo">more about</a></div>
</div>
<div class="tagsBox">  
    <?php $b=NULL;
    $ID=isset($b['ID'])&& !empty($b['ID']) ? $b:0 ;
    $tags = $dbh->getTags($ID)?>
    <?php if($_POST)?>   
        <div class="border-0 pl-1 pr-1 mr-1 mt-1">     
            <?php foreach($tags as $tag):?>
                <div>
                    <input type='checkbox' name='tag' class="mt-2 ml-2"> <?php echo "  "?><?php echo $tag["name"]?></input>
                </div>
            <?php endforeach; ?>
        </div>
    <?php ?>
</div>

<div class="alignCenter">
    <div class="alignCenter p-2">
        <button class="btn btn-block mt-4 rounded orange-button">
            <a href="./search_result.php"><em aria-hidden="true" title="Match button"></em> Search</a>
        </button>
    </div>
</div>