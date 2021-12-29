<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html>
<html xml:lang="it" lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $templateParams["title"]; ?></title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    
    <!-- Font Awesome JS -->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom includes -->
    <link rel="stylesheet" href="css/style.css" >
    <?php
    if(isset($templateParams["js"])):
        foreach($templateParams["js"] as $script):
    ?>
        <script src="<?php echo $script; ?>"></script>
    <?php
        endforeach;
    endif;
    ?>

    <script src="js/sideBarScript.js"></script>  
</head>


<body>
    <?php if(isset($_SESSION['isLogged'])): $userID = ($_SESSION["userID"]); endif;?>
    <div class="wrapper">  
        <!-- sidebar  -->
        <nav class = "bg-light" id="sidebar">
            <div class="row no-gutters sidebar-header">
                <div class="text-light col-10">
                    <h2 class="h3"><?php if (isset($_SESSION['isLogged'])) {
                        echo "Hi " . $_SESSION['username'] . "!";
                    } else {
                        echo "Welcome!";
                    } ?></h2>
                </div>
                <div class="col-2" id="dismiss">
                    <em class="fas fa-arrow-left" aria-hidden="true" title="Exit from sidebar"></em>
                </div>
            </div>
                  
            <ul class="list-unstyled CTAs">
                <?php if (isset($_SESSION['isLogged'])) :?>
                    <li class="sideButton mt-3">
                        <a href="./logout.php" class="orangeBtn">Logout</a>
                    </li>
                <?php else :?>
                    <li class="sideButton mt-3">
                        <a href="./login.php" class="orangeBtn">Login</a>
                    </li>
                <?php endif?>    
                <?php if (isset($_SESSION['isLogged'])) :?>
                    <li>
                        <a href="./index.php"><em class="fas fa-home" aria-hidden="true" title="Home button"></em> Homepage</a>
                    </li>

                    <li>
                        <a href="./search_result.php"><em class="fas fa-users" aria-hidden="true" title="Match button"></em> Matches</a>
                    </li>

                    <li>
                        <a href="./chats.php"><em class="fas fa-comment-dots" aria-hidden="true" title="Chat button"></em> Chat</a>
                    </li>

                    <li>                    
                        <a href="./liked_profiles.php"><em class="fas fa-heart" aria-hidden="true" title="Likes button"></em> Likes</a>
                    </li>

                    <li>
                        <a href="./profile.php?id=<?php echo $userID;?>"><em class="fas fa-user" aria-hidden="true" title="Profile button"></em> Profile</a>
                    </li>
                <?php endif?>
            </ul>
        </nav>
        
        <div id="leftbar">
            <div class="btn-group-vertical" role="group" aria-label="Leftbar buttons group">
                <button type="button" class="btn"id="sidebarCollapse" class="btn">
                    <a class="fas fa-align-left" aria-hidden="true" title="Open the sidebar"></a></button>
                <?php if (isset($_SESSION['isLogged'])) :?>
                    <button onclick="location.href = './index.php'" type="button" class="btn">
                        <a class="fas fa-home" aria-hidden="true" title="Home button"></a></button>

                    <button onclick="location.href = './search_result.php'" type="button" class="btn">
                        <a class="fas fa-users" aria-hidden="true" title="Match button"></a></button>

                    <button onclick="location.href = './chats.php'" type="button" class="btn">
                        <a class="fas fa-comment-dots" aria-hidden="true" title="Chat button"></a></button>

                    <button onclick="location.href = './liked_profiles.php'" type="button" class="btn">
                        <a class="fas fa-heart" aria-hidden="true" title="Likes button"></a></button>   

                    <button onclick="location.href = './profile.php?id=<?php echo $userID?>'" type="button" class="btn">
                        <a class="fas fa-user" aria-hidden="true" title="Profile button"></a></button>
                <?php endif?>
            </div>
        </div>
        
        
        <!-- Page Body -->
        <div id="pagebody">
            <!-- Page Content  -->
            <main>        
                <?php
                    if(isset($templateParams["name"])){
                        require($templateParams["name"]);
                    }
                ?>
            </main>

            <!-- Page footer -->
            <?php if ($templateParams["footer"]):?>
                <footer class= "mt-3 w-100">
                    <div>
                        <span>RoomieWanted, roommates from all over the world!</span>
                    </div>
                    <div>
                        <a href="./privacy.php">Privacy policy</a>
                    </div>
                    <div>
                        <span>Ameri Keivan - Deng Qiyang</span>
                    </div>
                    <div>
                        <span>Fayou Zhu - Yuxin Liu</span>
                    </div>
                </footer>
            <?php endif?>
        </div>

    </div>
    <div class="overlay"></div>

</body>
</html>